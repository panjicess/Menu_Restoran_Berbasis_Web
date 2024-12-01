window.addEventListener("load", function() {
    const menuCards = document.querySelectorAll('.menu-card');

    menuCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, index * 200); 
    });
});

const menuCards = document.querySelectorAll('.menu-card');

menuCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        card.style.transform = 'scale(1.05)'; 
        card.style.transition = 'transform 0.3s ease'; 
    });

    card.addEventListener('mouseleave', function() {
        card.style.transform = 'scale(1)'; 
    });
});

function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

window.addEventListener('scroll', function() {
    menuCards.forEach((card, index) => {
        if (isInViewport(card)) {
            setTimeout(() => {
                card.style.opacity = 1;
                card.style.transform = 'translateY(0)';
            }, index * 200); 
        }
    });
});
