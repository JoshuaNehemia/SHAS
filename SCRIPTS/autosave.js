const STATUS_MESSAGE = "#status_msg";
const TYPING_INTERVAL = 500;
const API_ADDRESS_AUTOSAVE = "../CONTROLLER/TESTS/quiz_answer.php";

let typingTimer;

$(document).ready(function() {
    const $form = $("#quizForm");

    // 1. HANDLER FOR TEXT INPUTS (Typing with delay)
    // We use event delegation (on 'keyup') so this works even if you add inputs dynamically later
    $form.on("keyup", "input[type='text'], textarea", function () {
        clearTimeout(typingTimer);
        $(STATUS_MESSAGE).text("Typing...");
        typingTimer = setTimeout(sendAllData, TYPING_INTERVAL);
    });

    $form.on("keydown", "input[type='text'], textarea", function () {
        clearTimeout(typingTimer);
    });

    // 2. HANDLER FOR CLICKS (Radio, Checkbox, Select) - Save Immediately
    $form.on("change", "input[type='radio'], input[type='checkbox'], select", function () {
        $(STATUS_MESSAGE).text("Option changed...");
        sendAllData(); // No timer needed, save instantly
    });

    function sendAllData() {
        // Serialize grabs all checked radios and checkboxes automatically
        const formData = $form.serialize();

        $.post(API_ADDRESS_AUTOSAVE, formData)
            .done(function (data) {
                console.log("Server response:", data);
                $(STATUS_MESSAGE).text("Saved at " + new Date().toLocaleTimeString());
            })
            .fail(function() {
                $(STATUS_MESSAGE).text("Error: Connection failed.");
            });
    }
});