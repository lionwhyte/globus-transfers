//MOBILE NAV
document.getElementById('hamburger').addEventListener('click', function() {
    const nav = document.getElementById('mobile-nav');
    if (nav.clientHeight === 0) {
        // Open the nav element
        nav.style.height = `${nav.scrollHeight}px`;
        nav.style.marginTop = '2rem';
        nav.style.transition = 'height 500ms, margin-top 1000ms';
    } else {
        // Close the nav element
        nav.style.height = '0';
        nav.style.marginTop = '0';
        nav.style.transition = 'height 500ms, margin-top 1000ms ';
    }
});

//SHOW MORE TAB
function toggleDetails(button) {
    const content = button.nextElementSibling;
    content.classList.toggle('hidden');

    const icons = button.querySelector('.toggle-icon').children;
    icons[0].classList.toggle('hidden'); // Plus icon
    icons[1].classList.toggle('hidden'); // Minus icon

    const textSpan = button.querySelector('span:last-of-type');
    textSpan.textContent = content.classList.contains('hidden') ? '(show more)' : '(show less)';
}