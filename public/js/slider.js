console.log(1)

const slider = document.querySelectorAll('.my-slider');
const sliderContainer = document.querySelector('.slide-container');
const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');

let numberOfSliders = slider.length;
let sliderWidth = slider[0].clientWidth;
let currentSlider = 0;

function init() {

    slider.forEach((e, i) => {
        e.style.left = i * 100 + '%';
    });

    slider[0].classList.add('active');

}

init();

nextBtn.addEventListener('click', () => {
    if (currentSlider >= numberOfSliders - 1){
        goToSlide(0);
        currentSlider = 0;
        return;
    }
    currentSlider++;
    goToSlide(currentSlider);
})

prevBtn.addEventListener('click', () => {
    if (currentSlider <= 0){
        goToSlide(numberOfSliders - 1);
        currentSlider = numberOfSliders - 1;
        return;
    }
    currentSlider--;
    goToSlide(currentSlider);
})

function goToSlide(slideNumber) {
    sliderContainer.style.transform = 'translateX(-' + sliderWidth * slideNumber + 'px)'
}


// owl carousel


