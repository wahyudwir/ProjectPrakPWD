<?php

	include "koneksi.php";

	header('Content-Type: text/xml');
	$query = "SELECT * FROM products";
	$hasil = mysqli_query($con,$query);
	$jumField = mysqli_num_fields($hasil);
	echo "<?xml version='1.0'?>";
	echo "<data>";
	while ($data = mysqli_fetch_array($hasil))
	{
		 echo "<products>";
		 echo"<productid>",$data['productid'],"</productid>";
		 echo"<productname>",$data['productname'],"</productname>";
		 echo"<price>",$data['price'],"</price>";
		 echo"<offerprice>",$data['offerprice'],"</offerprice>";
		 echo "</products>";
	}
	echo "</data>";

?>
