
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1110px; height:375px;">
<form action="<?$_SERVER['PHP_SELF']?>" method="POST" name="pencarian" id="pencarian">
    <strong>Pencarian  :</strong>
    <input type="text" name="search" id="search" size="20"> * isi nama depan mahasiswa<br><br>                  
    <input type="submit" name="submit" id="submit" value="CARI">
</form>
</div>
<?php
$Open = mysql_connect("localhost","root","");
    if (!$Open){
    die ("Koneksi ke Engine MySQL Gagal !<br>");
        }
$Koneksi = mysql_select_db("ncenafic_commerce");
    if (!$Koneksi){
    die ("Koneksi ke Database Gagal !");
    }
//menampilkan data
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
  $search = $_POST['search'];
  $sql = mysql_query("SELECT * FROM products WHERE productid LIKE '%$search%'") or die(mysql_error());
    //menampilkan jumlah hasil pencarian
  $jumlah = mysql_num_rows($sql); 
  if ($jumlah > 0) {
    echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
    $nomer=0;
    while (    $hasil = mysql_fetch_array ($sql)) {
        $nomer++;
        $productid = stripslashes ($hasil['productid']);
        $productname = stripslashes ($hasil['productname']);
        $description = stripslashes ($hasil['description']);
        $price = stripslashes ($hasil['price']);
        $offerprice = stripslashes ($hasil['offerprice']);
        }
?>
<table width="1110" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#FFA800">
        <td width="30">No</td> 
        <td width="70" height="42">Id Product</td> 
        <td width="120">Nama Product</td>    
        <td width="85">Deskripsi</td> 
        <td width="70">Harga</td>
        <td width="70">Penawaran Barang</td> 
    </tr>
    <tr align="center" bgcolor="#DFE6EF">
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
    <tr align="center">
        <td><?=$nomer?><div align="center"></div></td>
        <td><?=$productid?><div align="center"></div></td>
        <td><?=$productname?><div align="center"></div></td>
        <td><?=$description?><div align="center"></div></td>
        <td><?=$price?><div align="center"></div></td>
        <td><?=$offerprice?><div align="center"></div></td>
    </tr>
    <tr align="center" bgcolor="#DFE6EF">
        <td> </td>
        <td> </td>
        <td> </td> 
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
</table>
<?
    }
    else {
   // menampilkan pesan zero data
        echo 'Maaf, hasil pencarian tidak ditemukan.';
    }
}
//Tutup koneksi engine MySQL
    mysql_close($Open);
?>     
</body>
</html>