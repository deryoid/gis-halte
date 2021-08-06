<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM supir WHERE id_supir = '$id'");


if ($hapus) {
   $_SESSION['pesan'] = "supir Berhasil dihapus";
   echo "<script>window.location.replace('../supir/');</script>";
}
