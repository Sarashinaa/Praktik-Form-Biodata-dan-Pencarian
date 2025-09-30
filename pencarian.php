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
            // Cari di semua field
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
    <div class="theme-toggle" onclick="toggleTheme()">
        <span class="theme-toggle-icon">🌙</span>
        <span class="theme-toggle-text">Dark Mode</span>
    </div>

    <div class="container">
        <div class="search-container">
            <h1>🔍 Pencarian Data Mahasiswa</h1>
            
            <form method="GET" action="">
                <div class="form-group">
                    <label for="kata_kunci">🔎 Kata Kunci Pencarian</label>
                    <div class="search-input-group">
                        <input type="text" id="kata_kunci" name="kata_kunci" 
                               value="<?php echo htmlspecialchars($kata_kunci); ?>" 
                               placeholder="Masukkan nama, NIM, program studi, atau kata kunci lainnya...">
                        <button type="submit">🔍 Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
        
        <?php if ($pencarian_dilakukan && !empty($kata_kunci)): ?>
            <div class="result-container">
                <?php if (!empty($hasil_pencarian)): ?>
                    <div class="search-result">
                        <h3>✅ Hasil Pencarian untuk: "<?php echo htmlspecialchars($kata_kunci); ?>"</h3>
                        <p>🎯 Ditemukan <?php echo count($hasil_pencarian); ?> data yang sesuai</p>
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
                        <h3>⚠️ Pencarian untuk: "<?php echo htmlspecialchars($kata_kunci); ?>"</h3>
                        <p>📭 Maaf, tidak ditemukan data yang cocok dengan kata kunci tersebut. Silakan coba kata kunci lain.</p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="navigation">
            <a href="biodata.php">📝 Kembali ke Form Biodata</a>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.querySelector('.theme-toggle');
            const themeIcon = document.querySelector('.theme-toggle-icon');
            const themeText = document.querySelector('.theme-toggle-text');
            
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                themeIcon.textContent = '☀️';
                themeText.textContent = 'Light Mode';
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.textContent = '🌙';
                themeText.textContent = 'Dark Mode';
                localStorage.setItem('theme', 'light');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const body = document.body;
            const themeIcon = document.querySelector('.theme-toggle-icon');
            const themeText = document.querySelector('.theme-toggle-text');
            
            if (savedTheme === 'dark') {
                body.classList.add('dark-mode');
                themeIcon.textContent = '☀️';
                themeText.textContent = 'Light Mode';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('kata_kunci');
            const searchButton = document.querySelector('button[type="submit"]');
            
            searchInput.addEventListener('focus', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 0 0 4px rgba(0, 122, 255, 0.1)';
            });
            
            searchInput.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
            
            let typingTimer;
            searchInput.addEventListener('keyup', function() {
                clearTimeout(typingTimer);
                this.style.borderColor = '#FF9500';
                typingTimer = setTimeout(() => {
                    this.style.borderColor = '';
                }, 1000);
            });
        });
    </script>
</body>
</html>