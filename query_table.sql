DROP DATABASE IF EXISTS prestasi;
GO

-- Membuat Database
CREATE DATABASE prestasi;
GO

-- Menggunakan Database
USE prestasi;
GO

-- Membuat Tabel roles
CREATE TABLE roles (
    id INT PRIMARY KEY IDENTITY(1,1),
    role_name NVARCHAR(50) NOT NULL UNIQUE
);

-- Membuat Tabel users
CREATE TABLE users (
    id INT PRIMARY KEY IDENTITY(1,1),
    username NVARCHAR(100) NOT NULL UNIQUE,
    password NVARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Membuat Tabel prodi
CREATE TABLE prodi (
    id INT PRIMARY KEY IDENTITY(1,1),
    nama NVARCHAR(100) NOT NULL UNIQUE
);

-- Membuat Tabel mahasiswa
CREATE TABLE mahasiswa (
    id INT PRIMARY KEY IDENTITY(1,1),
    nim CHAR(10) NOT NULL UNIQUE,
    nama NVARCHAR(100) NOT NULL,
    alamat NVARCHAR(255),
    no_telp CHAR(15),
    email NVARCHAR(100) CHECK (email LIKE '%_@__%.__%'),
    prodi_id INT NOT NULL,
    FOREIGN KEY (prodi_id) REFERENCES prodi(id) ON DELETE CASCADE,
    INDEX idx_prodi_id (prodi_id)
);

-- Membuat Tabel admin
CREATE TABLE admin (
    id INT PRIMARY KEY IDENTITY(1,1),
    no_pegawai CHAR(10) NOT NULL UNIQUE,
    nama NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) CHECK (email LIKE '%_@__%.__%')
);

-- Membuat Tabel dosen
CREATE TABLE dosen (
    id INT PRIMARY KEY IDENTITY(1,1),
    nidn CHAR(10) NOT NULL UNIQUE,
    nama NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) CHECK (email LIKE '%_@__%.__%')
);

-- Membuat Tabel jenis_kompetisi
CREATE TABLE jenis_kompetisi (
    id INT PRIMARY KEY IDENTITY(1,1),
    nama NVARCHAR(100) NOT NULL UNIQUE
);

-- Membuat Tabel tingkat_kompetisi
CREATE TABLE tingkat_kompetisi (
    id INT PRIMARY KEY IDENTITY(1,1),
    nama NVARCHAR(100) NOT NULL UNIQUE
);

-- Membuat Tabel kompetisi
CREATE TABLE kompetisi (
    id INT PRIMARY KEY IDENTITY(1,1),
    jenis_id INT NOT NULL,
    tingkat_id INT NOT NULL,
    nama_kompetisi NVARCHAR(100) NOT NULL,
    tempat_kompetisi NVARCHAR(255),
    url_kompetisi NVARCHAR(255),
    tanggal_mulai DATE NOT NULL,
    tanggal_akhir DATE NOT NULL,
    no_surat_tugas NVARCHAR(100),
    tanggal_surat_tugas DATE,
    file_surat_tugas VARBINARY(MAX),
    file_sertifikat VARBINARY(MAX),
    foto_kegiatan VARBINARY(MAX),
    file_poster VARBINARY(MAX),
    FOREIGN KEY (jenis_id) REFERENCES jenis_kompetisi(id) ON DELETE CASCADE,
    FOREIGN KEY (tingkat_id) REFERENCES tingkat_kompetisi(id) ON DELETE CASCADE,
    CONSTRAINT chk_tanggal CHECK (tanggal_mulai <= tanggal_akhir)
);

-- Membuat Tabel kompetisi_mahasiswa
CREATE TABLE kompetisi_mahasiswa (
    kompetisi_id INT NOT NULL,
    mahasiswa_id INT NOT NULL,
    PRIMARY KEY (kompetisi_id, mahasiswa_id),
    FOREIGN KEY (kompetisi_id) REFERENCES kompetisi(id) ON DELETE CASCADE,
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(id) ON DELETE CASCADE,
    INDEX idx_kompetisi_mahasiswa (mahasiswa_id)
);

-- Membuat Tabel kompetisi_dosen
CREATE TABLE kompetisi_dosen (
    kompetisi_id INT NOT NULL,
    dosen_id INT NOT NULL,
    PRIMARY KEY (kompetisi_id, dosen_id),
    FOREIGN KEY (kompetisi_id) REFERENCES kompetisi(id) ON DELETE CASCADE,
    FOREIGN KEY (dosen_id) REFERENCES dosen(id) ON DELETE CASCADE,
    INDEX idx_kompetisi_dosen (dosen_id)
);
GO
