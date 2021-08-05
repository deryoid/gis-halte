<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM halte WHERE id_halte = '$id'");


if ($hapus) {
   $_SESSION['pesan'] = "Halte Berhasil dihapus";
   echo "<script>window.location.replace('../halte/');</script>";
}
