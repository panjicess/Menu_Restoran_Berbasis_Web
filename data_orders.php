<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "menurestorandb"; // Ganti dengan nama database Anda
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menambahkan data ke dalam tabel orders
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $food = $_POST['food'];
    $food_quantity = $_POST['quantity'];
    $drink = $_POST['drink'];
    $drink_quantity = $_POST['drinkQuantity'];
    $address = $_POST['address'];

    // Query untuk menambahkan data
    $sql = "INSERT INTO orders (name, food, food_quantity, drink, drink_quantity, address) 
            VALUES ('$name', '$food', '$food_quantity', '$drink', '$drink_quantity', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesanan berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Edit data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $food = $_POST['food'];
    $food_quantity = $_POST['quantity'];
    $drink = $_POST['drink'];
    $drink_quantity = $_POST['drinkQuantity'];
    $address = $_POST['address'];

    // Query untuk mengupdate data
    $sql = "UPDATE orders SET name='$name', food='$food', food_quantity='$food_quantity', 
            drink='$drink', drink_quantity='$drink_quantity', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesanan berhasil diperbarui!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Hapus data
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM orders WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesanan berhasil dihapus!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Ambil data dari tabel orders untuk ditampilkan
$sql_select = "SELECT id, name, food, food_quantity, drink, drink_quantity, address FROM orders";
$result = $conn->query($sql_select);

// Tampilkan data dalam bentuk tabel
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Data Pesanan</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container mt-4'>
        <h2>Data Pesanan</h2>";

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped table-hover'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Food</th>
                    <th>Food Quantity</th>
                    <th>Drink</th>
                    <th>Drink Quantity</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";
    // Output data per baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["food"] . "</td>
                <td>" . $row["food_quantity"] . "</td>
                <td>" . $row["drink"] . "</td>
                <td>" . $row["drink_quantity"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>
                    <a href='?edit_id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='?delete_id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-info'>Tidak ada data pesanan.</div>";
}

// Menampilkan form edit jika id diedit
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $sql_edit = "SELECT * FROM orders WHERE id=$edit_id";
    $result_edit = $conn->query($sql_edit);
    $row = $result_edit->fetch_assoc();

    echo "<h3>Edit Pesanan</h3>
          <form method='POST'>
              <input type='hidden' name='id' value='" . $row["id"] . "'>
              <input type='hidden' name='action' value='edit'>
              <div class='form-group'>
                  <label for='name'>Name:</label>
                  <input type='text' class='form-control' id='name' name='name' value='" . $row["name"] . "' required>
              </div>
              <div class='form-group'>
                  <label for='food'>Food:</label>
                  <input type='text' class='form-control' id='food' name='food' value='" . $row["food"] . "' required>
              </div>
              <div class='form-group'>
                  <label for='quantity'>Food Quantity:</label>
                  <input type='number' class='form-control' id='quantity' name='quantity' value='" . $row["food_quantity"] . "' required>
              </div>
              <div class='form-group'>
                  <label for='drink'>Drink:</label>
                  <input type='text' class='form-control' id='drink' name='drink' value='" . $row["drink"] . "' required>
              </div>
              <div class='form-group'>
                  <label for='drinkQuantity'>Drink Quantity:</label>
                  <input type='number' class='form-control' id='drinkQuantity' name='drinkQuantity' value='" . $row["drink_quantity"] . "' required>
              </div>
              <div class='form-group'>
                  <label for='address'>Address:</label>
                  <input type='text' class='form-control' id='address' name='address' value='" . $row["address"] . "' required>
              </div>
              <button type='submit' class='btn btn-primary'>Update</button>
          </form>";
}

echo "</div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>";

// Tutup koneksi
$conn->close();
?>
