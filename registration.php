<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
<script type = "text/javascript">
function validateData()
{
if(document.rform.fname.value =="")
{
  alert("please enter first name!");
  return false;
}
if(document.rform.lname.value =="")
{
  alert("please enter last name!");
  return false;
}
if(document.rform.username.value =="")
{
  alert("please enter user name!");
  return false;
}
if(document.rform.password.value =="")
{
  alert("please enter password!");
  return false;
}
if(document.rform.password.value != document.rform.confirm.value)
{
  alert("passwods do not match!");
  return false;
}
return true;
}
</script>
<noscript>
 Warnning : There is no javascript installed on the browser!
</noscript>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link rel="STYLESHEET" href="style.css" type="text/css">
</head>
<body bgcolor="FFFFFF">
<div align="center">
<table width="750" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td colspan="3" width="750" height="200" background="header.jpg" valign="top" style="padding:0 0 0 10">
   <table width="700" border="0" cellpadding="0" cellspacing="0">
    <tr>
     <td width="750" colspan="3" class="logo">
  
    
     </td>
    </tr>
    <tr>
     <td width="330" class="slogan">
   
     </td>
     <td width="400" align="right">
      <table width="400" border="0" cellpadding="0" cellspacing="0">
       <tr>
        <td align="right" height="20">

        </td>
       </tr>
      </table>
     </td>
     <td width="20"></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td colspan="3" height="15" bgcolor="FFFFFF"></td>
 </tr>
 <tr>
  <td colspan="3" height="1" bgcolor="CCCCCC"></td>
 </tr>
 <tr>
  <td colspan="3" height="10" bgcolor="FFFFFF"></td>
 </tr>
 <tr>
  <td width="170" bgcolor="FFFFFF" valign="top">
  <span style="font-size:6px"><br></span>
  <div align="center">
   <table width="140" border="0" cellpadding="0" cellspacing="0">
    <tr>
     <td><a href="index.php">home</a></td>
    </tr>
    <tr>
     <td>Welcome good people </td>
    </tr>
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <td><a href="login.php">Login</a></td>
    </tr>
    <tr>
     <td>book now</td>
    </tr>
	<tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
   
    
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <tr>
     <td><a href="contactus.php">contact us</a></td>
    </tr>
    <tr>
     <td>we are here for you</td>
    </tr>
   </table>
   <br><span style="font-size:6px"><br></span>
   
  <span style="font-size:6px"><br></span>
  </div>
  </td>
  <td width="1" bgcolor="CCCCCC"></td>
  <td width="579" valign="top">
  <span style="font-size:6px"><br></span>
  <div align="center">
   <table width="549" border="0" cellpadding="0" cellspacing="0">
    <tr>
     <td colspan="4" height="1" bgcolor="AAAAAA"></td>
     <td width="5" height="1" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <td width="1" bgcolor="AAAAAA"></td>
     <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp&nbsp;&nbsp; Torino spare time service  </td>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="5" height="4" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="5" bgcolor="F0F0F0" height="23"></td>
    </tr>
    <tr>
     <td width="1" bgcolor="AAAAAA"></td>
     <td colspan="2" height="1" bgcolor="AAAAAA"></td>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="5" bgcolor="F0F0F0"></td>
    </tr>
    <tr>
     <td width="1" bgcolor="AAAAAA"></td>
     <td colspan="2" bgcolor="FFFFFF">
      <table width="570" border="0" cellpadding="17" cellspacing="0">
       <tr>
        <td style="color:999999;line-height:1.6em">
        <div align="justify">
		<form name = 'rform' action = "registration.php" method = "POST" onsubmit = "return validateData();"  >
            <table cellspacing="8">
              <tr><td> First Name</td><td><input type = "text" name ="fname" placeholder="First Name"></td><tr>
	      <tr><td> Last Name</td><td><input type = "text" name ="lname" placeholder ="Last Name"></td><tr>
	      <tr><td> User Name</td><td><input type = "email" name ="username" placeholder ="User name"></td><tr>
              <tr><td> Password</td><td><input type = "password" name ="password" Placeholder = "Password"></td><tr> 
	      <tr><td> Confirm Password</td><td><input type = "password" name ="confirm" placeholder ="Confirm">
              </td><tr> 
	      <tr><td> </td><td><input type = "submit" name ="register" value = "Register" ></td><tr>
	   </table>	         
          

		          
 <a id = "error"  style="color:red ; visibility:visible">    
              <?php if(isset($_POST['register'])) 
		       {	
			   $conn = mysqli_connect('localhost','root','','s214794');
	           if (!$conn) {
	           die('Connect error '. mysqli_connect_error());
	           }
			$fname=mysqli_real_escape_string($conn,$_POST['fname']);
			$lname=mysqli_real_escape_string($conn,$_POST['lname']);
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$pass=mysqli_real_escape_string($conn,$_POST['password']);			
            $pass=crypt($pass,"abel");
			$query = "select * from login where UserName = '$username'";
			$result =mysqli_query($conn,$query);
			$count=mysqli_num_rows($result);		
			if($count==0)
		    	    {
			 $query = "INSERT INTO login (FirstName,LastName,Password,UserName)VALUES ('$fname','$lname','$pass','$username')";	
			 $result =mysqli_query($conn,$query);				
			if(!$result)
				{
	           die('Connect error registering '. mysqli_connect_error());			
				}
			else
				{
					echo "registered successfully";
				    $_SESSION['registr'] = "success";	                   					
			        ?>
					<script type="text/javascript">
					window.location.href = 'view_reserve.php';
					</script>
					<?php
					}
				
 			    }
    			else
			    {
			        echo "username already exists !!";
			    }                           		        
              }                     
         ?>        
</a>
 </form> 
<br>
</div>

           </form>
		
		 </div>
        </td>
       </tr>
      </table>
     </td>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="5" bgcolor="F0F0F0"></td>
    </tr>
    <tr>
     <td width="1" bgcolor="AAAAAA"></td>
     <td colspan="2" height="1" bgcolor="AAAAAA"></td>
     <td width="1" bgcolor="AAAAAA"></td>
     <td width="5" bgcolor="F0F0F0"></td>
    </tr>
    <tr>
     <td width="1" height="5" bgcolor="FFFFFF"></td>
     <td width="4" height="5" bgcolor="FFFFFF"></td>
     <td width="538" height="5" bgcolor="F0F0F0"></td>
     <td width="1" height="5" bgcolor="F0F0F0"></td>
     <td width="5" height="5" bgcolor="F0F0F0"></td>
    </tr>
   </table>
  <br>
  
  <br>
  <span style="font-size:6px"><br></span>
  </div>
  </td>
 </tr>
 <tr>
  <td colspan="3" height="10" bgcolor="FFFFFF"></td>
 </tr>
 <tr>
  <td colspan="3" height="1" bgcolor="CCCCCC"></td>
 </tr>
 <tr>
  <td colspan="3" height="5" bgcolor="FFFFFF"></td>
 </tr>
 <tr>
  <td colspan="3" bgcolor="FFFFFF" align="right">
  Copyright © 2015 All Rights Reserved 
  </td>
 </tr>
</table>
</div>
</body>
</html>