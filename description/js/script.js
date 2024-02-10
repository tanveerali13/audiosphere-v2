// Swiper
const swiper = new Swiper('.swiper', {
// Optional parameters
loop: true,

// Navigation arrows
navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
},

// And if we need scrollbar
scrollbar: {
    el: '.swiper-scrollbar',
},
});

// Back to top button
const btn = document.querySelector('.top-btn');
window.addEventListener('scroll', () => {
    if (window.scrollY > window.innerHeight / 2) {
        btn.classList.add('show');
    } else {
        btn.classList.remove('show');
    }
});