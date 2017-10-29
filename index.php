<?php
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS']=="")
 {
   $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   header("location:all_view.php");
 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
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
     <td width="330" colspan="3" class="logo">
	
  
    
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
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <td><a href="registration.php">Register</a></td>
    </tr>
    <tr>
     <td>join us </td>
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
     <tr>
     <td><a href="all_view.php">contact us</a></td>
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
     <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp&nbsp;&nbsp; Torino&nbsp;&nbsp Machine&nbsp;&nbsp Reservation</td>
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
     <td colspan="2" bgcolor="FFFFFF"><table width="570" border="0" cellpadding="17" cellspacing="0">
       <tr>
        <td style="color:999999;line-height:1.6em">
        <div align="justify">
           <form name='home' action = "index.html" method = "POST" ">
<table cellspacing="8">
			<tr>
			<th bgcolor="#597F20"><font color="CCFFFF"> User_Name</th>
			<th bgcolor="#597F20"><font color="CCFFFF"> Machine_Type </th>
			<th bgcolor="#597F20"><font color="CCFFFF">Start_time </th>
			<th bgcolor="#597F20"><font color="CCFFFF">EndTime </th>
			<th bgcolor="#597F20"><font color="CCFFFF">  Duration </th>

			
			<a id = "error" style=visibility:visible> 
			<?php
			//session_start();
			//$email =$_SESSION['email'];
					
			$conn = mysqli_connect('localhost','root','','s214794');
	           if (!$conn) {
	           die('Connect error '. mysqli_connect_error());
	           }			
			   $query = "SELECT * FROM reservation order by StartTime ";
			 if (!mysqli_query($conn,$query))
			  {
			 die('Error: ' . mysqli_error($con));
			  }
			$result = mysqli_query($conn,$query);
			
			while($row = mysqli_fetch_array($result)) 
			{
			  echo "<form name=booked action=booking.php method=POST>";
			  echo "<tr>";
			  echo "<td>" . $row['UserName'] . "</td>";
			  echo "<td>" . $row['SelectedMachine'] . "</td>";
			  echo "<td>" . $row['StartTime'] . "</td>";
			  /*$Duration = $row['EndTime'];
			  $StartTime1= $row['StartTime'];
			  $workingHours = (strtotime($Duration) - strtotime($StartTime1)) / 3600;
			  echo $workingHours;*/
			  echo "<td>" . $row['EndTime'] . "</td>";
			  echo "<td>" . $row['Duration'] . "</td>";
			  
			  echo "</tr>";
			 
			}
			?></a>
		</table> 
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