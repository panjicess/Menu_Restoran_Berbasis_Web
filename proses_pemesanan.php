<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['menu'])) {
        $menu_ids = $_POST['menu'];
        $menu_list = implode(", ", $menu_ids);

        echo "Anda telah memilih menu dengan ID: " . $menu_list;
    } else {
        echo "Tidak ada menu yang dipilih.";
    }
} else {
    echo "Metode request tidak valid.";
}
?>
