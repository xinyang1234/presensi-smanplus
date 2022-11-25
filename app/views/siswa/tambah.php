<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
</head>
<?php
    if (isset($_POST['submit'])) {
        $siswaController = new siswaController;
        $siswaController->save();
    }
?>
<body>
    <form method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>nis</label>
                <input type="text" class="form-control" placeholder="masukkan nis siswa..." name="nis">
            </div>
            <div class="form-group">
                <label>nama siswa</label>
                <input type="text" class="form-control" placeholder="masukkan nama siswa..." name="nama_siswa">
            </div>
            <div class="form-group">
                <label>alamat</label>
                <input type="text" class="form-control" placeholder="masukkan alamat siswa..." name="alamat">
            </div>
            <div class="form-group">
                <label>no telp</label>
                <input type="text" class="form-control" placeholder="masukkan no telp siswa..." name="no_telp">
            </div>
            <div class="form-group">
                <label>jenis kelamin</label>
                <input type="text" class="form-control" placeholder="masukkan jenis kelamin siswa..." name="jenis_kelamin">
            </div>
            <div class="form-group">
                <label>tanggal lahir</label>
                <input type="text" class="form-control" placeholder="masukkan tanggal lahir siswa..." name="tanggal_lahir">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">simpan</button>
        </div>
    </form>
    <?php Message::flash(); ?>
</body>

</html>