<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tampil data dari database</title>
    </head>
    <body>
        <?php
        include "koneksi.php";
        include "function.php";
        ?>
        <table border="1" width="800px" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mulai Kerja</th>
                    <th>Selesai Kerja</th>
                    <th>Lama Kerja</th>
                    <th>Honor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($connect, "SELECT * from tb_user");
                while($row = mysqli_fetch_array($data)){
                    ?>

                <tr>
                    <td><?= $row['id_user'];?></td>
                    <td><?= $row['nama'];?></td>
                    <td><?= $row['tgl_mulaikerja'];?></td>
                    <td><?= $row['tgl_selesaikerja'];?></td>
                    <td><?= $row['lama_kerja'];?></td>
                    <td><?= $row['honor'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
