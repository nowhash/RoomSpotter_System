<?php
session_start();
require_once '../include/head.php';
include_once '../config.php';
if(isset($_SESSION['providers_id']))
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
            include_once '../include/header.php';
         }
      ?>
      <!--End Nav_Banner Area-->

      <div class="body-content">
         <div class="user-homepage-btn">
            <button class="user-homepage active" onclick="location.href='provider_homepage.php';">
            <i class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage" onclick="location.href='accom_info.php';">
            <i class="fas fa-home"></i>&nbsp;Accommodation Info</button>

            <button class="user-homepage" onclick="location.href='pendingRequest.php';">
            <i class="fas fa-bell"></i>&nbsp;Pending Request</button>
         </div>

         <br>

         <div class="user_profile">
            <?php
               $sql="select * from providers p JOIN providers_accom_info pa ON p.providers_id=pa.providers_id JOIN accommodation a ON a.accom_id=pa.accom_id where p.providers_id='".$_SESSION['providers_id']."'";

               $result=mysqli_query($conn,$sql);
               $data=mysqli_fetch_assoc($result);
                
               $room=$data['room_no'];
               $available_space=$data['available_space'];
               $img=$data['img_dest'];
               $id=$data['providers_id'];
               
               echo ("
               <form action='accom_info_conn.php' method='POST'>
               <table border=0 style='border: collapse;' class='user_data'>
               <tr>
               <td colspan='2'>
               <div class='heading1' span style='font-size:2.2em; text-align: center; padding-top:.4em; padding-bottom:.4em'>Accommodation Information </div> </td>
               <tr/>

               <tr class='tr_two'>
                  <td>Your ID: </td>
                  <td>PRO-$id</td>
               </tr>

               <tr class='tr_two'>
               <td>Room No:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$room' name='room'></td>
               </tr>

               <tr class='tr_two'>
               <td>Available Space:</td>
               <td><input style='border:1px solid #F5EBE9; width: 100%;
               padding: 10px; margin: 0px; font-size:0.8em;' type='text' id='fname' value='$available_space' name='available_space'></td>
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