let currentIndex = 0;

function swipeImages() {
    const carouselContainer = document.querySelector('.carousel-container');
    const totalItems = document.querySelectorAll('.carousel-item').length;

    // Update the index
    currentIndex = (currentIndex + 1) % totalItems;

    // Apply the transformation
    carouselContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Automatically swipe images every 3 seconds
setInterval(swipeImages, 3000);
