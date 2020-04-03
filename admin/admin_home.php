<?php
session_start();

if(isset($_SESSION['admin_id']))
{
?>

<html>


<!--Start Head Content-->

<head>
<style>
.admin_home{
   padding:100px; 
   padding-left: 10%; 
   padding-right: 10%;
   background: #FFFFFF;
   box-shadow: 0 0 5px 15px #E1D8D8;
   margin-left: 100px;
   margin-right: 100px;
}

.admin-homepage-btn:hover{
   color: #404040 !important;
   font-weight: 700 !important;
   letter-spacing: 3px;
   background: none;
   -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
   -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
   transition: all 0.3s ease 0s;
}

}
</style>
   <?php require_once '../include/head.php' ?>
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

         else if(isset($_SESSION['admin_id'])){
            include '../include/admin_banner_nav.php';
         }

         else{
            include_once '../include/banner_nav.php';
         }
      ?>
      <!--End Nav_Banner Area-->

      <div class="body-content">
         <div class="admin_home">
         <div class="admin-homepage">
            <div class="heading2">Welcome to RoomSpotter Admin System</div> <br> <br>
            <button class="admin-homepage-btn" style="border: none; background: #404040; color: #ffffff !important; font-weight: 100; padding: 20px; border-radius: 6px; display: inline-block; transition: all 0.3s ease 0s; font-size:1.5em;" onclick="location.href='../news/news_post.php';"></i>&nbsp;Publish News</button>

            <button class="admin-homepage-btn" style="border: none; background: #404040; color: #ffffff !important; font-weight: 100; padding: 20px; border-radius: 6px; display: inline-block; transition: all 0.3s ease 0s; font-size:1.5em;"  onclick="location.href='../faq/faq_post.php';">&nbsp;Publish FAQ</button>

            <center><button class="admin-homepage-btn" style="border: none; background: #404040; color: #ffffff !important; font-weight: 100; padding: 10px; border-radius: 6px; display: inline-block; transition: all 0.3s ease 0s; font-size:1.2em;"  onclick="location.href='update_login.php';">&nbsp;Update Login info</button></center>
         </div>
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