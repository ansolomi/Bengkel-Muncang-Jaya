<html>

<?php
require_once "config.php";
session_start();
$id = $_SESSION['id'];

$deletes = "DELETE FROM spareparts WHERE id = $id ";
$deletel = "DELETE FROM list WHERE id = $id ";
pg_query($link, $deletel);
pg_query($link, $deletes);
echo ("<script>
alert('Data berhasil dihapus');
window.location.href='delete.php';
</script>");


?>
</html>