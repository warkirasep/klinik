<html>
<head>
<title>CARI</title>
<link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/template.css" rel="stylesheet">
    <link href="../../js/google-code-prettify/prettify.css" rel="stylesheet">
<style>

.isi{
	width: 1190px;
	margin-left: auto;
	margin-right: auto;	
	
	
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div class='navbar'>
    <div class='navbar-inner'>
    
    <ul class='nav'>
    <li ><a href='#'>Cari Pasien Berdasarkan :</a></li>
 
     <form class="navbar-form pull-left" action="" method="POST" name="pencarian" id="pencarian">
     <table >
     <select name="List" class="style7" id="List" style="margin-right:5px;">
      <option value="Where noreg" selected>No Reg Pasien</option>
      <option value="Where namapasien">Nama Pasien</option>
      <option value="Where alamat">Alamat</option>
	   <option value="Where telpon">Telpon</option>
      <option value="Where jeniskel">Jenis Kelamin</option>
      <option value="Where namakk">Nama KK</option>
      <option value="Where tgldaftar">Tanggal Daftar</option>
     </select>
    
    <input name="txtcari" type="text" class="style7" id="txtcari" style="height:20px;font-size:12px;margin-right:5px;">
    <input class="btn" name="submit" type="submit" class="style7" value="CARI" style="height:25px;width:150px;align:center;">	
   </table>
    </ul>
    </div>
    </div>
       

<div class="isi">
<?php
include "koneksi.php";
$field=$_POST['List'];
if ((isset($_POST['submit'])) AND ($_POST['txtcari'] <> "")){
	$cari=$_POST['txtcari'];
	
	$sql=mysql_query("SELECT * from tbl_pasien ".$field." LIKE '%$cari%'") or die (mysql_error());
	//menampilkan jumlah hasil pencarian
	$jumlah=mysql_num_rows($sql);
	if ($jumlah > 0){
		echo '<p><b><font color=#808080><center>Ada '.$jumlah.' data yang sesuai.</center></font></b></p>';
			echo "<table align=center  class='table table-striped'>
					<tr  align='center' style='font-size:12px;'>
					<td  width=23>No</td>
					<td  >No Reg Pasien</td>
					<td  >Nama Pasien</td>
					<td width=65  >Tanggal Lahir</td>
					<td  >Alamat</td>
					<td  >Telpon</td>
					<td >Jenis kel</td>
					<td  >pekerjaan</td>
					<td  >Namakk</td>
					<td width=60>Tanggal Daftar</td>
					<td  >Aksi</td>
					</tr>";
					
			while ($hasil=mysql_fetch_array($sql)){
					$nomor++;
					echo "<tr class='td2' align='center' >
					<td  >$nomor</td>
					<td  >$hasil[noreg]</td>
					<td  >$hasil[namapasien]</td>
					<td  >$hasil[tgllhr]</td>
					<td >$hasil[alamat]</td>
					<td >$hasil[telpon]</td>
					<td >$hasil[jeniskel]</td>
					<td  >$hasil[pekerjaan]</td>
					<td  >$hasil[namakk]</td>
					<td  >$hasil[tgldaftar]</td>
					<td width=45  ><div class='btn-group'><a href=view.php?idpasien=$hasil[idpasien]&noreg=$hasil[noreg] class='btn' >Riwayat</a></div>
					</tr>";
	}
		
		echo"</table>";
}
	else {echo "<font color=#808080><b><center>Maaf, hasil pencarian tidak ditemukan.</center></b></font>";}
}
else {echo "<font color=#808080><b><center>Masukkan kata kunci . . . .</center></b></font>";}
?>
</form>
</div>
</body>
</html>			
