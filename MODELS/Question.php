<?php

namespace MODELS;

require_once("InputField.php");

use MODELS\InputField;
use Exception;

class Question {
    private $id;
    private $question_text;
    private InputField $input_field;
    private $achieved_score = 0;

    public function __construct($id, $text, InputField $inputField) {
        $this->setId($id);
        $this->setQuestionText($text);
        $this->setInputField($inputField);
    }

    public function getId() {
        return $this->id;
    }

    public function getQuestionText() {
        return $this->question_text;
    }

    public function getInputField() {
        return $this->input_field;
    }

    public function getAchievedScore() {
        return $this->achieved_score;
    }

    public function setId(int $id) {
        if($id < 0) throw new Exception("ID can't be lower than zero");
        $this->id = $id;
    }

    public function setQuestionText(string $question_text) {
        if(empty($question_text)) throw new Exception("Question text can't be empty");
        $this->question_text = $question_text;
    }

    public function setInputField(InputField $input_field) {
        $this->input_field = $input_field;
    }

    /**
     * Checks the answer and sets the score
     */
    public function processAnswer($submission) {
        $isValid = $this->input_field->validateAnswer($submission);
        if ($isValid) {
            $this->achieved_score = $this->input_field->getMaxScore();
            return true;
        }
        $this->achieved_score = 0;
        return false;
    }

    public function render() {
        $inputHtml = $this->input_field->renderHTML($this->id);
        
        echo <<<HTML
        <div class="question-card">
            <h3>Question {$this->id}</h3>
            <p class="question-text">{$this->getQuestionText()}</p>
            <div class="input-area">
                {$inputHtml}
            </div>
        </div>
        HTML;
    }
}
?>