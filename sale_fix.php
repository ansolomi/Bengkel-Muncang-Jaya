<HTML>

<?php
require_once 'config.php';
session_start();
$merk = $_SESSION['merk'];
$nama = $_SESSION['nama'];
$jumlah = $_SESSION['jumlah'];

//Queries
$query1 = "UPDATE test_stock SET stock = stock - $jumlah WHERE merk ='$merk' AND nama = '$nama'";
$query2 = "SELECT stock FROM test_stock WHERE merk = '$merk' AND nama = '$nama' ";
$prep1 = pg_prepare($link,"reduce",$query1);
$prep2 = pg_prepare($link,"check",$query2);

pg_query("BEGIN") or die("Could not start transaction\n");

$prep1 = pg_execute($link,"reduce",array());
$prep2 = pg_execute($link,"check",array());
$data = pg_fetch_assoc($prep2);

if ($data['stock'] <= 0 )
    {
    echo ("<script>
    alert('Transaksi Gagal, karena STOCK TIDAK ADA. Harap cek transaksi kembali!');
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