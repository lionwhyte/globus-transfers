function submitButtonDisable(submitButtonId, formId) {
    // Disable the button to prevent multiple clicks
    document.getElementById(submitButtonId).disabled = true;
    document.getElementById("submissionSpinner").classList.remove("hidden");

    // Submit the form
    document.getElementById(formId).submit();
  }


let debounceTimer;

async function getDepartureSuggestions(query) {
    const suggestionList = document.getElementById('departureSuggestionList');
    const departureSuggestions = document.getElementById('departureSuggestions');

    // Clear existing suggestions
    suggestionList.innerHTML = '';

    if (query.trim() === '') {
        clearTimeout(debounceTimer);
        departureSuggestions.style.display = 'none';
        return;
    }

    try {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(async () => {
            // Make a request to get location suggestions from the server
            const response = await fetch(`http://globus-transfers.localhost/api/departure-suggestions?query=${query}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            // Populate suggestion list with location name suggestions
            data.forEach(locationName => {
                const li = document.createElement('li');
                li.textContent = locationName;
                li.classList.add('bg-white', 'hover:bg-amber-400', 'px-6', 'py-1', 'bg-white', 'cursor-pointer');
                li.addEventListener('click', function () {
                    selectSuggestionDeparture(locationName);
                });

                suggestionList.appendChild(li);
            });

            // Display the suggestion dropdown if the list is not empty
            if (suggestionList.childElementCount > 0) {
                departureSuggestions.style.display = 'block';
            } else {
                departureSuggestions.style.display = 'none';
            }
        }, 300); // Adjust the delay (in milliseconds) as needed
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

async function getDestinationSuggestions(queryDeparture, queryDestination) {
    const suggestionList = document.getElementById('destinationSuggestionList');
    const destinationSuggestions = document.getElementById('destinationSuggestions');

    // Clear existing suggestions
    suggestionList.innerHTML = '';

    if (queryDestination.trim() === '') {
        clearTimeout(debounceTimer);
        destinationSuggestions.style.display = 'none';
        return;
    }

    try {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(async () => {
            // Make a request to get destination suggestions from the server
            const response = await fetch(`http://globus-transfers.localhost/api/destination-suggestions?queryDeparture=${queryDeparture}&queryDestination=${queryDestination}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            // Populate suggestion list with destination name suggestions
            data.forEach(destinationName => {
                const li = document.createElement('li');
                li.textContent = destinationName;
                li.classList.add('bg-white', 'hover:bg-amber-400', 'px-6', 'py-1', 'bg-white', 'cursor-pointer');
                li.addEventListener('click', function () {
                    selectSuggestionDestination(destinationName);
                });

                suggestionList.appendChild(li);
            });

            // Display the suggestion dropdown if there are any suggestions
            if (suggestionList.childElementCount > 0) {
                destinationSuggestions.style.display = 'block';
            } else {
                destinationSuggestions.style.display = 'none';
            }
        }, 300); // Adjust the delay (in milliseconds) as needed
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

function selectSuggestionDeparture(locationName) {

    // You may want to update the input field with the selected value
    document.getElementById('departure').value = locationName;

    // Hide the suggestion dropdown
    document.getElementById('departureSuggestions').style.display = 'none';
}

function selectSuggestionDestination(destinationName) {

    // You may want to update the input field with the selected value
    document.getElementById('destination').value = destinationName;

    // Hide the destination suggestion dropdown
    document.getElementById('destinationSuggestions').style.display = 'none';
}

// Event listener to close the dropdowns when clicking outside
document.addEventListener('click', function (event) {
    const departureSuggestions = document.getElementById('departureSuggestions');
    const destinationSuggestions = document.getElementById('destinationSuggestions');

    if (!event.target.closest('#departureSuggestions') && !event.target.matches('#departure')) {
        departureSuggestions.style.display = 'none';
    }

    if (!event.target.closest('#destinationSuggestions') && !event.target.matches('#destination')) {
        destinationSuggestions.style.display = 'none';
    }
});


//CLEAR INPUTS
function clearInput(inputId) {
    const input = document.getElementById(inputId);
    const clearButton = input.previousElementSibling;

    // Clear input value
    input.value = '';

    // Hide clear button
    clearButton.style.display = 'none';
}


const clearButtons = document.querySelectorAll('.clear-input-button');

// Event listener to show/hide clear button based on input value
clearButtons.forEach(function (clearButton) {
    clearButton.nextElementSibling.addEventListener('input', function (event) {
        const input = event.target;

        // Toggle clear button visibility based on input value
        if (input.value.trim() !== '') {
            clearButton.style.display = 'block';
        } else {
            clearButton.style.display = 'none';
        }
    });
});