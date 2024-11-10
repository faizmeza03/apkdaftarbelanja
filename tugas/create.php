<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Item</h1>

    <form action="create.php" method="post">
        <label for="item_name">Nama Item:</label>
        <input type="text" name="item_name" id="item_name" required>

        <label for="quantity">Jumlah:</label>
        <input type="number" name="quantity" id="quantity" required>

        <button type="submit" class="btn">Simpan</button>
    </form>

    <?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];

        $query = "INSERT INTO shopping_list (item_name, quantity) VALUES ('$item_name', $quantity)";

        if (mysqli_query($conn, $query)) {
            echo "<p class='success'>Item berhasil ditambahkan.</p>";
            header("Refresh: 0.1; url=index.php"); // Redirect ke halaman utama setelah 2 detik
        } else {
            echo "<p class='error'>Gagal menambahkan item.</p>";
        }
    }
    ?>

</body>
</html>