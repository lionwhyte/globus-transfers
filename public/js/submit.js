function submitButtonDisable(submitButtonId, formId) {
    // Disable the button to prevent multiple clicks
    document.getElementById(submitButtonId).disabled = true;
    document.getElementById("submissionSpinner").classList.remove("hidden");

    // Submit the form
    document.getElementById(formId).submit();
}