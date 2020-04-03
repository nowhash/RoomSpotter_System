<?php
session_start();

if(isset($_SESSION['providers_id']))
{
?>

<html>
<!--Start Head Content-->

<head>
   <?php require_once '../include/head.php' ?>
   <script src="../registration/script.js"></script>
</head>
<!--End Head Content-->

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
            include_once '../include/header.php';
         }
      
      ?>
      <!--End Nav_Banner Area-->

      <div class="body-content">
         <div class="user-homepage-btn">

         <button class="user-homepage active" onclick="location.href='provider_homepage.php';"><i
                  class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage" onclick="location.href='accom_info.php';"><i
                  class="fas fa-home"></i>&nbsp;Accommodation info</button>

            <button class="user-homepage" onclick="location.href='pendingRequest.php';"><i
                  class="fas fa-bell"></i>&nbsp;Pending Request</button>
         </div>
         <br>
         <div class="user_profile">
            <?php
            include_once '../config.php';

               $sql="select * from providers where providers_id='".$_SESSION['providers_id']."'";
               $result=mysqli_query($conn,$sql);
               $data=mysqli_fetch_assoc($result);
                
               $id=$data['providers_id'];
               $fname=$data['fname'];
               $lname=$data['lname'];
               $p_contact=$data['p_contact'];
               $bcn=$data['bcn'];
               $img=$data['img_dest'];

               echo ("
               <form action='update_info_conn.php' method='POST'>
               <table border=0 style='border: collapse;' class='user_data'>
               <tr>
               <td>
               <div class='profile_pic' align='center'>
               <img src='$img'/>
               </td>
               <td> 
               <div class='heading1' span style='font-size:2.4em; padding-top:2em; padding-bottom:2em; text-align: center;'>Update Information </div> </td>
               <tr/>

               <tr class='tr_two'>
                  <td>Your ID: </td>
                  <td>PRO-$id</td>
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
               <td>Birth Certificate No.:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$bcn' name='bcn'></td>
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