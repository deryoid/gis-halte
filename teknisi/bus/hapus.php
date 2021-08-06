<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM bus WHERE id_bus = '$id'");


if ($hapus) {
   $_SESSION['pesan'] = "Bus Berhasil dihapus";
   echo "<script>window.location.replace('../bus/');</script>";
}
