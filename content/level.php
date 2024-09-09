<?php
$queryLevel = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC")
?>

<div class="mb-3" align="right">
    <a href="?pg=tambah-level" class="btn btn-primary">Tambah Level</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($rowLevel = mysqli_fetch_assoc($queryLevel)):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rowLevel['level_name'] ?></td>
                <td>Edit | Delete</td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>