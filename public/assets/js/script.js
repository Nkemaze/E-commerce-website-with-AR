var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
    showSlides(slideIndex += n);
}

function currentSlide(n){
    showSlides(slideIndex = n);
}

function showSlides(n){
    var i;
    var slides = document.getElementsByClassName("myslides");
    var dots = document.getElementsByClassName("dots");
    if(n > slides.length){
        slideIndex = 1
    }
    if(n < 1){
        slideIndex = slides.length
    }
    for(i = 0; i < slides.length; i++){
        slides[i].style.display= "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

function showSidebar(){
    event.preventDefault();
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}

function hideSidebar(){
    event.preventDefault();
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}

document.addEventListener('DOMContentLoaded', (event) => {
    const slideshowContainer = document.querySelector('.slideshow-container');
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'style') {
                const slides = document.getElementsByClassName("myslides");
                if (slides[0].style.display === "block") {
                    slideshowContainer.id = 'jump';
                } else {
                    slideshowContainer.id = '';
                }
            }
        });
    });

    const config = { attributes: true, childList: false, subtree: false };
    const slides = document.getElementsByClassName("myslides");
    for (let i = 0; i < slides.length; i++) {
        observer.observe(slides[i], config);
    }
});

document.addEventListener('DOMSubtreeModified', function() {
    const firstElement = document.querySelector('.first');
    const slideshowContainer = document.querySelector('.slideshow-container');
    if (slideshowContainer.id === 'jump') {
        firstElement.style.display = 'flex';
    } else {
        firstElement.style.display = 'none';
    }
});
