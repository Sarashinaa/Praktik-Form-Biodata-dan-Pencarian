# 🎓 Sistem Manajemen Data Mahasiswa

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**Aplikasi web sederhana untuk mengelola data biodata mahasiswa dengan fitur pencarian yang powerful! 🚀**

</div>

---

## 📋 Deskripsi

Sistem Manajemen Data Mahasiswa adalah aplikasi web berbasis PHP yang memungkinkan pengguna untuk:
- ✅ Menambahkan data biodata mahasiswa
- 🔍 Mencari data mahasiswa dengan kata kunci
- 📊 Menampilkan data dalam format tabel yang rapi
- 💾 Menyimpan data menggunakan PHP Session

## ✨ Fitur Utama

### 🎯 Form Biodata Mahasiswa
- **Input Lengkap**: Nama, NIM, Program Studi, Jenis Kelamin, Hobi, Alamat
- **Validasi Form**: Validasi required field
- **Multiple Selection**: Checkbox untuk multiple hobi
- **Responsive Design**: Design yang responsif untuk semua perangkat

### 🔎 Sistem Pencarian
- **Universal Search**: Pencarian di semua field data
- **Case Insensitive**: Tidak membedakan huruf besar/kecil
- **Real-time Results**: Hasil pencarian ditampilkan langsung
- **No Results Handling**: Pesan khusus ketika tidak ada hasil

### 🎨 User Interface
- **Modern Design**: Interface yang clean dan modern
- **Easy Navigation**: Navigasi yang mudah antar halaman
- **Visual Feedback**: Feedback visual untuk interaksi user
- **Mobile Friendly**: Optimized untuk mobile devices

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Deskripsi |
|-----------|-------|-----------|
| PHP | 7.4+ | Backend logic dan session management |
| HTML5 | - | Struktur halaman web |
| CSS3 | - | Styling dan layout |

## 📁 Struktur Project

```
📦 student-management-system/
├── 📄 biodata.php          # Form input biodata mahasiswa
├── 📄 pencarian.php        # Halaman pencarian data
├── 🎨 biodata.css          # Styling untuk halaman biodata
├── 🎨 pencarian.css        # Styling untuk halaman pencarian
├── 📚 README.md            # Dokumentasi project
```

## 🚀 Instalasi

### Prasyarat
- PHP 7.4 atau lebih tinggi
- Web server (Apache/Nginx) atau PHP built-in server
- Browser modern

### Langkah Instalasi

1. **Clone repository**
```bash
git clone https://github.com/username/student-management-system.git
cd student-management-system
```

2. **Setup web server**
```bash
# Menggunakan PHP built-in server
php -S localhost:8000

# Atau copy ke folder web server
# Apache: /var/www/html/
# Nginx: /var/www/
```

3. **Akses aplikasi**
```
http://localhost:8000/biodata.php
```

## 💻 Penggunaan

### 1. Menambah Data Mahasiswa
1. Buka halaman `biodata.php`
2. Isi semua field yang required:
   - **Nama Lengkap**: Input nama lengkap mahasiswa
   - **NIM**: Nomor Induk Mahasiswa
   - **Program Studi**: Pilih dari dropdown
   - **Jenis Kelamin**: Pilih Laki-laki atau Perempuan
   - **Hobi**: Pilih satu atau lebih hobi (opsional)
   - **Alamat**: Input alamat lengkap
3. Klik tombol **"Simpan Biodata"**
4. Data akan ditampilkan di tabel di bawah form

### 2. Mencari Data Mahasiswa
1. Klik link **"Ke Halaman Pencarian Data"** atau buka `pencarian.php`
2. Masukkan kata kunci pencarian (bisa nama, NIM, program studi, dll.)
3. Klik tombol **"Cari"**
4. Hasil pencarian akan ditampilkan dalam tabel

### 3. Navigasi Antar Halaman
- Dari biodata ke pencarian: Klik link hijau di bawah
- Dari pencarian ke biodata: Klik link biru di bawah

## 🔧 Konfigurasi

### CSS Customization
Anda dapat mengkustomisasi tampilan dengan mengedit file CSS:

- **biodata.css**: Styling untuk halaman form biodata
- **pencarian.css**: Styling untuk halaman pencarian

### Menambah Program Studi
Edit file `biodata.php` pada bagian dropdown:

```php
<select id="prodi" name="prodi" required>
    <option value="">Pilih Program Studi</option>
    <option value="Informatika">Informatika</option>
    <!-- Tambahkan program studi baru di sini -->
    <option value="Program Studi Baru">Program Studi Baru</option>
</select>
```

## 🐛 Troubleshooting

### Masalah Umum

| Masalah | Solusi |
|---------|--------|
| Data tidak tersimpan | Pastikan PHP session aktif dan writable |
| CSS tidak loading | Periksa path file CSS di tag `<link>` |
| Form tidak submit | Periksa attribut `method` dan `action` form |
| Pencarian tidak berfungsi | Pastikan method GET dan parameter benar |

### Error Handling
Aplikasi ini menggunakan basic error handling:
- Validasi required field di frontend
- HTML escaping untuk prevent XSS
- Session management untuk data persistence

## 🤝 Kontribusi

Kontribusi sangat welcome! Berikut cara berkontribusi:

1. **Fork** repository ini
2. **Buat branch** untuk fitur baru (`git checkout -b feature/AmazingFeature`)
3. **Commit** perubahan (`git commit -m 'Add some AmazingFeature'`)
4. **Push** ke branch (`git push origin feature/AmazingFeature`)
5. **Buat Pull Request**

### Development Guidelines
- Follow PSR-12 coding standards untuk PHP
- Gunakan semantic commit messages
- Tambahkan dokumentasi untuk fitur baru
- Test aplikasi sebelum submit PR

## 📝 Roadmap

- [ ] **Database Integration**: Migrasi dari session ke database
- [ ] **User Authentication**: Sistem login dan register
- [ ] **Export Data**: Export data ke Excel/PDF
- [ ] **Advanced Search**: Filter berdasarkan field spesifik
- [ ] **Data Validation**: Validasi lebih strict di backend
- [ ] **File Upload**: Upload foto mahasiswa
- [ ] **REST API**: API endpoint untuk mobile app

## 👥 Contributors

<div align="center">

| Avatar | Name | Role | GitHub |
|--------|------|------|--------|
| 👤 | Sarashinaa | Developer | [@Sarashinaa](https://github.com/Sarashinaa) |

</div>

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

## 📞 Contact

**Sarashinaa** - [@Sarashinaa](https://github.com/Sarashinaa)

Project Link: [https://github.com/Sarashinaa/Praktik-Form-Biodata-dan-Pencarian](https://github.com/Sarashinaa/Praktik-Form-Biodata-dan-Pencarian)

---

<div align="center">

**⭐ Jangan lupa berikan star jika project ini membantu! ⭐**

Made with ❤️ by [Sarashinaa](https://github.com/Sarashinaa)

</div>
