<?php
$conn = mysqli_connect("localhost","root","","programs");

if(isset($_POST['delete']))
{
	
	$select=$_POST['select'];
	$que=mysqli_query($conn,"delete from passport_details where id='".$select."'");

if($que)
{
	header("Location:program4.php");
	exit();
}
}
if(isset($_POST['edit']))
{
	$select=$_POST['select'];
	$query1=mysqli_query($conn,"select * from passport_details where id='".$select."'");
	
if($row=mysqli_fetch_assoc($query1))
	{
		$image_name =  $row['pic'];
			$img = "C:\Users\Kruthika\Pictures\project".$image_name;
			
		?>
		<form action='' method='post' enctype="multipart/form-data">
Enter Passport Number:<input type='text' id='p_no' name='p_no' value="<?php echo $row['p_no'];?>" required><br><br>
Enter First Name:<input type='text' id='f_name' name='f_name' value="<?php echo $row['first_name'];?>"  required><br><br>
Enter Middle Name:<input type='text' id='m_name' name='m_name' value="<?php echo $row['middle_name'];?>"  ><br><br>
Enter Last Name:<input type='text' id='l_name' name='l_name' value="<?php echo $row['last_name'];?>"  required><br><br>
Enter DOB:<input type='date' id='date' name='date' value="<?php echo $row['DOB'];?>"  required><br><br>
Enter Nationality:<input type='text' id='nat' name='nat' value="<?php echo $row['nationality'];?>"  required><br><br>
Enter Address:<input type='text' id='addr' name='addr' value="<?php echo $row['address'];?>"  required><br><br>

<input type='hidden' name='select' value="<?php echo $row['id'];?>">
Select Gender: 
  <input type="radio" id="male" name="gender" value= "male" <?php if($row['gender']=="male"){ echo "checked";}?>/>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female" <?php if($row['gender']=="female"){ echo "checked";}?>/>
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other"  <?php if($row['gender']=="other"){ echo "checked";}?>/>
  <label for="other">Other</label><br><br>
Upload picture: 
<input type='hidden' name='image' value="<?php echo $image_name;?>">
<input type="file" name="file" value="<?php echo $image_name;?>"/><p><img src="<?php echo $img;?>"></p>

<br><br>
 <input type='submit' name='submit' id='add'><br><br>
  </form> 
		
	<?php	
	}
	
	
	
}
if(isset($_POST['submit']))
	{
	$targetDir = "C:\Users\Kruthika\Pictures\project";
	$select=$_POST['select'];
	$file=$_POST['image'];
	echo $file;
	if(!empty($_FILES["file"]["name"]))
	{
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	//echo $targetFilePath;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


	
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
		//echo 123;
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
			//echo 1234;
            // Insert image file name into database	
			$que1=mysqli_query($conn,"update passport_details set p_no='".$_POST['p_no']."',first_name='".$_POST['f_name']."',middle_name='".$_POST['m_name']."',last_name='".$_POST['l_name']."',DOB='".$_POST['date']."',nationality='".$_POST['nat']."',address='".$_POST['addr']."',gender='".$_POST['gender']."',pic='".$fileName."' where id='".$select."'");
		}
		
	}
		
	
	
	
	
	
	
	}
else
{	
	//echo 	$select;
	$fileName =  $file;
	$que1=mysqli_query($conn,"update passport_details set p_no='".$_POST['p_no']."',first_name='".$_POST['f_name']."',middle_name='".$_POST['m_name']."',last_name='".$_POST['l_name']."',DOB='".$_POST['date']."',nationality='".$_POST['nat']."',address='".$_POST['addr']."',gender='".$_POST['gender']."',pic='".$fileName."' where id='".$select."'");
}
if(!$que1)
		{
			echo "failed";
		}
	//echo $fileName;
	//echo $fileName;
	
	header("Location:program4.php");
	//exit();
}
	
	



?>