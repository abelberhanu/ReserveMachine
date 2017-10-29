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
<script type = "text/javascript">
function validateData()
{
if(document.rform.pno.value =="")
{
  alert("please enter number of participants !");
  return false;
}
if(document.rform.stime.value =="")
{
  alert("please enter start time!");
  return false;
}
if(document.rform.etime.value =="")
{
  alert("please enter end time!");
  return false;
}
return true;
}
</script>
<noscript>
 Warnning : There is no javascript installed on the browser!
</noscript>
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
     <td height="5" bgcolor="FFFFFF"></td>
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
     <td><a href="view_reserve.php">view my reserve</a></td>
    </tr>
    <tr>
     <td>view</td>
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
   
    <tr>
     <td height="5" bgcolor="FFFFFF"></td>
    </tr> </table>
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
				<form name = 'rform' action = "reserve.php" method = "POST" onsubmit = "return validateData();"  >

		<table cellspacing="8">
              <tr><td>Machine type = 3D Printer Machine</td>
			   <tr><td>Start Time</td><td>
         HH:  
    <select  name="shour">
    <?php for($i = 0; $i < 24; $i++): ?>
      <option value="<?=$i; ?>"><?= $i % 24 ?> </option>
    <?php endfor ?>
    </select>
    
    MM:
    <select  name="smin">
    <?php for($i = 0; $i < 60; $i++): ?>
      <option value="<?= $i; ?>"><?= $i % 60 ?> </option>
    <?php endfor ?>
    </select>
    
    <br></td><tr>
	      <tr><td>Duration </td><td> 
         <br />
            &nbsp &nbsp&nbsp &nbsp  <input type="text" name= "duration"><br><br>
    
   
    
    <br></td><tr>
              </td><tr> 
	      <tr><td> </td><td><input type = "submit" name ="reserve" value = "Reserve" ></td><tr>
	   </table>	 	
<?php  
   $conn = mysqli_connect('localhost','root','','s214794');
   if (!$conn) {
   die('Connect error '. mysqli_connect_error());   }
?>	   
 <a id = "error"  style="color:red ; visibility:visible">    
              <?php if(isset($_POST['reserve'])) 
		       {	
			    $uname =$_SESSION['uid'];
			   $conn = mysqli_connect('localhost','root','','s214794');
	           if (!$conn) {
	           die('Connect error '. mysqli_connect_error());
	           }
			//$parno=mysqli_real_escape_string($conn,$_POST['pno']);
			$starthour=mysqli_real_escape_string($conn,$_POST['shour']);
			$startmin=mysqli_real_escape_string($conn,$_POST['smin']);
			
			//$endhour=mysqli_real_escape_string($conn,$_POST['ehour']);
			//$endhour1=$endhour+$starthour;
			$endmin=mysqli_real_escape_string($conn,$_POST['duration']);
			$endmin1=$endmin+$startmin;
						echo "total min  $endmin1 <br>";

			$endhour1=$starthour;
						echo "total hour before  $endhour1 <br>";
			$totstahour=23-$starthour;
			$totstarmin =60 -$startmin;
			$totstahour=$totstahour*60;
			$totstart=$totstahour+$totstarmin;
			if ($endmin>=$totstart)
			{
						die('you can not reserve more than  a day  '. mysqli_connect_error());	
			}
			 $startime1=$starthour.":".$startmin;
			 if ($endmin1>=60)
			 {
			 
			 $divhour=intval($endmin/60);
			 
			 $endhour1=$starthour+$divhour;
			 echo "hour added $endhour1 <br>";
			 $modmin=$endmin1%60;
			 echo "modulo  $modmin <br>";
			 $endmin1=$startmin+$modmin;
			 echo "added min  $endmin1 <br>";
			 }
			$endtime2=$endhour1.":".$endmin1;
			$duration= $endmin;
			echo "start time  $startime1 <br>";
			echo "end time $endtime2 <br>";
			
			$tot=0;
		//	echo "start $startime <br>";
			if ($endhour1==0&& $endmin1==0)
			die('the duration should be at least more than minute  '. mysqli_connect_error());	
			/*
			if ($starthour > $endhour)
			die('enter the time properly  '. mysqli_connect_error());
			if ($starthour == $endhour&&$startmin >$endmin)
			die('enter the time properly  '. mysqli_connect_error());
			*/
		
			$query = "BEGIN";
			mysqli_query($conn,$query);			
            $query = "SELECT * FROM reservation where UserName =  '$uname' and StartTime >= '$startime1' and StartTime <='$endtime2' or 
			StartTime <= '$startime1' and EndTime >='$startime1'";
               $result = mysqli_query($conn,$query);
			  
                 $count=mysqli_num_rows(mysqli_query($conn,$query));
				echo "count till now  $count <br>";
				$tot=1 + $count;

								echo "count adding current amount $tot <br>";

				//echo "user name is $uname <br>";
				$Machine = "3Dprinter ";
				$num_machine=4;
				if ($tot<=$num_machine)
							{
							
						 $query = "INSERT INTO reservation (UserName,SelectedMachine,StartTime,EndTime,Duration)VALUES ('$uname','$Machine','$startime1','$endtime2','$duration')";	
						 $result =mysqli_query($conn,$query);
				       
						if(!$result)
							{
						   die('Connect error '. mysqli_connect_error());			
							}
						else
							{
							   // $_SESSION['registr'] = "success";	                   					
								?>
								<script type="text/javascript">
							window.location.href = 'view_reserve.php';
								</script>
								<?php
							}
							$query = "COMMIT";
										mysqli_query($conn,$query);

							
							}
							
					else
						{
							echo "the total participants is getting above 4. pls insert less";
						}				
                   }  
         ?>        
</a>		
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