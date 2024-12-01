document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('foodOrderForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Mencegah reload halaman setelah submit

        const name = document.getElementById('name').value;
        const food = document.getElementById('food').value;
        const drink = document.getElementById('drink').value;
        const foodQuantity = document.getElementById('quantity').value;
        const drinkQuantity = document.getElementById('drinkQuantity').value;
        const address = document.getElementById('address').value;

        // Pop-up konfirmasi pesanan
        const isConfirmed = confirm(`Pesanan Anda:\nNama: ${name}\nMakanan: ${food} (${foodQuantity} Porsi)\nMinuman: ${drink} (${drinkQuantity} Porsi)\nAlamat: ${address}\n\nApakah Anda yakin ingin memesan?`);

        if (isConfirmed) {
            // Tampilkan tampilan loading
            showLoading();

            // Simulasi proses loading selama 2 detik, lalu tampilkan ucapan terima kasih dan animasi
            setTimeout(function () {
                hideLoading();
                showThankYouMessage();
            }, 2000); // 2 detik
        }
    });

    function showLoading() {
        const loadingDiv = document.createElement('div');
        loadingDiv.id = 'loading';
        loadingDiv.innerHTML = '<p>Loading...</p>';
        loadingDiv.style.position = 'fixed';
        loadingDiv.style.top = '50%';
        loadingDiv.style.left = '50%';
        loadingDiv.style.transform = 'translate(-50%, -50%)';
        loadingDiv.style.fontSize = '24px';
        loadingDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        loadingDiv.style.color = 'white';
        loadingDiv.style.padding = '20px';
        loadingDiv.style.borderRadius = '10px';
        document.body.appendChild(loadingDiv);
    }

    function hideLoading() {
        const loadingDiv = document.getElementById('loading');
        if (loadingDiv) {
            document.body.removeChild(loadingDiv);
        }
    }

    function showThankYouMessage() {
        const thankYouDiv = document.createElement('div');
        thankYouDiv.id = 'thankyou';
        thankYouDiv.innerHTML = `
            <p>Terima kasih telah memesan! 😊</p>
            <div class="animation">🎉🎉🎉</div>
        `;
        thankYouDiv.style.position = 'fixed';
        thankYouDiv.style.top = '50%';
        thankYouDiv.style.left = '50%';
        thankYouDiv.style.transform = 'translate(-50%, -50%)';
        thankYouDiv.style.fontSize = '24px';
        thankYouDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        thankYouDiv.style.color = 'white';
        thankYouDiv.style.padding = '20px';
        thankYouDiv.style.borderRadius = '10px';
        thankYouDiv.style.textAlign = 'center';

        const animation = thankYouDiv.querySelector('.animation');
        animation.style.fontSize = '30px';
        animation.style.animation = 'bounce 1s infinite';

        document.body.appendChild(thankYouDiv);

        setTimeout(function () {
            if (thankYouDiv) {
                document.body.removeChild(thankYouDiv);
            }
        }, 3000);
    }

    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    `;
    document.head.appendChild(style);
});
