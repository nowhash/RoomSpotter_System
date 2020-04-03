<?php session_start();?>

<html>

<!--Start Head Content-->

<head>
   <?php include_once '../include/head.php' ?>
</head>
<!--End Head Content-->

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

      <!--Start Service-->
      <div class="body-content">
         <div class="content">
         <div class="heading4" align="center">Services</div>
         <br>
            The service provided by Room Spotter system are enlisted below: <br><br>
            1. Accommodation Crisis Resolving System (Room Spotter) helps applicants to find their accommodation near to their exam center. <br>

            2.	It can be act as a seamless platform between applicants and accommodation provider. <br>

            3. Resolve the accommodation crisis as well as provide a better facility. <br>

            4. Support to select the appropriate accommodation. <br>
            
            5. Provide admission related news.<br>

            6. All accommodation related areas. <br>

            7.	It increases collaboration between applicants and accommodation provider.<br>
            8.	It helps students to take their final preparation in a hassle free environment.<br>
            9.	It reduces pressure on overall Traffic System during Admission Test as students stay near to their exam hall.<br>
            10.	Applicants can get the chance to stay in the hall and judge the environment of hall before admission.


         </div>
      </div>
      <!--End Service-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->

   </div>
</body>

</html>