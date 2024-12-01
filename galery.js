// Mengatur gambar menjadi bergantian satu persatu
function slideImages() {
    // Reset semua gambar ke ukuran normal
    images.forEach((image, index) => {
        image.style.transform = 'scale(1)';
        image.style.transition = 'transform 0.5s ease-out';
    });

    // Gambar saat ini akan membesar di tengah
    images[currentIndex].style.transform = 'scale(1.5)';
    
    // Geser slider ke posisi gambar saat ini
    slider.style.transform = `translateX(-${sliderWidth * currentIndex}px)`;
    slider.style.transition = 'transform 1s ease';

    // Update index gambar berikutnya
    currentIndex = (currentIndex + 1) % totalImages; // Loop kembali ke awal setelah gambar terakhir
}

// Slide otomatis dengan interval
setInterval(slideImages, 3000); // Mengatur waktu antar slide (3 detik)

document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.image-grid');
    const images = document.querySelectorAll('.image-card');
    let currentIndex = 0;
    const totalImages = images.length;
    const sliderWidth = slider.clientWidth;
  
    // Mengatur gambar menjadi bergantian satu persatu
    function slideImages() {
      // Reset semua gambar ke ukuran normal
      images.forEach((image, index) => {
        image.style.transform = 'scale(1)';
        image.style.transition = 'transform 0.5s ease-out';
      });
  
      // Gambar saat ini akan membesar di tengah
      images[currentIndex].style.transform = 'scale(1.5)';
      images[currentIndex].style.transition = 'transform 0.5s ease-out';
  
      // Geser slider ke posisi gambar saat ini
      slider.style.transform = `translateX(-${sliderWidth * currentIndex}px)`;
      slider.style.transition = 'transform 1s ease';
  
      // Update index gambar berikutnya
      currentIndex = (currentIndex + 1) % totalImages; // Loop kembali ke awal setelah gambar terakhir
    }
  
    // Slide otomatis dengan interval
    setInterval(slideImages, 3000); // Mengatur waktu antar slide (3 detik)
  
    // Add animation to slide images one by one to the right
    images.forEach((image, index) => {
      image.style.animation = `slide-right ${index * 0.5}s forwards`;
    });
  
    // Add keyframe animation to slide images to the right
    const style = document.createElement('style');
    style.innerHTML = `
      @keyframes slide-right {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(0);
        }
      }
    `;
    document.head.appendChild(style);
  });