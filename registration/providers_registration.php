<html>
<!--Start Head Content-->

<head>
   <?php include_once '../include/head.php' ?>
</head>
<!--End Head Content-->

<body>
   <div class="wrapper">
      <!--Start Banner Area-->
      <?php include_once '../include/banner_nav.php' ?>
      <!--End Banner Area-->

      <!--Start Registration Form-->
      <div class="body-content">
         <div class="container" style="padding-left: 15%; padding-right: 15%;">
            <div class="container-backg">
               <div class="heading3" style="text-align: left; padding-bottom: 5;">Create an Account</div>
               <font size="2px">Complete form below to sign up for our service</font>
               <hr>
               <div class="user-homepage-btn">

                  <button class="user-homepage" onclick="location.href='applicants_registration.php';"><i
                        class="fas fa-user-cog"></i>&nbsp;Applicants</button>

                  <button class="user-homepage active" onclick="location.href='providers_registration.php';"><i
                        class="fas fa-home"></i>&nbsp;Providers</button>

               </div>
               <?php include_once 'providers_form.php'?>
               
            </div>
         </div>
      </div>
      <!--End Registration Form-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>

</html>