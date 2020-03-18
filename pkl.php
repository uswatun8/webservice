<?php
 
$connect=mysqli_connect("localhost", "id12789037_pkl", "ftihebat654","id12789037_webservice");
 
$query = "SELECT * from praktek ";
$result = mysqli_query($connect,$query) or die(mysqli_error());
 
$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $temp = array(

    "Nim" => $row["nim"],
    "Nama" => $row["nama"], 
    "Tempat" => $row["tempat"],
    "Judul" => $row["judul"],
    "Dosen Pembimbing" => $row["dosbing"]);
   
    array_push($arr, $temp);
}
 
$data = json_encode($arr);
 
echo "{\"MENAMPILKAN DATA PRAKTEK\":" . $data . "}";
?>
