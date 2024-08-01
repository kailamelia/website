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
        <h1>Edit Data Kepegawaian</h1>
        <?php
        include 'db.php';
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_kepegawaian WHERE id_kepegawaian='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <form method="post" action="update.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" class="form-control" value="<?php echo $row['nip']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai:</label>
                <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" value="<?php echo $row['nama_pegawai']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kota_kelahiran">Kota Kelahiran:</label>
                <input type="text" id="kota_kelahiran" name="kota_kelahiran" class="form-control" value="<?php echo $row['kota_kelahiran']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kelahiran">Tanggal Lahir:</label>
                <input type="date" id="kelahiran" name="kelahiran" class="form-control" value="<?php echo $row['kelahiran']; ?>" required>
            </div>
            <div class="form-group">
                <label for="matpel">Mata Pelajaran:</label>
                <input type="text" id="matpel" name="matpel" class="form-control" value="<?php echo $row['matpel']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <input type="radio" id="jkL" name="jk" value="L" class="form-check-input" <?php if ($row['jk'] == 'L') echo 'checked'; ?> required>
                    <label for="jkL" class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="jkP" name="jk" value="P" class="form-check-input" <?php if ($row['jk'] == 'P') echo 'checked'; ?> required>
                    <label for="jkP" class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Aktif" <?php if ($row['status'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
                    <option value="Nonaktif" <?php if ($row['status'] == 'Nonaktif') echo 'selected'; ?>>Nonaktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="email" id="username" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" class="form-control">
                <?php if ($row['foto']) { ?>
                    <img src="uploads/<?php echo $row['foto']; ?>" alt="Foto" width="100">
                <?php } ?>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update">
        </form>
        <?php
            } else {
                echo "<p>Data tidak ditemukan.</p>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET['id'];
            $nip = $_POST["nip"];
            $nama_pegawai = $_POST["nama_pegawai"];
            $kota_kelahiran = $_POST["kota_kelahiran"];
            $kelahiran = $_POST["kelahiran"];
            $matpel = $_POST["matpel"];
            $jk = $_POST["jk"];
            $status = $_POST["status"];
            $username = $_POST["username"];
            $foto = $_FILES["foto"]["name"];
            $foto_tmp = $_FILES["foto"]["tmp_name"];

            if ($foto) {
                move_uploaded_file($foto_tmp, "uploads/$foto");
                $sql = "UPDATE tbl_kepegawaian SET nip='$nip', nama_pegawai='$nama_pegawai', kota_kelahiran='$kota_kelahiran', kelahiran='$kelahiran', matpel='$matpel', jk='$jk', status='$status', username='$username', foto='$foto' WHERE id_kepegawaian='$id'";
            } else {
                $sql = "UPDATE tbl_kepegawaian SET nip='$nip', nama_pegawai='$nama_pegawai', kota_kelahiran='$kota_kelahiran', kelahiran='$kelahiran', matpel='$matpel', jk='$jk', status='$status', username='$username' WHERE id_kepegawaian='$id'";
            }

            if ($conn->query($sql) === TRUE) {
                echo "<p>Record updated successfully</p>";
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
