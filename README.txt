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
  logout icon added
  
<insert_own>
  notification submit fixed
  failed insert notification yet (someone pls)
  changed finish button
  form length fixed
  
pls update your home.php and insert_own.php

*note to genta : "theme3.css nya mana file gambar backgroundnya kaga diaplot anjai"

------------------------------------------------------------------------

UPDATE 12/8/2019  --Gentot--

<Renaming and Re-mapping>
  > File 'view.php' dan 'search.php' di hapus
  > Banyak dibuat perubahan pada SQL Server, Lagi di usahakn untuk export .sql nya. Sebelum di upload, BANYAK FITUR YANG BELUM BISA DIGUNAKAN
  
  <home>
    > Ditambahin button baru, 'View Brand'
    > Update, Delete, Compatibility button sudah bisa digunakan. Harap tunggu .sql file di upload untuk digunakan secara maksimal. Sabar ya sekali lagi anjing
    
  <Login/Logout>
    > Isu bisa masuk tanpa login dengan 'back' button sudah di address, harusnya udah gk masalah.....I hope....god please...
    
  <New Files>
    Banyak banget, gw skim aja:
    
    -Views-
      > view_brand.php: File untuk view merk, kode merk, dan jumlah barang per merk yang ada di toko
      > view_compat.php: Buat liat compatibility. masih harus di address lagi, ktn kyknya blm optimal table-nya
      > view_list.php: Tadinya view.php, gk ada yg baru, just renamed. Deal with it.

    -Searchs-
      > search_brand: Buat cari Brand. Bisa di search berdasarkan brand, Kode brand, atau nomor urut di list (BUKAN ID)
      > search_compat: Buat cari compatibility spareparts. Bisa di cari berdasarkan Jenis, Merk, atau jenis kendaraan 
      > search_list: Tadinya search.php, search dari view_list.php. Nothing new either, cuz I'm fuckin tired
    
    -Delete-
      > Udah bisa delete di database. Tunggu .sql file di upload untuk bisa pake secara maksimal (kl gk sabar edit aje phpnya ya anjing)
      > Fitur baru, perlu feedback
      
  <Future Notes>
    > Perlu perbaikan di Query, dan dinamika insert_own.php, karena jumlah table sudah bertambah, begtu juga jumlah relasi & view
    > Kalo insert_own udah rapih, harusnya proyek sudah 90% kelar. 
    
  Mangad gays!!
  
<EDIT>
  
  > File SQL udah di upload, silahkan di import ke DB masing2. Nama DB yang dibuat disarankan 'sbdtest' (bebas sih, gw resek aja).
  > Jgn lupa donlot file csv nya, taro di C:\
    
<VIEWS>
  > Detail View:
  
    1) jumlah_merk:
	  CREATE VIEW public.jumlah_merk AS
 	  SELECT count(list.id_merk) AS count,
    list.id_merk
    FROM public.list
 	  GROUP BY list.id_merk;
    
    2) brand_count:
    CREATE VIEW public.brand_count AS
    SELECT merk.no,
    merk.nama_merk,
    merk.kode_merk,
    jumlah_merk.count,
    jumlah_merk.id_merk
    FROM (public.merk
    LEFT JOIN public.jumlah_merk ON (((merk.kode_merk)::text = (jumlah_merk.id_merk)::text)));
  
  Dah w mau bobok (-, – )…zzzZZZ --------------------------------------------------------------------------------------------------------------------------------------
    
UPDATE 12/19/2019  --Gentot--
    
*INTERNET LAGi DOWN, MOHON MAAF KALAU BANYAK BUG DAN ERROR, REFERENSI CUMAN SEADANYA*
    
<Re-mapping & Fixes>
    >File 'home.php' diupdate button 'Sale Today', langsung nyambung ke 'sale.php'.
    >Sedikit fix di 'delete.php','delete_conf.php' dan 'delete_fix.php'.
    
<New Files>
*PERHATIAN. BACA YANG BENER JGN SAMPE KOMPLEN*
Buat file-file baru, perlu perubahan, penambahan dan revisi file csv untuk di import ke database (detail di bagian <notes>. Untuk sementara, pakai query ini di DB masing-masing:

CREATE TABLE test_stock(
id SERIAL,
merk VARCHAR(255),
nama VARCHAR(255),
stock INT NOT NULL);

INSERT INTO test_stock (merk,nama,stock) VALUES
('Yamaha','Shock Breaker','3'),
('Honda','Lampu Depan','20'),
('Honda','Lampu Belakang','12'),
('Suzuki','Kaburator','2');

*PERHATIAN ABIS (Kyk gw sm Au**...)*

    >ada 3 file baru:
    	1)sale.php
	  Main page buat ngejual barang. Masukkin nama, merk, sama jumlah yang mau dijual berapa.
	2)sale_conf.php
	  Page untuk konfirmasi detail barang yang mau dijual, termasuk stock dan berapa jumlah yang mau dijual.
	3)sale_fix.php
	  Intisari sale, detail proses dan error handling transaction dari sale.php
	  
<Notes>

   >Buat file csv, perlu ditambahkan detail jumlah stock yang tersedia untuk setiap barang.
   >Perlu Trigger di beberpa table Postgre
   >Table harus di Normalisasi lagi, setelah terjadi revisi
   >Re-mapping dan revisi code terhadap 3 perubahan diatas.
   
KALAU 4 notes diatas sudah selesai, projeck ini harusnya sudah OK, alias kelar. Semangat gays

--------------------------------------------------------------------------------------------------------------------------------------
UPDATE 12/26/2019

Rename: 
view_brand => view_motor.php
serach_brand = search_motor.php

Update:
>remapping 'home.php'
>Update di 'search_list,view_list,search_compat dan view_compat'.php
>View baru: complete_spareparts

Query:
CREATE VIEW complete_spareparts AS SELECT sp.id_tipe, sp.jenis, sp.merk, sp.tipe, sp.harga, sp.tanggal_input, st.stock FROM spareparts sp FULL JOIN stock st ON sp.id_tipe = st.id_tipe;



