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
        <h1>Tambah Data Kepegawaian</h1>
        <form method="post" action="create.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIP:</label>
                <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP Anda" required>
            </div>
            <div class="form-group">
                <label>Nama Pegawai:</label>
                <input type="text" name="nama_pegawai" class="form-control" placeholder="Masukkan Nama Anda" required>
            </div>
            <div class="form-group">
                <label>Kota Kelahiran:</label>
                <input type="text" name="kota_kelahiran" class="form-control" placeholder="Masukkan Kota Kelahiran Anda" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="kelahiran" class="form-control" placeholder="Pilih Tanggal Kelahiran Anda" required>
            </div>
            <div class="form-group">
                <label>Mata Pelajaran:</label>
                <input type="text" name="matpel" class="form-control" placeholder="Masukkan Mata Pelajaran" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <input type="radio" name="jk" value="L" id="jkL" class="form-check-input" required>
                    <label for="jkL" class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="jk" value="P" id="jkP" class="form-check-input" required>
                    <label for="jkP" class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="email" name="username" class="form-control" placeholder="Nama@gmail.com" required>
            </div>
            <div class="form-group">
                <label>Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
        </form>
        
        <?php
        include 'db.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nip = $_POST["nip"];
            $nama_pegawai = $_POST["nama_pegawai"];
            $kota_kelahiran = $_POST["kota_kelahiran"];
            $kelahiran = $_POST["kelahiran"];
            $matpel = $_POST["matpel"];
            $jk = $_POST["jk"];
            $status = $_POST["status"];
            $username = $_POST["username"];
        
            // Handle file upload
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    $foto = $_FILES["foto"]["name"];
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $foto = "";
                }
            } else {
                $foto = "";
            }

            $sql = "INSERT INTO tbl_kepegawaian (nip, nama_pegawai, kota_kelahiran, kelahiran, matpel, jk, status, username, foto)
                    VALUES ('$nip', '$nama_pegawai', '$kota_kelahiran', '$kelahiran', '$matpel', '$jk', '$status', '$username', '$foto')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </article>
</section>

<footer>
    <p>copyright@kaila</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>
