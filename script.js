// 1. Header scroll effect
const header = document.querySelector('.main-header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// 2. Animate on Scroll effect
const revealElements = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });
revealElements.forEach(element => {
    observer.observe(element);
});

// 3. Hamburger Menu Toggle
const hamburger = document.querySelector('.hamburger-menu');
const navMenu = document.querySelector('.main-nav');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});
// Force reveal all elements on short pages like booking.html
window.addEventListener('load', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    el.classList.add('visible');
  });
});
