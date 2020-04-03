<html>
<!--Start Head Content-->

<head>
   <?php  include_once '../include/head.php';?>
</head>
<!--End Head Content-->

<body>
   <div class="wrapper">
      <!--Start Banner Area-->
      <?php include_once '../include/banner_nav.php' ?>
      <!--End Banner Area-->
      <!--Start Login Form-->
      <div class="body-content">
         <div class="container" style="padding-right: 25%; padding-left: 25%;">
            <div class="container-backg">
               <div class="heading3" style="text-align: left; padding-bottom: 5;">Password Recovery</div>
               <font size="2px">Complete form below to recover your password...</font>
               <hr>
               <form action="forget_pass_conn.php" method="POST">
                  <table border="0">
                     <tr>
                        <td>Email:</td>
                        <td><input type="text" placeholder="Enter your email..!" name="email" required></td>
                     </tr>

                     <tr>
                        <td>User Type: </td>
                        <td>
                           <select name="userType" style="padding:8px; font-size:0.9em;">
                              <option value="applicant" selected>Applicant</option>
                              <option value="provider">Provider</option>
                           </select>
                        </td>
                     </tr>
                  </table>

                  <br>

                  <center> <button type="Submit" name="submit">Send</button></center>
               </form>
            </div>
         </div>
      </div>
      <!--End Login Form-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->

   </div>
</body>

</html>