let debounceTimer;
let currentFocus;
const departureSuggestionList = document.getElementById('departureSuggestionList');
const departureSuggestions = document.getElementById('departureSuggestions');
const departureInput = document.getElementById('departure');
const destinationSuggestionList = document.getElementById('destinationSuggestionList');
const destinationSuggestions = document.getElementById('destinationSuggestions');
const destinationInput = document.getElementById('destination');

keyboardSuggestionSelect(departureInput, departureSuggestionList);
keyboardSuggestionSelect(destinationInput, destinationSuggestionList);

async function getDepartureSuggestions(query) {
    currentFocus = -1;
    // Clear existing suggestions
    departureSuggestionList.innerHTML = '';

    if (query.trim() === '') {
        clearTimeout(debounceTimer);
        departureSuggestions.style.display = 'none';
        return;
    }

    try {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(async () => {
            // Make a request to get location suggestions from the server
            let currentURL = window.location.origin;
           
            const response = await fetch(`${currentURL}/api/departure-suggestions?query=${query}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            // Populate suggestion list with location name suggestions
            data.forEach((locationName, index) => {
                const li = document.createElement('li');
                li.textContent = locationName;
                li.classList.add('px-6', 'py-1', 'border', 'cursor-pointer');
                li.addEventListener('click', function () {
                    selectSuggestionDeparture(locationName);
                });
                li.addEventListener('mouseover', function (e) {
                    currentFocus = index;
                    const x = departureSuggestionList.getElementsByTagName("li");
                    addActive(x);
                });
                departureSuggestionList.appendChild(li);
            });

            // Display the suggestion dropdown if the list is not empty
            if (departureSuggestionList.childElementCount > 0) {
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
    currentFocus = -1;
    // Clear existing suggestions
    destinationSuggestionList.innerHTML = '';

    if (queryDestination.trim() === '') {
        clearTimeout(debounceTimer);
        destinationSuggestions.style.display = 'none';
        return;
    }

    try {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(async () => {
            // Make a request to get destination suggestions from the server
            let currentURL = window.location.origin;
           
            const response = await fetch(`${currentURL}/api/destination-suggestions?queryDeparture=${queryDeparture}&queryDestination=${queryDestination}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            // Populate suggestion list with destination name suggestions
            data.forEach((destinationName, index) => {
                const li = document.createElement('li');
                li.textContent = destinationName;
                li.classList.add('px-6', 'py-1', 'border', 'cursor-pointer');
                li.addEventListener('click', function () {
                    selectSuggestionDestination(destinationName);
                });
                li.addEventListener('mouseover', function (e) {
                    currentFocus = index;
                    const x = destinationSuggestionList.getElementsByTagName("li");
                    addActive(x);
                });
                destinationSuggestionList.appendChild(li);
            });
            // Display the suggestion dropdown if there are any suggestions
            if (destinationSuggestionList.childElementCount > 0) {
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

function keyboardSuggestionSelect(inp, suggestionList) {
    // Add new event listener
    inp.addEventListener("keydown", handleKeyDown);

    function handleKeyDown(e) {
        const x = suggestionList.getElementsByTagName("li");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            e.preventDefault();
            if (currentFocus > -1) {
                if (x) x[currentFocus].click();
            }
        }
    }
}

function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    if(x[0]) x[currentFocus].classList.add("autocomplete-active");
}

function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
    }
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

    // Clear input value and focus on input
    input.value = '';
    input.focus();

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