<?php



$conn = mysqli_connect("localhost","root","","programs");
$targetDir = "C:\Users\Kruthika\Pictures\project";
$fileName = basename($_FILES["file"]["name"]);
echo $fileName;
$targetFilePath = $targetDir . $fileName;
echo $targetFilePath;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


	
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
           // $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
//echo 123;

$que=mysqli_query($conn,"insert into passport_details(id,p_no,first_name,middle_name,last_name,DOB,nationality,address,gender,pic) values(' ' ,'".$_POST['p_no']."', '".$_POST['f_name']."', '".$_POST['m_name']."','".$_POST['l_name']."' ,'".$_POST['date']."','".$_POST['nat']."', '".$_POST['addr']."','".$_POST['gender']."','".$fileName."')");
		}
	
}
header("Location:program4.php");




