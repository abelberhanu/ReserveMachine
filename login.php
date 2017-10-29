<?php 
 session_start();
 if(isset($_SESSION['uid']))
{
 header("location:view_reserve.php"); 
}
 ?>
 <?php



    function chkCookiesEnabled() // Test if browser has cookies enabled
    {
      // Avoid overhead, if already tested, return it
      if( defined( 'SU_CLIENT_COOKIES_ENABLED' ))
       { return SU_CLIENT_COOKIES_ENABLED; }

      $abel = ini_get( 'session.use_cookies' ); 
      ini_set( 'session.use_cookies', 1 ); 

      $a = session_id();
      $bWasStarted = ( is_string( $a ) && strlen( $a ));
      if( !$bWasStarted )
      {
        @session_start();
        $a = session_id();
      }

   // Make a copy of current session data
  $aSesDat = (isset( $_SESSION ))?$_SESSION:array();
   // Now we destroy the session and we lost the data but not the session id 
   // when cookies are enabled. We restore the data later. 
  @session_destroy(); 
   // Restart it
  @session_start();

   // Restore copy
  $_SESSION = $aSesDat;

   // If no cookies are enabled, the session differs from first session start
  $b = session_id();
  if( !$bWasStarted )
   { // If not was started, write data to the session container to avoid data loss
     @session_write_close(); 
   }

   // When no cookies are enabled, $a and $b are not the same
  $b = ($a === $b);
  define( 'SU_CLIENT_COOKIES_ENABLED', $b );

  if( !$abel )
   { @ini_set( 'session.use_cookies', 0 ); }

  //echo $b?'1':'0';
  return $b;
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
   <tr><th><a style=color:red>
        <?php
       if( chkCookiesEnabled())
                { echo 'Cookies are enabled!'; }
           else { echo 'Cookies are NOT enabled!'; }
          ?> 
   <a>
   </th>
   </tr>
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
     <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp&nbsp;&nbsp;Torino Machine Reservation </td>
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
		<a> 
<?php 

				if (isset($_POST['submit'])) 
                 {
				
	           $conn = mysqli_connect('localhost','root','','s214794');
	           if (!$conn) {
	           die('Connect error '. mysqli_connect_error());
	           }
		       $user=mysqli_real_escape_string($conn , $_POST['user']);
		       $pass=mysqli_real_escape_string($conn , $_POST['pass']);
		       $hashed = crypt(mysqli_real_escape_string($conn,$_POST['pass']),"abel");
		 		$query ="select * from login where UserName = '$user'and Password = '$hashed'";
				$result = mysqli_query($conn,$query);
					$count=mysqli_num_rows(mysqli_query($conn,$query));
	 	      if($count==0)
    	                    {
	                      echo "Invalid username or Password! register ????";
     	                    }
	              else 
                            {
							// while($row = mysqli_fetch_array($result)) 
              // {
				//	$uid=$row['userid'];
			  // }
			  	                      echo "login successful ";

							$_SESSION['time']=time()+120; 
      		                $_SESSION['uid']= $user;
						  ?>
							<script type="text/javascript">
							window.location.href = 'view_reserve.php';
							</script>
							<?php		
                            }                     
                mysqli_close($conn);
                
           

			   }
			   ?></a>

		<form action = "login.php" method = "POST">
           <br />
            &nbsp &nbsp&nbsp &nbsp USER NAME: <input type="text" name= "user"><br><br>
            &nbsp &nbsp&nbsp &nbsp PASSWORD:  <input type= "password" name= "pass"><br>            
            <br>
            &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
            &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
            <input type = "submit" name="submit"  value = "login" ><br><br>
            &nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp &nbsp
			
			<?php
	if( chkCookiesEnabled())
 { echo 'Cookies are enabled!'; }
else { echo 'Cookies are NOT enabled!'; }
?>

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
