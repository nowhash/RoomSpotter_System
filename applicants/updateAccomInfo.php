<?php
session_start();
require_once '../include/head.php';
include_once '../config.php';

if(isset($_SESSION['applicants_id']))
{
?>

<html>
<body>
   <div class="wrapper">
      <!--Start Nav_Banner Area-->
      <?php  
         if(isset($_SESSION['applicants_id']))
         {
            include_once '../include/applicants_banner_nav.php';
         }
         else if(isset($_SESSION['providers_id'])){
            include_once '../include/providers_banner_nav.php';
         }
         else{
            include_once '../include/banner_nav.php';
         }
      ?>
      <!--End Nav_Banner Area-->
      <div class="body-content">
         <div class="user-homepage-btn">
            <button class="user-homepage active" onclick="location.href='applicant_homepage.php';">
            <i class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage" onclick="location.href='available_accommodation.php';">
            <i class="fas fa-home"></i>&nbsp;Available Accommodation</button>
         </div>

         <br><br>
         
         <div class="user_profile">
            <?php

               $sql="select * from applicants where applicants_id='".$_SESSION['applicants_id']."'";
               $result=mysqli_query($conn,$sql);
               $data=mysqli_fetch_assoc($result);
                
               $id=$data['applicants_id'];
               $fname=$data['fname'];
               $lname=$data['lname'];
               $email=$data['email'];
               $p_contact=$data['p_contact'];
               $e_contact=$data['e_contact'];
               $bcn=$data['bcn'];
               $ssc_reg=$data['ssc_reg'];
               $hsc_reg=$data['hsc_reg'];
               $img_dest=$data['img_dest'];
               echo ("
  
               <form action='update_connection.php' method='POST'>
               <table border=0 style='border: collapse;' class='user_data'>
               <tr>
               <td>
               <div class='profile_pic' align='center'>
               <img src='$img_dest'/>
               </td>
               <td> 
               <div class='heading1' span style='font-size:2.4em; padding-top:2em; padding-bottom:2em; text-align: center;'>Update Information </div> </td>
               <tr/>

               <tr class='tr_two'>
                  <td>Your ID: </td>
                  <td>APP-$id</td>
               </tr>

               <tr class='tr_two'>
               <td>First Name:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$fname' name='fname'></td>
               </tr>

               <tr class='tr_two'>
               <td>Last Name:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$lname' name='lname'></td>
               </tr>

               <tr class='tr_two'>
               <td>Personal Contact No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$p_contact' name='pNumber'></td>
               </tr>

               <tr class='tr_two'>
               <td>Emergency Contact No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$e_contact' name='eNumber'></td>
               </tr>

               <tr class='tr_two'>
               <td>Birth Certificate No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$bcn' name='bcn'></td>
               </tr>

               <tr class='tr_two'>
               <td>SSC Registration No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$ssc_reg' name='sscReg'></td>
               </tr>

               <tr class='tr_two'>
               <td>HSC Registration No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$hsc_reg' name='hscReg'></td>
               </tr>
               </table>

                  <center>
                     <button type='submit' name='submit' class='info_update'>Update</button>
                  </center>
               </form>
               ");
            ?>
         </div>

         <!--Start Footer Part-->
         <?php include_once '../include/footer.php' ?>
         <!--End Footer Part-->
      </div>
</body>
</html>

<?php }
      else{
         header("Location:../index.php");
      } ?>