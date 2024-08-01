<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_kepegawaian WHERE id_kepegawaian='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
