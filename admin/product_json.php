<?php
	include "koneksi.php";
	$sql="select * from products order by productid";
	$tampil = mysqli_query($con,$sql);
	if (mysqli_num_rows($tampil) > 0) {
	$no=1;
	$response = array();
	$response["data"] = array();
	while ($r = mysqli_fetch_array($tampil)) {
		 $h['productid'] = $r['productid'];
		 $h['productname'] = $r['productname'];
		 $h['price'] = $r['price'];
		 $h['offerprice'] = $r['offerprice'];
		 array_push($response["data"], $h);
	 }
	 echo json_encode($response);
	}
	else {
		 $response["message"]="tidak ada data";
		 echo json_encode($response);
	 }
?>