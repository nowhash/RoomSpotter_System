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

      <!--Start Contact Form-->
      <div class="body-content">
         <script src="contact_form_validate.js"></script>
         <div class="heading3" style="text-align: center; padding-bottom: 5px; font-size: 2em;">GET IN TOUCH
         </div>
         <hr style="width: 50%;">
         <br>
         <br>

         <div class="grid-container">
            <div class="location">
               <font style="color:#32659C;font-family:'Times New Roman',Times,serif;font-size:1.5em;">Location</font>
               <br /> <br />
               <font style="font-family:'Times New Roman',Times,serif;font-size:1.2em; padding:15px 0px 0px 0px;">
                  Adjacent to Patrol Pump, <br />
                  Kumira, Chittagong.<br />
                  Tel: 01800000000<br />
                  Ext.:309,310 <br />
                  Email: demo@roomspotter.com <br /><br>
               </font>

               <iframe width="305" height="230" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.205329321778!2d91.71884641443262!3d22.496478141431005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2777a615585d%3A0xdcf908f6e4f3a713!2sInternational%20Islamic%20University%20Chittagong!5e0!3m2!1sen!2sus!4v1578515507811!5m2!1sen!2sus"></iframe><br />
            </div>

            <div class="contact-form">
               <form method="post" name="contact" action="contact_submit.php" onsubmit="return validateForm()">
                  <label for="author">
                     <font style="color:#32659C;font-weight: bold;">Name:</font>
                  </label>
                  <br>
                  <input style="background-color:rgb(245, 223, 223); width: 350px;" type="text" id="author"
                     name="author" required />

                  <span style="font-size:15px; color:red; display: inline-block;" id="nameErr"></span>
                  <br>

                  <label style="padding:10px 0px 0px 0px;" for="email">
                     <font style="color:#32659C; font-weight: bold; ">Email:</font>
                  </label>
                  <br>
                  <input style="background-color:rgb(245, 223, 223); width: 350px;" type="text" id="email" name="email"
                     required />

                  <span style="font-size:15px; color:red; display: inline-block;" id="emailErr"></span>
                  <br>

                  <label style="padding:10px 0px 0px 0px;" for="phone">
                     <font style="color:#32659C; font-weight: bold;">Phone:</font>
                  </label>
                  <br>
                  <input style="background-color:rgb(245, 223, 223); width: 350px;" type="text" name="phone" id="phone"
                     required />

                  <span style="font-size:15px; color:red; display: inline-block;" id="numErr"></span>
                  <br>

                  <label style="padding:10px 0px 0px 0px;" for="text">
                     <font style="color:#32659C; font-weight: bold;">Message:</font>
                  </label>
                  <br>
                  <textarea style="background-color:rgb(245, 223, 223);" id="text" name="text" rows="10" cols="60"
                     required></textarea>
                  <br />
                  <center><button type="Submit" value="Send" name="sendmail" style="width: 350px;">Send</button>
                  </center>
               </form>
            </div>
         </div>
      </div>
      <!--End Contact Form-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->

   </div>
</body>

</html>