<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Belanja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Belanja</h1>

    <a href="create.php" class="btn">Tambah Item</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';

            $query = "SELECT * FROM shopping_list";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>
                            <a href='update.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus item ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>