USE praktikum_web_NIM;

-- Pengujian 1: NIM ganda, seharusnya ditolak oleh UNIQUE.
INSERT INTO mahasiswa
    (nim, nama, email, usia, program_studi_id)
VALUES
    ('2301010001', 'Nama NIM Ganda', 'nim.ganda@example.com', 20, 1);

-- Pengujian 2: program studi tidak tersedia, seharusnya ditolak oleh FOREIGN KEY.
INSERT INTO mahasiswa
    (nim, nama, email, usia, program_studi_id)
VALUES
    ('2401020121', 'Uji Foreign Key', 'uji.fk@example.com', 20, 99);

SELECT COUNT(*) AS jumlah_mahasiswa FROM mahasiswa;
