<?php
include "koneksi.php";
$productname= $_POST['productname']; //get the nama value from form
$sql = "SELECT * from products where productname like '%$productname%' "; //query to get the search result
$query = mysqli_query($con,$sql); //execute the query $q
echo "<center>";
echo "<h2> Hasil Searching </h2>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>Id Product</td>
<td>Nama Product</td>
<td>Deskripsi</td>
<td>Harga</>
<td>Penawaran Harga</>
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