<?php 
session_start(); 

// Helper function to keep HTML clean
// Checks if a value matches the session. Returns 'checked' or empty string.
function isChecked($fieldName, $valueToCheck) {
    if (isset($_SESSION['quiz'][$fieldName]) && $_SESSION['quiz'][$fieldName] == $valueToCheck) {
        return 'checked';
    }
    return '';
}

// Helper for Text inputs
function getValue($fieldName) {
    return $_SESSION['quiz'][$fieldName] ?? '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHAS - Quiz</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../SCRIPTS/autosave.js"></script> <style>
        .input-group { margin-bottom: 20px; padding: 10px; border-bottom: 1px solid #ccc; }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        .option-label { font-weight: normal; display: inline; margin-right: 15px; }
    </style>
</head>
<body>

    <h3>Session Status:</h3>
    <div id="status_msg" style="color: green; font-weight: bold;">Ready</div>
    <hr>

    <form id="quizForm">
        
        <div class="input-group">
            <label>1. What is your name?</label>
            <input type="text" name="full_name" value="<?php echo getValue('full_name'); ?>">
        </div>

        <div class="input-group">
            <label>2. What is PHP?</label>
            
            <input type="radio" name="q2_answer" value="A" id="q2a" <?php echo isChecked('q2_answer', 'A'); ?>>
            <label for="q2a" class="option-label">A. Programming Language</label>

            <input type="radio" name="q2_answer" value="B" id="q2b" <?php echo isChecked('q2_answer', 'B'); ?>>
            <label for="q2b" class="option-label">B. A Fruit</label>

            <input type="radio" name="q2_answer" value="C" id="q2c" <?php echo isChecked('q2_answer', 'C'); ?>>
            <label for="q2c" class="option-label">C. A Car Brand</label>
        </div>

        <div class="input-group">
            <label>3. Terms and Conditions:</label>
            <input type="checkbox" name="terms_agreed" value="yes" id="terms" <?php echo isChecked('terms_agreed', 'yes'); ?>>
            <label for="terms" class="option-label">I agree to the terms</label>
        </div>

        <div class="input-group">
            <label>4. Select your class:</label>
            <select name="class_selection">
                <option value="">-- Select --</option>
                <option value="Class A" <?php echo (getValue('class_selection') == 'Class A') ? 'selected' : ''; ?>>Class A</option>
                <option value="Class B" <?php echo (getValue('class_selection') == 'Class B') ? 'selected' : ''; ?>>Class B</option>
            </select>
        </div>

    </form>

    <br>
    <details>
        <summary>Debug: View Session Data</summary>
        <pre><?php print_r($_SESSION['quiz'] ?? []); ?></pre>
    </details>

</body>
</html>