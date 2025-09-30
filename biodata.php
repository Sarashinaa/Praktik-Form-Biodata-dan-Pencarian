<?php
session_start();

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : '';
    $alamat = $_POST['alamat'];
    
    $_SESSION['mahasiswa'][] = array(
        'nama' => $nama,
        'nim' => $nim,
        'prodi' => $prodi,
        'jenis_kelamin' => $jenis_kelamin,
        'hobi' => $hobi,
        'alamat' => $alamat
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata Mahasiswa</title>
    <link rel="stylesheet" href="biodata.css">
</head>
<body>
    <div class="container">
        <h1>Form Biodata Mahasiswa</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi:</label>
                <select id="prodi" name="prodi" required>
                    <option value="">Pilih Program Studi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Teknik Kimia">Teknik Kimia</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Statistika">Teknik Statistika</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
                        <label for="laki">Laki-laki</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Hobi:</label>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="membaca" name="hobi[]" value="Membaca">
                        <label for="membaca">Membaca</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="olahraga" name="hobi[]" value="Olahraga">
                        <label for="olahraga">Olahraga</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="musik" name="hobi[]" value="Musik">
                        <label for="musik">Musik</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="traveling" name="hobi[]" value="Traveling">
                        <label for="traveling">Traveling</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="gaming" name="hobi[]" value="Gaming">
                        <label for="gaming">Gaming</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            
            <button type="submit">Simpan Biodata</button>
        </form>
        
        <?php if (!empty($_SESSION['mahasiswa'])): ?>
        <h2>Data Mahasiswa yang Tersimpan</h2>
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
                <?php foreach ($_SESSION['mahasiswa'] as $mhs): ?>
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
        <?php endif; ?>
        
        <div class="navigation">
            <a href="pencarian.php">Ke Halaman Pencarian Data</a>
        </div>
    </div>
</body>
</html>