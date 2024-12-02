-- Menggunakan database
USE prestasi;
GO

-- Insert data ke tabel roles
INSERT INTO roles (role_name) VALUES 
('Mahasiswa'),
('Admin'),
('Dosen');
GO

-- Insert data ke tabel users
INSERT INTO users (username, password, role_id) VALUES 
('mahasiswa1', 'password123', 1),
('admin1', 'admin123', 2),
('dosen1', 'dosen123', 3);
GO

-- Insert data ke tabel prodi
INSERT INTO prodi (nama) VALUES 
('Teknik Informatika'),
('Sistem Informasi Bisnus');
GO

-- Insert data ke tabel mahasiswa
INSERT INTO mahasiswa (nim, nama, alamat, no_telp, email, prodi_id) VALUES 
('220001001', 'Rafi Akbar', 'Jl. Mawar No. 1', '081234567890', 'rafi@mail.com', 1),
('220001002', 'Siti Aisyah', 'Jl. Melati No. 5', '081345678901', 'aisyah@mail.com', 2),
('220001003', 'Budi Santoso', 'Jl. Anggrek No. 9', '081456789012', 'budi@mail.com', 1);
GO

-- Insert data ke tabel admin
INSERT INTO admin (no_pegawai, nama, email) VALUES 
('ADM001', 'Admin Utama', 'admin@mail.com'),
('ADM002', 'Admin Cadangan', 'admin2@mail.com');
GO

-- Insert data ke tabel dosen
INSERT INTO dosen (nidn, nama, email) VALUES 
('111001', 'Dr. Rahmat Hidayat', 'rahmat@mail.com'),
('111002', 'Dr. Linda Sari', 'linda@mail.com');
GO

-- Insert data ke tabel jenis_kompetisi
INSERT INTO jenis_kompetisi (nama) VALUES 
('Olahraga'),
('Seni'),
('Akademik');
GO

-- Insert data ke tabel tingkat_kompetisi
INSERT INTO tingkat_kompetisi (nama) VALUES 
('Lokal'),
('Nasional'),
('Internasional');
GO

-- Insert data ke tabel kompetisi
INSERT INTO kompetisi (jenis_id, tingkat_id, nama_kompetisi, tempat_kompetisi, url_kompetisi, tanggal_mulai, tanggal_akhir, no_surat_tugas, tanggal_surat_tugas) VALUES 
(1, 2, 'Lomba Sepak Bola', 'Stadion Nasional', 'http://lombasepakbola.com', '2024-01-10', '2024-01-15', 'ST-001', '2024-01-05'),
(2, 3, 'Festival Tari Internasional', 'Gedung Kesenian', 'http://festivaltari.com', '2024-02-20', '2024-02-25', 'ST-002', '2024-02-15'),
(3, 1, 'Olimpiade Matematika', 'Kampus A', 'http://olimpiadematematika.com', '2024-03-01', '2024-03-03', 'ST-003', '2024-02-25');
GO

-- Insert data ke tabel kompetisi_mahasiswa
INSERT INTO kompetisi_mahasiswa (kompetisi_id, mahasiswa_id) VALUES 
(1, 4),
(2, 4),
(3, 5),
(1, 6); -- Mahasiswa 2 ikut lomba sepak bola juga
GO

-- Insert data ke tabel kompetisi_dosen
INSERT INTO kompetisi_dosen (kompetisi_id, dosen_id) VALUES 
(1, 1),
(2, 2),
(3, 1);
GO
