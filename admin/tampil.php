<?php
include "koneksi.php";
 //get the nama value from form
$sql = "SELECT * from products "; //query to get the search result
$query = mysqli_query($con,$sql); //execute the query $q
echo "<center>";
echo "<h2> Data Product </h2>";
echo "<a href='cetak.php'> Cetak </a><br>";
echo "<a href='form.php'> Cari Product </a><br>";
echo "<a href='product_json.php'> JSON </a><br>";
echo "<a href='product_xml.php'> XML </a><br>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>Id Product</td>
<td>Nama Product</td>
<td>Deskripsi</td>
<td>Harga</>
<td>Pewaran Harga</>
</tr>";
	while ($data = mysqli_fetch_assoc($query)) { //fetch the result from query into an array
echo "
<tr>
<td>".$data['productid']."</td>
<td>".$data['productname']."</td>
<td>".$data['description']."</td>
<td>".$data['price']."</td>
<td>".$data['offerprice']."</td>
</tr>";
}
echo "</table>";
?>