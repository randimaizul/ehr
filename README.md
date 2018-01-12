# EHR
Electronic Health Records adalah aplikasi yang menyimpan seluruh riwayat pengobatan dan rekam jejak medis seseorang dari berbagai tempat pengobatan dan rumah sakit. Riwayat pengobatan ini berupa informasi pengobatan, jenis penyakit yang diderita, dokter yang menangani saat pengobatan tersebut, hasil lab, dan obat-obatan yang diberikan oleh dokter saat pemeriksaan

# Versi Website 
Versi website ini akan di akses oleh : 
- Pegawai rumah sakit (admin)
- Dokter

### Keterangan
- Akses Website : [id.taungapain.com](http://id.taungapain.com/)
- Mengunakan Framework Codeigniter
- Arsitektur desain : HMVC
- Design Pattern : Adapter dan singleton
- ORM / Object Persistensi-nya terdapat pada folder `aplikasi/website/application/models/Adapater.php`
- Controller dan View-nya terdapat pada folder `aplikasi/website/application/modules/` (struktur HMVC)

# Versi Android 
Versi website ini akan di akses oleh : 
- Pasien

### Keterangan
- Installer android (apk) terdapat pada folder `aplikasi/apk_android/EHR2.apk`
- Design Pattern : Singleton dan Adapter.
- File .java yang digunakan adalah sebagai berikut.
  - Activity : BerobatActivity, BookingActivity, LoginActivity, MainActivity, ProfileActivity, RegisterActivity, RekamMedisActivity, RiwayatActivity.
  - Request : AsuransiRequest, BookingRequest, Dokter2Request, HistoryRequest, LoginRequest, PenangananRequest, PendaftaranRequest, Poli2Request, ProfileRequest, RegisterRequest, RekamMedisRequest.
  - Adapter : AsuransiSpinner, DokterSpinner, PenangananList, PoliSpinner, RiwayatList, RumahSakitSpinner.
  - Helper : SessionManager.
  - Class : Asuransi, Dokter, Penanganan, Pendaftaran, Poli, RekamMedis, RumahSakit (class sisanya skeleton saja karena tidak digunakan pada aplikasi android).

# API untuk Android
- Akses API : [latif.taungapain.com](http://latif.taungapain.com)

