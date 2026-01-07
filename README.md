# 📁 Sistem Manajemen Arsip Digital

Sistem Manajemen Arsip Digital adalah aplikasi berbasis web yang dibangun menggunakan **Laravel** dan **Tailwind CSS** untuk mengelola dokumen organisasi secara digital, terstruktur, dan aman berdasarkan **divisi** serta **hak akses pengguna**.

---

## 🎯 Fitur Utama

- 🔐 **Autentikasi & Authorization**
  - Login, logout, reset password
  - Role-based access (Admin & User)
  - Pembatasan akses berbasis divisi

- 👥 **Manajemen Pengguna (Admin)**
  - Tambah, edit, dan hapus pengguna
  - Penentuan role dan divisi
  - Validasi admin utama

- 🏢 **Manajemen Divisi (Admin)**
  - CRUD divisi
  - Warna divisi otomatis
  - Relasi dengan user dan arsip

- 📄 **Manajemen Arsip**
  - Upload, edit, download, dan hapus arsip
  - Format file: PDF, DOCX, XLSX
  - Maksimal ukuran file 10MB
  - Arsip terisolasi berdasarkan divisi

- 📊 **Dashboard**
  - Statistik arsip, divisi, dan user
  - Arsip terbaru
  - Quick action untuk akses cepat

- 🔍 **Search & Filter**
  - Pencarian arsip berdasarkan judul atau nomor
  - Filter arsip berdasarkan divisi (Admin)

---

## 👥 Role Pengguna

### 🔴 Admin
- Akses penuh ke seluruh sistem
- Manajemen user, divisi, dan seluruh arsip

### 🔵 User
- Mengelola arsip sesuai divisinya
- Upload, edit, dan download arsip

---

## 🔧 Teknologi yang Digunakan

- **Laravel**
- **Tailwind CSS**
- **Alpine.js**
- **MySQL**
- **Laravel Breeze**

---

## 🗄️ Penyimpanan File

- Lokasi: `storage/app/public/arsip`
- Penamaan file: `{timestamp}_{slug}.{ext}`
- Validasi MIME type dan ukuran file

---

## 🎨 UI & UX

- Responsive design (mobile & desktop)
- Empty state informatif
- Alert sukses & error
- Konfirmasi sebelum hapus data

---

## 🔐 Keamanan

- CSRF Protection
- Password hashing
- Role & divisi based access control
- Validasi backend & frontend

---

## 🚀 Kesimpulan

Sistem ini dirancang untuk membantu organisasi mengelola arsip digital secara **terstruktur, aman, dan efisien**, dengan antarmuka modern serta pembagian akses yang jelas antara Admin dan User.

---

📌 *Dibangun menggunakan Laravel & Tailwind CSS*
