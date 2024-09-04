window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('blur');
    } else {
        navbar.classList.remove('blur');
    }
});

document.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar-index');
    if (navbar) {
        if (window.scrollY > 0) {
            navbar.classList.add('blur');
        } else {
            navbar.classList.remove('blur');
        }
    }
});

