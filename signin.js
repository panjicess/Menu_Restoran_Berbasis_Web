document.addEventListener('DOMContentLoaded', function () {
    const signInForm = document.getElementById('sign-in-form');

    signInForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Mencegah pengiriman form default
        // Logika autentikasi dapat ditambahkan di sini

        // Redirect ke halaman utama setelah proses login
        window.location.href = 'index.html'; // Ganti dengan nama file halaman utama Anda
    });
});
