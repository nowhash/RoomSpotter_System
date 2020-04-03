<?php 
session_start(); 
include_once '../include/head.php';
?>

<html>
<body>
   <div class="wrapper">
      <!--Start Banner-Nav Area-->
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
      <!--End Banner-Nav Area-->

      <div class="body-content">
         <div class="content" style="text-align: justify;">
            <div class="heading4">About Us</div>
            <br>
               Room Spotter,an accommodation crisis resolving system for the applicants during admission test.<br><br>
               <b>The objectives of our system are as below:</b><br><br>
               1.	<b>Accommodation Crisis Resolving System (Room Spotter)</b> helps applicants to find their accommodation near to their exam center.<br>
               2.	It can be act as a seamless platform between applicants and accommodation provider.<br><br>

               Other objectives of <b>Room Spotter System </b> are enlisted in the following:<br><br>
               1.	It increases collaboration between applicants and accommodation provider.<br>
               2.	It helps students to take their final preparation in a hassle free environment.<br>
               3.	It reduces pressure on overall Traffic System during Admission Test as students stay near to their exam hall.<br>
               4.	Applicants can get the chance to stay in the hall and judge the environment of hall before admission.<br><br>

               <b>How our system works:</b><br>

               <img style="float:right;" height="250px" src="../assets/about_fig.png"/>
               Room Spotter System acts as a platform between
               <br>Applicants & Providers.
               <br>Accommodation Provider update his accommodation info <br> like available space. <br>
               This info wille be shown in applicants profile.<br>
               Applicants can see & send request for accommodation to providers.<br>
               Providers can see the requested applicants info. <br> If he accepts the request then the requested space will be reserved for that particular applicants.<br>
               Thats how Room Spotter system works....!!
               <br> <br>
               However the Room Spotter system also applicable for other gatherings including providing accommodation facilities in the tourist spot during the vacation period,gatherings of students for several contest,hackathons,Olympiads,etc.
               <br><br><br>
         </div>
      </div>

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>
</html>