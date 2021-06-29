
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<form method="POST" action="add.php">
   <button type='submit' id='add'>Add</button><br><br>
  </form>
 
<?php



$conn = mysqli_connect("localhost","root","","programs");

$queryi=mysqli_query($conn,"select * from passport_details");
?>
<table class="table  mt-3" id='customers'>    
           
	   <tr>    
               
                <th>passport_id</th>    
                <th>First_name</th>    
				<th>Middle_name</th> 
				<th>Last_name</th>
				<th>DOB</th>
				<th>Nationality</th> 
				<th>Address</th>
				<th>Gender</th>
				<th>Image</th>
				<th>operations</th>
			</tr>	


<?php
while($row=mysqli_fetch_assoc($queryi))
{
	
	?>
	
<tr>  
          
        <td>  
            <?php echo $row['p_no'];?> 
        </td>  
        <td>  
           
           <?php echo $row['first_name'];?> 			
        </td> 
		<td>  
            <?php echo $row['middle_name'];?>  
        </td> 
		<td>
		<?php echo $row['last_name'];?> 
		</td>
		<td>
		<?php echo $row['DOB'];?> 
		</td>
		<td>
		<?php echo $row['nationality'];?> 
		</td>
		
		<td>
		<?php echo $row['address'];?> 
		</td>
		<td>
		<?php echo $row['gender'];?> 
		</td>
		<td>
		
		<?php 
			$image_name =  $row['pic'];
			$img = "C:\Users\Kruthika\Pictures\project".$image_name;
			
		//	echo $img;
//echo "img src=".$targetDir."/".$image_name." width=100 height=100";
	echo'<img src="'.$img.'">';
		?> 
		</td>
		<td>
		 
		<form action="delete.php" method='post'> 
	
		
  
  
  <input type='hidden' name='select' value="<?php echo $row['id'];?>">
  <button type='submit' name='edit' id='edit'>edit</button>
  
  <button type='submit' name='delete' id="delete" >delete</button>
	
</form>
		</td>
		
		
</tr>






<?php 
}
?>

</table>









