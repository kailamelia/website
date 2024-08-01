<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header>
  <h2>Data Kepegawaian</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="index.php">Tampil</a></li>
      <li><a href="create.php">Tambah</a></li>
      <li><a href="#">Cetak</a></li>
    </ul>
  </nav>
  
  <article>
  <h1>Tampil Data Pegawai</h1>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Kota Kelahiran</th>
                        <th>Tanggal Lahir</th>
                        <th>Mata Pelajaran</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Username</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM tbl_kepegawaian";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_kepegawaian"]. "</td>
                                <td>" . $row["nip"]. "</td>
                                <td>" . $row["nama_pegawai"]. "</td>
                                <td>" . $row["kota_kelahiran"]. "</td>
                                <td>" . $row["kelahiran"]. "</td>
                                <td>" . $row["matpel"]. "</td>
                                <td>" . $row["jk"]. "</td>
                                <td>" . $row["status"]. "</td>
                                <td>" . $row["username"]. "</td>
                                <td><img src='uploads/" . $row["foto"]. "' alt='Foto' width='50'></td>
                                <td>
                                    <a href='update.php?id=" . $row["id_kepegawaian"]. "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete.php?id=" . $row["id_kepegawaian"]. "' class='btn btn-danger btn-sm' onclick='return confirmDelete()'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>0 results</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </article>
</section>

<footer>
    <p>copyright@kaila</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>

<?php
for ($x = -100; $x <= 10; $x++) {
    echo $x;
    if ($x < 10) { // Tambahkan koma setelah setiap angka kecuali yang terakhir
        echo ", ";
    }
}
echo "<br><br>"; // Tambahkan baris baru untuk pemisah setelah loop
?>


<?php
$x = -100;
while ($x <= 10) {
    echo $x;
    if ($x < 10) { // Tambahkan spasi setelah setiap angka kecuali yang terakhir
        echo " ";
    }
    $x++;
}
echo "<br><br>"; // Tambahkan baris baru untuk pemisah setelah loop
?>


<?php
$x = -100;
do {
    echo $x;
    if ($x < 10) { // Tambahkan spasi setelah setiap angka kecuali yang terakhir
        echo " ";
    }
    $x++;
} while ($x <= 10);
echo "<br><br>"; // Tambahkan baris baru untuk pemisah setelah loop
?>


