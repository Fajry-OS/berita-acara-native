<?php

if (isset($_POST['simpan'])) {
    $level_id = $_POST['level_id'];
    $user_id = $_GET['id_user'];

    $insert = mysqli_query($koneksi, "INSERT INTO user_levels (level_id, user_id) VALUES ('$level_id', '$user_id')");
    header("location:?pg=user-role&id_user=" . urlencode($user_id) . "&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
    header("location:?pg=user&hapus=berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $id = $_GET['edit'];
    $update = mysqli_query($koneksi, "UPDATE users SET fullname='$fullname', email='$email', password='$password' WHERE id = '$id'");
    header("location:?pg=user&ubah=berhasil");
}

$queryLevels = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");


?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level</label>
        </div>
        <div class="col-sm-6">
            <select name="level_id" id="" class="form-control">
                <option value="">Pilih Level</option>
                <?php while ($rowLevel = mysqli_fetch_assoc($queryLevels)): ?>
                    <option value="<?= $rowLevel['id'] ?>"><?= $rowLevel['level_name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
    </div>
    <div class="mb-3 offset-md-2">
        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
            <?= isset($_GET['edit']) ? 'Ubah' : 'Simpan' ?>
        </button>
        <button class="btn btn-secondary" type="button" onclick="window.location.href='?pg=user'">
            Kembali
        </button>
    </div>
</form>