<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Item</h1>

    <?php
    include 'db.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM shopping_list WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];

            $query = "UPDATE shopping_list SET item_name = '$item_name', quantity = $quantity WHERE id = $id";

            if (mysqli_query($conn, $query)) {
                echo "<p class='success'>Item berhasil diubah.</p>";
                header("Refresh: 0.1; url=index.php"); // Redirect ke halaman utama setelah 2 detik
            } else {
                echo "<p class='error'>Gagal mengubah item.</p>";
            }
        }

        echo "<form action='update.php?id=" . $id . "' method='post'>";
        echo "<label for='item_name'>Nama Item:</label>";
        echo "<input type='text' name='item_name' id='item_name' value='" . $row['item_name'] . "' required>";

        echo "<label for='quantity'>Jumlah:</label>";
        echo "<input type='number' name='quantity' id='quantity' value='" . $row['quantity'] . "' required>";

        echo "<button type='submit' class='btn'>Simpan</button>";
        echo "</form>";
    } else {
        echo "<p class='error'>Item tidak ditemukan.</p>";
    }
    ?>

</body>
</html>