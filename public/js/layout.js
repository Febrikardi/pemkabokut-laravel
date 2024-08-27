window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('blur');
    } else {
        navbar.classList.remove('blur');
    }
});