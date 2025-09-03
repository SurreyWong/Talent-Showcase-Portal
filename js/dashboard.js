let slideIndex = 0;
let slides;

function showSlide(index) {
    slides = document.querySelectorAll(".slide-box");

    if (slides.length === 0) return;

    if (index >= slides.length) slideIndex = 0;
    if (index < 0) slideIndex = slides.length - 1;

    slides.forEach(slide => {
        slide.style.display = "none";
    });

    slides[slideIndex].style.display = "block";
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

window.onload = function () {
    showSlide(slideIndex);
};
