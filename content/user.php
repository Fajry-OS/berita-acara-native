<?php
$queryUser = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
?>

<div class="mb-3" align="right">
    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Level</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($rowUser = mysqli_fetch_assoc($queryUser)):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rowUser['fullname'] ?></td>
                <td><?= $rowUser['email'] ?></td>
                <td>
                    <a href="?pg=user-role&id_user=<?= $rowUser['id'] ?>" class="btn btn-warning btn-sm">User Level</a>
                    <a href="?pg=tambah-user&edit=<?= $rowUser['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="?pg=tambah-user&delete=<?= $rowUser['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>