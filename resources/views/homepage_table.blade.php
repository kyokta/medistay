<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Daftar Rumah Sakit</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Rumah Sakit</th>
                <th>Alamat Rumah Sakit</th>
                <th>Jumlah Kamar</th>
                <th>Spesialisasi</th>
                <th>Jumlah Kamar Terisi</th>
                <th>Jumlah Kamar Kosong</th>
                <th>Usia Pasien</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ambil data rumah sakit dari database
            $hospitals = App\Models\Hospital::all();

            // Loop melalui setiap rumah sakit dan tampilkan informasinya
            foreach ($hospitals as $hospital) {
                ?>
                <tr>
                    <td><?php echo $hospital->nama_rumah_sakit; ?></td>
                    <td><?php echo $hospital->alamat_rumah_sakit; ?></td>
                    <td><?php echo $hospital->jumlah_kamar; ?></td>
                    <?php
                    // Ambil data kamar rumah sakit terkait
                    $rooms = $hospital->rsRooms;

                    // Jika ada data kamar, tampilkan informasinya
                    if ($rooms) {
                        foreach ($rooms as $room) {
                            ?>
                            <td><?php echo $room->spesialisasi; ?></td>
                            <td><?php echo $room->jumlah_kamar_terisi; ?></td>
                            <td><?php echo $room->jumlah_kamar_kosong; ?></td>
                            <td><?php echo $room->usia; ?></td>
                            <?php
                        }
                    } else {
                        // Jika tidak ada data kamar, tampilkan kolom kosong
                        ?>
                        <td colspan="4">-</td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>

