>CSS yang digunakan theme3.css
>Import proyek.sql ke postgres
>Config.php jangan lupa diset sebelum nge-test

-------------------------------------------------------------------------
UPDATE 12/4/2019:     --gentot--

<Login>
  Buat table baru di DB PostgreSQL, pake query ini:

  CREATE TABLE login(
  id SERIAL NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL);

  INSERT INTO login (username,password) VALUES
  ('admin','912ec803b2ce49e4a541068d495ab570');

  Passwordnya pake Hash MD5, yang dimasukkn diatas itu 'asdf' (decrypt-an nya).
  Kalau mau tambahin user, pake SQL Shell dulu, register button nya belom jadi. Sabar anjing.
  https://www.md5online.org/ <----Link Hash encrypt/decrypt Online.
  
<Renaming>
  PENTING: File 'index.php' berubah jadi 'home.php'. Rename file lu atau download ulang dr Git.
  
<New Files>
  4 new files:
    - index.php (login screen, baru)
    - session.php
    - login.php
    - logout.php

-------------------------------------------------------------------------
UPDATE 12/8/2019:   --Ikhsan Firdauz--

<home>
  Tabs button changed
  
<insert_own>
  notification submit fixed
  failed insert notification yet (someone pls)
  changed finish button
  form length fixed
  
pls update your home.php and insert_own.php

*note to genta : "theme3.css nya mana file gambar backgroundnya kaga diaplot anjai"

------------------------------------------------------------------------

