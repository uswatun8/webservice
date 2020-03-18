<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo "isinya data===".$request;
echo "method===".$method;
echo "|||";
//$input = json_decode(file_get_contents('php://input'),true);
 $input = file_get_contents('php://input');
$link = mysqli_connect('localhost', 'id12789037_pkl', 'ftihebat654', 'id12789037_webservice');
mysqli_set_charset($link,'utf8');
 
$data = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
echo "isinya data===".$data;
echo "|||";
$id = array_shift($request);
echo "isinya data===".$id;
echo "|||";


if (strcmp($data, 'data') ==0) {
 switch ($method) {
 case 'GET':
     {
    if (empty($id))
    {
    $sql = "select * from praktek"; 
    echo "select * from praktek ";break;
    }
    else
    {
         $sql = "select * from praktek where nim='$id'";
         echo "select * from praktek where nim='$id'";break;
        
        
    }
    
    
    
    
     }
 }
 
 
 
 $result = mysqli_query($link,$sql);
 
 if (!$result) {
 http_response_code(404);
 die(mysqli_error());
 }
 
 
 
 
 if ($method == 'GET') {
 $hasil=array();
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 {
 $hasil[]=$row;
 } 
 $hasil1 = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
 echo json_encode($hasil1);
 
 } 
   
}

else{
 $hasil1 = array('status' => false, 'message' => 'Access Denied');
 echo json_encode($hasil1);
}

if ($method == 'POST') {
        echo "Method POST";
        echo "Data input ".$input;
        
        ////
        
        $json = json_decode($input, true);
        echo "json =".$json["nim"] ;
        echo "Proses".$json->nim;
        $nimmhsw=$json["nim"];
        $namamhsw=$json["nama"];
        $tempat=$json["tempat"];
        $judul=$json["judul"];
        $dosenbimbingan=$json["dosbing"];

		$querycek = "SELECT nim,nama,tempat,judul,dosbing FROM praktek WHERE nim ='$nimmhsw'";
		echo "query select ".$querycek;
		$result=mysqli_query($link,querycek);
		echo "result =".$result;
		
		if ( $rowcount == 0)
		{
		$query = "INSERT INTO praktek (
		nim,
		nama,
		tempat,
		judul,
		dosbing)
		VALUES (				
		'$nimmhsw',
		'$namamhsw',
		'$tempat',
		'$judul',
		'$dosenbimbingan')";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
		else if ($rowcount > 0)
		{
		$query = "UPDATE praktek SET
		nim = '$nimmhsw',
		nama = '$namamhsw',
		tempat = '$tempat',
		judul = '$judul',
		dosbing = '$dosenbimbingan'
		WHERE nim ='$nimmhsw'";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
        
        
        
        
        /////
        }
        
mysqli_close($link);
?>
