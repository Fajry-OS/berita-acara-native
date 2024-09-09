<?php
if (isset($_POST['simpan'])) {
    $level_name = $_POST['level_name'];
    $insert = mysqli_query($koneksi, "INSERT INTO levels (level_name) VALUES ('$level_name')");
    header("location:?pg=level&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id = '$id'");
    header("location:?pg=level&hapus=berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $level_name = $_POST['level_name'];
    $update = mysqli_query($koneksi, "UPDATE levels SET level_name='$level_name' WHERE id = '$id'");
    header("location:?pg=level&ubah=berhasil");
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="level_name" placeholder="Nama Level" value="<?= $rowEdit['level_name'] ?? '' ?>">
        </div>
    </div>
    <div class="mb-3 offset-md-2">
        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
            <?= isset($_GET['edit']) ? 'Ubah' : 'Simpan' ?>
        </button>
        <button class="btn btn-secondary" type="button" onclick="window.location.href='?pg=level'">
            Kembali
        </button>
        <!-- Jika kembali menggunakan tag a -->
        <!-- 
        <a href="?pg=level" class="btn btn-secondary">
            Kembali
        </a> 
        -->
    </div>
</form>