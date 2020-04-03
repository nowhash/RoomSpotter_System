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
               $name=$data['fname'].' '.$data['lname'];
               $email=$data['email'];
               $p_contact=$data['p_contact'];
               $e_contact=$data['e_contact'];
               $bcn=$data['bcn'];
               $ssc_reg=$data['ssc_reg'];
               $hsc_reg=$data['hsc_reg'];
               $img_dest=$data['img_dest'];
               echo ("
  
               <table border=0 style='border: collapse;' class='user_data'>
               <tr>
               <td>
               <div class='profile_pic' align='center'>
               <img src='$img_dest'/>
               </td>
               <td> 
               <div class='heading1' span style='font-size:2.4em; padding-top:2em; padding-bottom:2em; text-align: center;'>User Information </div> </td>
               <tr/>

               <tr class='tr_one'>
                  <td>Your ID: </td>
                  <td>APP-$id</td>
               </tr>

               <tr class='tr_two'>
               <td>Name:</td>
               <td>$name</td>
               </tr>

               <tr class='tr_one'>
                  <td>Email: </td>
                  <td>$email</td>
               </tr>

               <tr class='tr_two'>
               <td>Personal Contact No.:</td>
               <td>$p_contact</td>
               </tr>

               <tr class='tr_one'>
                  <td>Emergency Contact No.: </td>
                  <td>$e_contact</td>
               </tr>

               <tr class='tr_two'>
               <td>Birth Certificate No.:</td>
               <td>$bcn</td>
               </tr>

               <tr class='tr_one'>
                  <td>SSC Registration No. : </td>
                  <td>$ssc_reg</td>
               </tr>

               <tr class='tr_two'>
               <td>HSC Registration No. :</td>
               <td>$hsc_reg</td>
               </tr>
               </table>
               ");
            ?>
            <center>
               <button class="info_update" onclick="location.href='updateAccomInfo.php';">Update info</button>
            </center>
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