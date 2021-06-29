<?php

if(isset($_POST['deposit']))
{
	?>
	<h1>Enter details to deposit</h1>
	<form action='' method='post'>
Enter account no:	<input type='text' name='accno' id='accno' required><br><br>
Enter account type:	<input type='text' name='acctype' id='acctype' required><br><br>
Enter amount:	<input type='number' name='amount' id='amount' min='1' required><br><br>
<input type='submit' name='depo'>	
</form>	
	
	
	
	
	
<?php	
}
if(isset($_POST['withdrawal']))
{
	?>
	<h1>Enter details to withdrawal</h1>
	<form action='' method='post'>
Enter account no:	<input type='text' name='accno' id='accno' required><br><br>
Enter account type:	<input type='text' name='acctype' id='acctype' required><br><br>
Enter amount:	<input type='number' name='amount' id='amount' min='1' required><br><br>
<input type='submit' name='withd'>	
</form>	
	
	
	
	
	
<?php	
}
if(isset($_POST['balance']))
{
	?>
	<h1> balance enquiry</h1>
	<form action='' method='post'>
Enter account no:	<input type='text' name='accno' id='accno' required><br><br>


<input type='submit' name='check'>	
</form>	
	
	
	
	
	
<?php	
}
if(isset($_POST['check']))
{
	$conn = mysqli_connect("localhost","root","","programs");
$acc=$_POST['accno'];

//echo $acc;
//echo $acctype;
$quer=mysqli_query($conn,"select balance from customer where accno='".$acc."'");
if($row=mysqli_fetch_assoc($quer))

{
	echo "The available balance is:";
	echo $row['balance'];
}
else{
	echo "invalid account number";
}
}
if(isset($_POST['depo']))
{
	$conn = mysqli_connect("localhost","root","","programs");
$acc=$_POST['accno'];
$acctype=$_POST['acctype'];
//echo $acc;
//echo $acctype;
$quer=mysqli_query($conn,"select * from customer where accno='".$acc."' and acc_type='".$acctype."' ");

if($row=mysqli_fetch_assoc($quer))

{
	//echo 1234;
	$amount=$row['balance']+ $_POST['amount'];
	//echo $amount;
	$que1=mysqli_query($conn,"update customer set balance='".$amount."' where accno='".$_POST['accno']."'") ;
	if($que1)
{
	
	echo "amount deposited successfully";
}
else
{
	echo "transaction failed";
}
}


else{
	echo "Enter correct details";
}
}
if(isset($_POST['withd']))
{
	$conn = mysqli_connect("localhost","root","","programs");
$acc=$_POST['accno'];
$acctype=$_POST['acctype'];
//echo $acc;
//echo $acctype;
$quer=mysqli_query($conn,"select * from customer where accno='".$acc."' and acc_type='".$acctype."' ");

if($row=mysqli_fetch_assoc($quer))

{
	//echo 1234;
	if($row['balance']>=$_POST['amount'])
	{
	$amount=$row['balance']-$_POST['amount'];
	echo $amount;
	$que1=mysqli_query($conn,"update customer set balance='".$amount."' where accno='".$_POST['accno']."'") ;
	if($que1)
{
	
	echo "amount withdrawal successfully";
}
else
{
	echo "transaction failed";
}
}
else{
	echo "There is so sufficient balance in your account to withdrawal money";
}
}

else{
	echo "Enter correct details";
}
}


?>