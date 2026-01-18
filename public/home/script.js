// Define the function globally
function handleButtonClick(url) {
    // Stop the slider if it exists
    if (window.slideInterval) {
        clearInterval(window.slideInterval);
    }
    window.location.href = url;
}

document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let total = slides.length;
    let currentIndex = 0;
    window.slideInterval = null; // Make interval accessible globally
    const slideDuration = 10000;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
        updateCounter();
    }

    function updateCounter() {
        const counterElement = document.getElementById('counter-text');
        if (counterElement) {
            counterElement.textContent = `${currentIndex + 1}/${total}`;
        }
    }

    function startSlider() {
        stopSlider();
        window.slideInterval = setInterval(nextSlide, slideDuration);
    }

    function stopSlider() {
        if (window.slideInterval) {
            clearInterval(window.slideInterval);
        }
    }

    function nextSlide() {
        if (slides.length > 0) {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }
    }

    // Initialize slider controls
    if (prevButton) {
        prevButton.addEventListener('click', () => {
            stopSlider();
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        });
    }

    if (nextButton) {
        nextButton.addEventListener('click', () => {
            stopSlider();
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        });
    }

    // Start the slider initially
    if (slides.length > 0) {
        startSlider();
        showSlide(currentIndex);
    }







    const slidesp = document.querySelectorAll('.projet-card-container');
    const prevPButton = document.querySelector('.nextp');
    const nextPButton = document.querySelector('.prevp');

    let currentIndexp = 0;

    const EvContainer = document.querySelectorAll('.event-group');
    const prevEButton = document.querySelector('.ev-prev');
    const nextEButton = document.querySelector('.ev-next');

    let EvIndex = 0;
    const docSlides = document.querySelectorAll('.document-card-container');
    const docPrevButton = document.querySelector('.doc-prev');
    const docNextButton = document.querySelector('.doc-next');
    let currentDocIndex = 0;

    function showDocSlide(index) {
        docSlides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    if (docPrevButton && docNextButton) {
        docPrevButton.addEventListener('click', () => {
            currentDocIndex = (currentDocIndex - 1 + docSlides.length) % docSlides.length;
            showDocSlide(currentDocIndex);
        });
    
        docNextButton.addEventListener('click', () => {
            currentDocIndex = (currentDocIndex + 1) % docSlides.length;
            showDocSlide(currentDocIndex);
        });
    
        // Initialize document slider
        showDocSlide(currentDocIndex);
    }


    function updateSlider(index) {
        EvContainer.forEach((head, i) => {
            let eventCard = document.getElementById(`event-card-${i}`); 
            // console.log(eventCard)
            eventCard.style.display ='none' ;
        });
        const eventCarde = document.getElementById(`event-card-${index}`); 

        if (eventCarde) {
            eventCarde.style.display = eventCarde.style.display === 'none' ? 'grid' : 'none';
        }

    }

    // Event listeners for navigation
    if (prevEButton && nextEButton){

        prevEButton.addEventListener('click', () => {
            EvIndex = (EvIndex - 1 + EvContainer.length) % EvContainer.length;
            updateSlider(EvIndex);
        });
    
        nextEButton.addEventListener('click', () => {
            EvIndex = (EvIndex + 1) % EvContainer.length;
            updateSlider(EvIndex);
        });
    
        // Initialize slider
        updateSlider(EvIndex);
    }


   


  


    function showSlidep(index) {
        slidesp.forEach((slidee, i) => {
            slidee.classList.toggle('active', i === index);
            console.log('cd', i);
        });
    }
    if (prevPButton){

        prevPButton.addEventListener('click', () => {
            currentIndexp = (currentIndexp - 1 + slidesp.length) % slidesp.length;
            showSlidep(currentIndexp);
            console.log('prev',currentIndexp);
    
        });
    }
    if (nextPButton){

        nextPButton.addEventListener('click', () => {
            currentIndexp = (currentIndexp + 1) % slidesp.length;
            showSlidep(currentIndexp);
            console.log('next',currentIndexp);
    
        });
    }
    showSlidep(currentIndexp);
    function showDocSlide(index) {
        docSlides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            console.log('clicked');
        });
    }
    
    if (docPrevButton && docNextButton) {
        docPrevButton.addEventListener('click', () => {
            if (currentDocIndex > 0) {
                currentDocIndex--;
                showDocSlide(currentDocIndex);
            }
            console.log('clicked');
    
        });
    
        docNextButton.addEventListener('click', () => {
            if (currentDocIndex < docSlides.length - 3) {
                currentDocIndex++;
                showDocSlide(currentDocIndex);
            }
            console.log('clicked');
    
        });
    
        // Initialize document slider
        showDocSlide(currentDocIndex);
    }
});




