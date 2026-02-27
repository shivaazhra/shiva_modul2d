CREATE DATABASE db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE mahasiswas (
    nim VARCHAR(255) PRIMARY KEY,
    nama VARCHAR(255),
    kelas VARCHAR(255),
    matakuliah VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);