<?php
@ob_start();
session_start();
?>
<?php
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS']=="")
 {
   $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   header("location:$redirect");
 }
?>

<?php
if(isset($_SESSION['time'])) {

    if($_SESSION['time'] < time()) {
       session_destroy();
       header("location:login.php"); 
    }
    else {
        $_SESSION['time'] = time() + 120;
    }
}
?>
<?php
if(!isset($_SESSION['uid'])) {
    session_destroy();
    header("location:login.php"); 
  }
?>
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
     <td><a href="all_view.php">View_All</a></td>
    </tr>
    <tr>
     <td>View_All </td>
    </tr>
	 <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr>
	<tr>
     <td><a href="view_reserve.php">My_Reserve</a></td>
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
     <td><a href="reserve.php">book</a></td>
    </tr>
    <tr>
     <td>book a reservation</td>
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
     <td><a href="logout.php">logout</a></td>
    </tr>
    <tr>
     <td>see you soon </td>
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
    
     </table>
   <br><span style="font-size:6px"><br></span>
   
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
     <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp&nbsp;&nbsp; Torino Machine Reservation  </td>
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
		<?php  
   $conn = mysqli_connect('localhost','root','','s214794');
   if (!$conn) {
   die('Connect error '. mysqli_connect_error()); 
   }
?>
		
		

		<?php 
		if (isset($_POST['cancel']))
		{
		//$name= $_POST['Id'];
		   //foreach($name as $val) 
		    //  {
			    //$Id = $val;	
			    $Id = $_POST['Id']; 				   
				
			    $UserName = $_POST['UserName']; 				   
		        $StartTime =$_POST['StartTime'];
				$CurrentTime = date('H'.'i');
				//echo "current time is $CurrentTime <br>";
				$StartTime2= $StartTime +1;
				if ($StartTime2>=$CurrentTime)
				die('Error: you have to wait more than one minute to cancel  ' . mysqli_error($conn));
    		    $query = "delete from reservation  where Id ='$Id'";
				if (!mysqli_query($conn,$query)) 
		             { 
		               die('Error: deleting ' . mysqli_error($conn));
		             }
			    else
			       {
		            echo "<h4>you have deleted  your reservation successfully!</h4>";
			      
			       } 
					//break;
			      //}
			 }
				  ?>
<table cellspacing="8">
			<tr>
			<th bgcolor="#597F20"><font color="CCFFFF"> Your user_name  </font> </th>
			<th bgcolor="#597F20"><font color="CCFFFF"> Machine_Name </font> </th>
			<th bgcolor="#597F20"><font color="CCFFFF"> Start_Time </font> </th>
			<th bgcolor="#597F20"><font color="CCFFFF"> End Time </th>
			<th bgcolor="#597F20"><font color="CCFFFF"> Duration </th>

			
			
	    </table>	         
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