<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM kernet WHERE id_kernet = '$id'");


if ($hapus) {
   $_SESSION['pesan'] = "Kernet Berhasil dihapus";
   echo "<script>window.location.replace('../kernet/');</script>";
}
