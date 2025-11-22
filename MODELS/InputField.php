<?php

namespace MODELS;

class InputField
{
    private $id;
    private $type; // text, radio, checkbox, select
    private $answer; // The correct answer (string or array for checkboxes)
    private $options; // Array of choices for radio, checkbox, select
    private $max_score;
    private $user_submission = null;

    public function __construct($type, $answer, $max_score = 10, $options = []) {
        $this->type = $type;
        $this->answer = $answer;
        $this->max_score = $max_score;
        $this->options = $options;
    }

    public function getMaxScore() {
        return $this->max_score;
    }
    
    public function setUserSubmission($submission) {
        $this->user_submission = $submission;
    }

    public function getUserSubmission() {
        return $this->user_submission;
    }

    public function getScore($submission = null){
        $sub = $submission ?? $this->user_submission;
        if($this->validateAnswer($sub)) {
            return $this->max_score;
        }
        return 0;
    }

    public function getAnswer() {
        return $this->answer;
    }

    /**
     * Validates the user's submission against the correct answer
     */
    public function validateAnswer($submission = null) {
        $submission = $submission ?? $this->user_submission;

        if ($this->type === 'text') {
            // Case-insensitive comparison for text
            return strtolower(trim($submission)) === strtolower(trim($this->answer));
        }

        if ($this->type === 'checkbox') {
            // Ensure submission is an array
            if (!is_array($submission)) return false;
            
            // Sort both arrays to compare content regardless of order
            $ans = $this->answer;
            sort($submission);
            sort($ans);
            return $submission === $ans;
        }

        // Radio and Select
        return $submission == $this->answer;
    }

    /**
     * Generates the HTML for the input
     * @param int $questionId - Used for the 'name' attribute
     */
    public function renderHTML($questionId) {
        $name = "q" . $questionId;
        $html = '<div class="input-group">';
        $val = $this->user_submission;

        switch ($this->type) {
            case 'text':
                $valueAttr = $val ? "value='" . htmlspecialchars($val) . "'" : '';
                $html .= "<input type='text' name='{$name}' class='form-control' placeholder='Type your answer here...' {$valueAttr}>";
                break;

            case 'radio':
                foreach ($this->options as $opt) {
                    $checked = ($val == $opt) ? 'checked' : '';
                    $html .= "<div class='option'>";
                    $html .= "<label><input type='radio' name='{$name}' value='{$opt}' {$checked}> {$opt}</label>";
                    $html .= "</div>";
                }
                break;

            case 'checkbox':
                // Name needs [] for array submission in PHP
                foreach ($this->options as $opt) {
                    $checked = (is_array($val) && in_array($opt, $val)) ? 'checked' : '';
                    $html .= "<div class='option'>";
                    $html .= "<label><input type='checkbox' name='{$name}[]' value='{$opt}' {$checked}> {$opt}</label>";
                    $html .= "</div>";
                }
                break;

            case 'select':
                $html .= "<select name='{$name}' class='form-select'>";
                $html .= "<option value='' disabled " . ($val === null ? 'selected' : '') . ">Select an option</option>";
                foreach ($this->options as $opt) {
                    $selected = ($val == $opt) ? 'selected' : '';
                    $html .= "<option value='{$opt}' {$selected}>{$opt}</option>";
                }
                $html .= "</select>";
                break;
        }

        $html .= '</div>';
        return $html;
    }
}