  // Select the element to add the shadow effect
  const secNavbar = document.querySelector('.sec_navbar');

  // Function to add or remove shadow based on scroll position
  function toggleShadow() {
    if (window.scrollY > 0) {
      secNavbar.classList.add('shadow');
    } else {
      secNavbar.classList.remove('shadow');
    }
  }

  // Add scroll event listener to window
  window.addEventListener('scroll', toggleShadow);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CAROUSEL
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Targets the classes from css
const carouselContainer = document.querySelector('.col_12_read_carousel_container');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const dotsContainer = document.querySelector('.carousel-dots');
const posts = document.querySelectorAll('.col_12_read_carousel_item');

let currentIndex = 0;

function updateCarousel() {
    
    carouselContainer.style.transform = `translateX(-${currentIndex * 100}%)`;

    const activeDot = dotsContainer.querySelector('.active-dot');
    if (activeDot) {
        activeDot.classList.remove('active-dot');
    }
    dotsContainer.children[currentIndex].classList.add('active-dot');
}

function moveToNext() {
    currentIndex = (currentIndex + 1) % posts.length;
    updateCarousel();
}

function moveToPrev() {
    currentIndex = (currentIndex - 1 + posts.length) % posts.length;
    updateCarousel();
}

function createDots() {
    
    for (let i = 0; i < posts.length; i++) {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (i === currentIndex) {
            dot.classList.add('active-dot');
        }
        dot.addEventListener('click', () => {
            currentIndex = i;
            updateCarousel();
        });
        dotsContainer.appendChild(dot);
    }
}

nextBtn.addEventListener('click', moveToNext);
prevBtn.addEventListener('click', moveToPrev);
createDots();

//Controls the auto-scroll function
//Should only scroll if the mouse isn't on the carousel.
function autoMove() {
    moveToNext();
}

let autoMoveInterval = setInterval(autoMove, 32000);

carouselContainer.addEventListener('mouseenter', () => {
    clearInterval(autoMoveInterval);
});

carouselContainer.addEventListener('mouseleave', () => {
    autoMoveInterval = setInterval(autoMove, 32000); //Controls the speed of the carousel swaps in miliseconds. Don't put below this number, it's too fast otherwise.
});