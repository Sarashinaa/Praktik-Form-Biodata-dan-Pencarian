<?php
session_start();


if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array();
}

$kata_kunci = '';
$hasil_pencarian = array();
$pencarian_dilakukan = false;


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['kata_kunci'])) {
    $kata_kunci = $_GET['kata_kunci'];
    $pencarian_dilakukan = true;
    
    if (!empty($kata_kunci) && !empty($_SESSION['mahasiswa'])) {
        foreach ($_SESSION['mahasiswa'] as $mhs) {
          
            if (stripos($mhs['nama'], $kata_kunci) !== false ||
                stripos($mhs['nim'], $kata_kunci) !== false ||
                stripos($mhs['prodi'], $kata_kunci) !== false ||
                stripos($mhs['jenis_kelamin'], $kata_kunci) !== false ||
                stripos($mhs['hobi'], $kata_kunci) !== false ||
                stripos($mhs['alamat'], $kata_kunci) !== false) {
                $hasil_pencarian[] = $mhs;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data Mahasiswa</title>
    <link rel="stylesheet" href="pencarian.css">
</head>
<body>
    <div class="container">
        <h1>Pencarian Data Mahasiswa</h1>
        
        <form method="GET" action="">
            <div class="form-group">
                <label for="kata_kunci">Kata Kunci Pencarian:</label>
                <input type="text" id="kata_kunci" name="kata_kunci" 
                       value="<?php echo htmlspecialchars($kata_kunci); ?>" 
                       placeholder="Masukkan nama, NIM, atau kata kunci lainnya...">
                <button type="submit">Cari</button>
            </div>
        </form>
        
        <?php if ($pencarian_dilakukan && !empty($kata_kunci)): ?>
            <?php if (!empty($hasil_pencarian)): ?>
                <div class="search-result">
                    <h3>Anda mencari data dengan kata kunci: "<?php echo htmlspecialchars($kata_kunci); ?>"</h3>
                    <p>Ditemukan <?php echo count($hasil_pencarian); ?> hasil:</p>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Jenis Kelamin</th>
                            <th>Hobi</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($hasil_pencarian as $mhs): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($mhs['nama']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['nim']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['prodi']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['jenis_kelamin']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['hobi']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['alamat']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-result">
                    <h3>Anda mencari data dengan kata kunci: "<?php echo htmlspecialchars($kata_kunci); ?>"</h3>
                    <p>Maaf, tidak ditemukan data yang cocok dengan kata kunci tersebut.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <div class="navigation">
            <a href="biodata.php">Kembali ke Form Biodata</a>
        </div>
    </div>
</body>
</html>