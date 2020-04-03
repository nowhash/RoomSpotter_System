<?php 
session_start();
include_once '../include/head.php';
?>

<html>

<body>
   <div class="wrapper">
      <!--Start Banner Area-->
      <?php  
         if(isset($_SESSION['applicants_id']))
         {
            include_once '../include/applicants_banner_nav.php';
         }
         else if(isset($_SESSION['providers_id'])){
            include_once '../include/providers_banner_nav.php';
         }
         else if(isset($_SESSION['admin_id'])){
            include '../include/admin_banner_nav.php';
         }
         else{
            include_once '../include/banner_nav.php';
         }
      ?>
      <!--End Banner Area-->

      <!--Start University Info-->
      <div class="body-content">
         <center>
            <div class="heading4" style="padding:5px; width:900px; text-align:">
            International Islamic University Chittagong<br> (IIUC)
         </div>
      </center>
      <div class="content" styel="padding-top:0px;">
         <table border="0" style="border: collapse;">
            <tr>
               <td style="padding: 10px;">
                  <img class="img1" src="../assets/hall1.jpeg" height="50%" width="100%" />
               </td>
               <td>
                  <img class="img1" src="../assets/hall2.jpg" height="50%" width="100%" />
               </td>
            </tr>
            <tr>
               <td>
                  <center>
                     <div class=box1>
                        <div class="heading3">Hazrat Abu Bakar(R) Hall</div>
                        <div class="para">
                           Behind Faculty of Science & Engineering.
                           <br>
                           3.1 km Distance From Main Gate
                           <br>
                           <b>Find Location On</b>
                           <br>
                           <a
                              href="https://www.google.com.bd/maps/dir/International+Islamic+University+Chittagong,+Kumira/Abu+Bakar+Hall,+Unnamed+Road,+Kumira/@22.4987537,91.7084885,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x30ad2777a615585d:0xdcf908f6e4f3a713!2m2!1d91.7210351!2d22.4964732!1m5!1m1!1s0x30acd142fa050487:0xff887c3f54be3013!2m2!1d91.7187024!2d22.4996699?hl=en">Google
                              Maps</a>
                        </div>
                     </div>
                  </center>
               </td>

               <td>
                  <center>
                     <div class=box1>
                        <div class="heading3">Hazrat Uthman(R) Hall</div>
                        <div class="para">Behind Faculty of Science & Engineering.
                           <br>
                           3.1 km Distance From Main Gate
                           <br>
                           <b>Find Location On</b>
                           <br>
                           <a
                              href="https://www.google.com.bd/maps/dir/International+Islamic+University+Chittagong,+Kumira/Hazrat+Uthman+(R.)+Hall,+Bara+Kumira+Road/@22.4987537,91.7084885,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x30ad2777a615585d:0xdcf908f6e4f3a713!2m2!1d91.7210351!2d22.4964732!1m5!1m1!1s0x30acd1de042aacf1:0x2073153d8f287e58!2m2!1d91.7187403!2d22.4994419?hl=en">Google
                              Maps</a>
                        </div>
                     </div>
                  </center>
               </td>
            </tr>
         </table>
      </div>
      <!--End University Info-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->

   </div>
</body>

</html>