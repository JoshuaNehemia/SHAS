<?php

namespace MODELS;

require_once("Question.php");

use MODELS\Question;

class Quiz
{
    private $questions = [];
    private $totalMaxScore = 0;
    private $achievedScore = 0;
    private $results = [];

    /**
     * Add a question to the quiz
     */
    public function addQuestion(Question $question)
    {
        // Index by ID for easy lookup
        $this->questions[$question->getId()] = $question;
        // Calculate total possible score as we add questions
        $this->totalMaxScore += $question->getInputField()->getMaxScore();
    }

    /**
     * Process the form submission
     * @param array $postData Usually $_POST
     */
    public function submit(array $postData)
    {
        foreach ($this->questions as $id => $question) {
            // Get the answer for this specific question ID (e.g., "q1")
            $userAnswer = $postData["q$id"] ?? null;

            // Let the question validate itself
            $isCorrect = $question->processAnswer($userAnswer);
            
            // Add to the running total
            $this->achievedScore += $question->getAchievedScore();

            // Store detailed result for the results view
            $this->results[$id] = [
                'question_text' => $question->getQuestionText(),
                'correct' => $isCorrect,
                'score' => $question->getAchievedScore(),
                'max_score' => $question->getInputField()->getMaxScore(),
                // Format array answers (checkboxes) for display
                'user_answer' => is_array($userAnswer) ? implode(', ', $userAnswer) : $userAnswer,
                'correct_answer' => $this->formatAnswer($question->getInputField()->getAnswer())
            ];
        }
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getTotalScore()
    {
        return $this->achievedScore;
    }

    public function getMaxScore()
    {
        return $this->totalMaxScore;
    }

    /**
     * Helper to format answers for display
     */
    private function formatAnswer($answer) {
        return is_array($answer) ? implode(', ', $answer) : $answer;
    }
}
?>