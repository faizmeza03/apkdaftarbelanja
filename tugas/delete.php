<?php
include 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM shopping_list WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "<p class='success'>Item berhasil dihapus.</p>";
    header("Refresh: 0.1; url=index.php"); // Redirect ke halaman utama setelah 2 detik
} else {
    echo "<p class='error'>Gagal menghapus item.</p>";
}
?>