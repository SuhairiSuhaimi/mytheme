(function($) {
    $(document).ready(function() {
        // When the "copy" button is clicked
        $('#copy_url').click(function() {
            var $input = $('#interview_link');
            var $button = $(this);
            var $copy = $('#copy_text');
            var $icon = $('#icon_copy');
            var textToCopy = $input.val(); // Get the value from the input field

            // Disable the button to prevent multiple clicks
            $button.prop('disabled', true);

            // Check if Clipboard API is available
            if (navigator.clipboard) {
            // Copy the value of the input field to the clipboard
            // Use Clipboard API to copy text to the clipboard
            navigator.clipboard.writeText(textToCopy)
                .then(function() {
                    // Change the button text and icon to "Copied"
                    $copy.html('Disalin');
                    $icon.removeClass('far fa-copy').addClass('fas fa-check'); // Checkmark symbol
                })
                .catch(function(err) {
                    console.error('Failed to copy text: ', err);
                });
            }
            else {
                console.error("Clipboard API is not supported in this browser.");
                // Fallback using execCommand for older browsers
                fallbackCopy(textToCopy, $input, $copy, $icon, $button);
            }

            // After 5 seconds, revert the button text and icon back to the original
            setTimeout(function() {
                $copy.html('Salin');
                $icon.removeClass('fas fa-check').addClass('far fa-copy'); // Download symbol
                $button.prop('disabled', false); // Enable the button again
            }, 5000); // 5 seconds
        });

    });

}
)(jQuery);

// Fallback function to use execCommand if Clipboard API is not available
function fallbackCopy(textToCopy, $input, $copy, $icon, $button) {
    //var $input = $('#interview_link')[0]; // Get the DOM element of the input

    // Select the text field
    $input[0].select();
    $input[0].setSelectionRange(0, 99999); // For mobile devices

    // Check if execCommand is available before using it
    if (document.execCommand && document.execCommand('copy')) {
        // Change the button text and icon to "Copied"
        $copy.html('Disalin');
        $icon.removeClass('far fa-copy').addClass('fas fa-check'); // Checkmark symbol
    }
    else {
        console.error('Failed to copy using execCommand.');
    }
}