<?php
include "koneksi.php";
$act=$_GET['act'];

// =======================================================================================

//hapus Perum
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_pasien WHERE noreg='$_GET[noreg]'");
  header('location:mod.php?mod=pasien');
}

// Update Perum
elseif ( $act=='edit'){
  mysql_query("UPDATE tbl_pasien SET noreg ='$_POST[noreg]',
				namapasien 	   = '$_POST[namapasien]',   
                                   tgllhr = '$_POST[tgllhr]', 
                                   pekerjaan       = '$_POST[pekerjaan]',
                                   alamat             = '$_POST[alamat]', 
								    telpon             = '$_POST[telpon]', 
                                   jeniskel             = '$_POST[jeniskel]'
                                   namakk            = '$_POST[namakk]'
                                   tgldaftar           = '$_POST[tgldaftar]'
			WHERE noreg  = '$_POST[noreg]'");
	header('location:mod.php?mod=pasien');
}
?>