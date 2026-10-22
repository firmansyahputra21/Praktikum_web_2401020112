USE praktikum_web_NIM;

INSERT INTO program_studi (nama_prodi) VALUES
    ('Teknik Informatika'),
    ('Sistem Informasi');

INSERT INTO mahasiswa
    (nim, nama, email, usia, program_studi_id)
VALUES
    ('2401020112', 'Firman Dwi', 'firman@example.com', 20, 1),
    ('2401020117', 'Farrel', 'farrel.pratama@example.com', 21, 1),
    ('2401020111', 'Agus Farhan', 'farhan.putri@example.com', 19, 2),
    ('2401020121', 'Ridho E', 'ridho@example.com', 22, 2);

UPDATE mahasiswa
SET email = 'firman@example.com'
WHERE nim = '2401020112';

DELETE FROM mahasiswa
WHERE nim = '2401020121';

SELECT m.nim, m.nama, m.email, m.usia, p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p
    ON p.id = m.program_studi_id
ORDER BY m.nim;

