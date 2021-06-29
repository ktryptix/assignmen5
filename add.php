

<center><h1> passport form</h1></center><br><br><br>
<form action='add_submit.php' method='post' enctype="multipart/form-data">
Enter Passport Number:<input type='text' id='p_no' name='p_no' required><br><br>
Enter First Name:<input type='text' id='f_name' name='f_name' required><br><br>
Enter Middle Name:<input type='text' id='m_name' name='m_name' ><br><br>
Enter Last Name:<input type='text' id='l_name' name='l_name' required><br><br>
Enter DOB:<input type='date' id='date' name='date' required><br><br>
Enter Nationality:<input type='text' id='nat' name='nat' required><br><br>
Enter Address:<input type='text' id='addr' name='addr' required><br><br>
Select Gender: 
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br><br>
Upload picture: <input type="file" name="file" id="file"><br><br>
 <input type='submit' name='submit' id='add' required>Add<br><br>
  </form>