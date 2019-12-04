>CSS yang digunakan theme3.css
>Import proyek.sql ke postgres
>Config.php jangan lupa diset sebelum nge-test


UPDATE LOGIN

Buat table baru di DB PostgreSQL, pake query ini:

CREATE TABLE login(
id SERIAL NOT NULL,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL);

INSERT INTO login (username,password) VALUES
('admin','912ec803b2ce49e4a541068d495ab570');

Passwordnya pake Hash MD5, yang dimasukkn diatas itu 'asdf' (decrypt-an nya).
Kalau mau tambahin user, pake SQL Shell dulu, register button nya belom jadi. Sabar anjing.
