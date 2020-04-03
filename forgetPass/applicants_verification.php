<?php
include_once '../config.php';
   if(isset($_GET['fkey']))
   {
      $fkey=$_GET['fkey'];

      $sql="select fkey,email from applicants where fkey='$fkey'";

      $result=mysqli_query($conn,$sql);
      $data=mysqli_fetch_assoc($result);
      $email=$data['email'];

      $fkey_verified=$data['fkey'];

      if($fkey==$fkey_verified)
      {
      if(isset($_POST['submit']))
      {
         $sql="update applicants set fkey= NULL where fkey='$fkey_verified'";

         if($conn->query($sql)==TRUE){

         $pass=md5($_POST['pass']);
         $c_pass=md5($_POST['c_pass']);

         // Given password
         $password = $_POST['pass'];

      // Validate password strength
         $uppercase = preg_match('@[A-Z]@', $password);
         $lowercase = preg_match('@[a-z]@', $password);
         $number    = preg_match('@[0-9]@', $password);
         $specialChars = preg_match('@[^\w]@', $password);

      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
         echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      }
      else{
         $sql="UPDATE applicants SET pass='$pass',c_pass='$c_pass' where email='$email'";

         if($conn->query($sql)==TRUE)
         {
            echo ("<script> alert('Password Recovery Successful');</script>");
            echo("<script>window.location='../login/login.php'</script>");
         }
      }


      }
      }
      }

      else{
         echo ("<script> alert('Something Wrong...!!');</script>");
         echo("<script>window.location='../index.php'</script>");
      }

   }
?>



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
               <form action="#" method="POST">
                  <table border="0">
                     <tr>
                        <td>Password:</td>
                        <td><input type="password" placeholder="Enter your password..!" name="pass" id="pass" required>
                        </td>
                     </tr>

                     <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" placeholder="Confirm Password..!" name="c_pass" required></td>
                     </tr>
                  </table>

                  <br>

                  <center> <button type="Submit" name="submit">Login</button></center>
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


