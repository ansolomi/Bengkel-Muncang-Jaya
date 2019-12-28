<HTML>

<?php
require_once 'config.php';
session_start();
$id = $_SESSION['id'];
$jumlah = $_SESSION['jumlah'];
$harga = $_SESSION['harga'];

//Queries
$query1 = "UPDATE spareparts SET stock = stock - $jumlah WHERE id_tipe =$id";
$query2 = "SELECT stock FROM spareparts WHERE id_tipe =$id ";
$query3 = "INSERT INTO riwayat_jual (id_tipe,jumlah,total_pendapatan) VALUES ($id,$jumlah,($jumlah*$harga))";
$prep1 = pg_prepare($link,"reduce",$query1);
$prep2 = pg_prepare($link,"check",$query2);
$prep3 = pg_prepare($link,"hostorize",$query3);

pg_query("BEGIN") or die("Could not start transaction\n");

$prep1 = pg_execute($link,"reduce",array());
$prep2 = pg_execute($link,"check",array());
$prep3 = pg_execute($link,"hostorize",array());
$data = pg_fetch_assoc($prep2);

if ($data['stock'] < 0 )
    {
    pg_query("ROLLBACK") or die("ROLLBACK failed\n");
    echo ("<script>
    alert('Transaksi Gagal, karena STOCK TIDAK ADA/HABIS. Harap cek transaksi kembali!');
    window.location.href='sale.php';
    </script>");
    }
else
    {
    pg_query("COMMIT") or die("Transaction commit failed\n");
    echo ("<script>
    alert('Transaksi BERHASIL.');
    window.location.href='sale.php';
    </script>");
    }

?>
</HTML>
