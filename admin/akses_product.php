<?php

	$url = "http://localhost/mbl/admin/getdataproducts.php";
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($client);
	$result = json_decode($response);
	foreach ($result as $r) {
		 echo "<p>";
		 echo "Id Product : " . $r->productid . "<br />";
		 echo "Nama Product : " . $r->productname . "<br />";
		 echo "Deskripsi : " . $r->description . "<br />";
		 echo "Harga : " . $r->price . "<br />";\
		 echo "Penawaran Harga : " . $r->offerprice . "<br />";
		 echo "</p>";

}