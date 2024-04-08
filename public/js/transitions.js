//BACK TO THE TOP OF THE PAGE BUTTON
const backToTopButton = document.getElementById('back-to-top');
// Show the button when user scrolls down 100px from the top of the document
function backToTop() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        backToTopButton.classList.remove('hidden');
    } else {
        backToTopButton.classList.add('hidden');
    }
};
// When the user clicks on the button, scroll to the top of the document
backToTopButton.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

//ON SCROLL FUNCTIONS
window.onscroll = function() {
    elementsFixedOnScroll();
    backToTop();
};

//LOGO SECTION STICK ON TOP WHEN SCROLL DOWN
function elementsFixedOnScroll() {
    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
       document.getElementById("header-section").classList.remove("container");
       document.getElementById("header-section").classList.remove("relative");
       document.getElementById("header-section").classList.add("fixed");
       document.getElementById("header-section").classList.add("top-0");
       document.getElementById("header-section").classList.add("w-full");
       document.getElementById("header-section").classList.add("border-b");
       document.getElementById("header-section").classList.add("border-black");
       document.getElementById("header-section").classList.add("shadow-xl");
       document.getElementById("top-contact-info-section").classList.add("hidden");
    } else {
       document.getElementById("header-section").classList.add("container");
       document.getElementById("header-section").classList.add("relative");
       document.getElementById("header-section").classList.remove("border-b-0");
       document.getElementById("header-section").classList.remove("fixed");
       document.getElementById("header-section").classList.remove("top-0");
       document.getElementById("header-section").classList.remove("w-full");
       document.getElementById("header-section").classList.remove("border-b");
       document.getElementById("header-section").classList.remove("border-black");
       document.getElementById("header-section").classList.remove("shadow-xl");
       document.getElementById("top-contact-info-section").classList.remove("hidden");
    }
}

//MOBILE NAV
document.getElementById('hamburger').addEventListener('click', function() {
    const nav = document.getElementById('mobile-nav');
    if (nav.clientHeight === 0) {
        // Open the nav element
        nav.style.height = `${nav.scrollHeight + 10}px`;
        nav.style.transition = 'height 500ms';
    } else {
        // Close the nav element
        nav.style.height = '0';
        nav.style.transition = 'height 500ms ';
    }
});

//SHOW MORE TAB
function toggleDetails(button) {
    const content = button.nextElementSibling;
    const icons = button.querySelector('.toggle-icon').children;

    if (content.style.maxHeight){
        content.style.maxHeight = null;
        icons[0].classList.remove('hidden'); // Plus icon
        icons[1].classList.add('hidden'); // Minus icon
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
        icons[0].classList.add('hidden'); // Plus icon
        icons[1].classList.remove('hidden'); // Minus icon
    }    
}

// Add this function to update max-height on window resize
function updateMaxHeights() {
    const contents = document.querySelectorAll('.content');
    contents.forEach(content => {
        if (content.style.maxHeight) {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}
// Call updateMaxHeights when the window is resized
window.addEventListener('resize', updateMaxHeights);



//ANIMATE HOMEPAGE ELEMENTS ON SCROLL
const observerHero = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.animate-left-hero, .animate-top-hero').forEach(element => {
    observerHero.observe(element);
});

const observerVehicles = new IntersectionObserver(entries => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('in-view');
            }, index * 500); // Adjust the delay as needed
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.animate-left-vehicles').forEach(element => {
    observerVehicles.observe(element);
});

const observerFadeIn = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.fade-in').forEach(element => {
    observerFadeIn.observe(element);
});

const observerBanner = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.animate-left-banner, .animate-right-banner').forEach(element => {
    observerBanner.observe(element);
});

