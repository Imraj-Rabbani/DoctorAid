/*!
* Start Bootstrap - Heroic Features v5.0.6 (https://startbootstrap.com/template/heroic-features)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-heroic-features/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project



const selectElement = document.getElementById('redirect');

        // Add a change event listener
        selectElement.addEventListener('change', function() {
            // Get the selected option's value
            const selectedOptionValue = this.value;

            // Check if a valid option is selected
            if (selectedOptionValue) {
                // Redirect to the selected URL
                window.location.href = selectedOptionValue;
            }
        });