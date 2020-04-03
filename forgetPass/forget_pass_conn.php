<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $userType=$_POST['userType'];

   if($userType=='applicant'){

      $sql="select email,p_contact from applicants where email='$email'";
      $result=mysqli_query($conn,$sql);
      
      if($row=mysqli_num_rows($result)==1)
      {
         $data=mysqli_fetch_assoc($result);
         $email=$data['email'];      
         $phone=$data['p_contact'];

         $fkey=md5(time().$phone);

         $sql2="UPDATE applicants set fkey='$fkey' where email='$email'";

         if($conn->query($sql2)==TRUE){
            $sql="select * from applicants where email='$email'";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            
      
            echo ("<script> alert('A confirmation mail is sent...!!');</script>");
            echo("<script>window.location='../index.php'</script>");

            //Start Mail Notification.
            require '../PHPMailer/PHPMailerAutoload.php';

            $message="Please click here to recover your password <a href='http://localhost/RoomSpotter/forgetPass/applicants_verification.php?fkey=$fkey'>Recover Password</a>";
         
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->SMTPOptions = array(
               'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
               )
         );

            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'demo@roomspotter.com'; //admin mail address
            $mail->Password = 'demo';	//admin mail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            //$mail->SMTPDebug = 3;
            $mail->SetFrom('admin@romspotter.com', 'RoomSpotter Admin');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Recovery';
            $mail->Body    = $message;
            if(!$mail->send()) {
               echo "Request Cannot Send right now.";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
      //End Mail Notification. 
         }
      }

      else{
         echo "<script>alert('Invalid Email...!!'); </script>";
         echo"<script language='javascript'>location.href='forgetPass.php'; </script>";
      }
   }
   else if($userType=='provider'){
      $sql="select email,p_contact from providers where email='$email'";
      $result=mysqli_query($conn,$sql);
      
      if($row=mysqli_num_rows($result)==1)
      {
         $data=mysqli_fetch_assoc($result);
         $email=$data['email'];      
         $phone=$data['p_contact'];

         $fkey=md5(time().$phone);

         $sql2="UPDATE providers set fkey='$fkey' where email='$email'";

         if($conn->query($sql2)==TRUE){
            $sql="select * from providers where email='$email'";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            
      
            echo ("<script> alert('A confirmation mail is sent...!!');</script>");
            echo("<script>window.location='../index.php'</script>");

            //Start Mail Notification.
            require '../PHPMailer/PHPMailerAutoload.php';

            $message="Please click here to recover your password <a href='http://localhost/RoomSpotter/forgetPass/providers_verification.php?fkey=$fkey'>Recover Password</a>";
         
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->SMTPOptions = array(
               'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
               )
         );

            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shawon.roomspotter@gmail.com'; //admin mail address
            $mail->Password = 'ilovekochi';	//admin mail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            //$mail->SMTPDebug = 3;
            $mail->SetFrom('admin@romspotter.com', 'RoomSpotter Admin');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Recovery';
            $mail->Body    = $message;
            if(!$mail->send()) {
               echo "Request Cannot Send right now.";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
      //End Mail Notification. 
         }
      }

      else{
         echo "<script>alert('Invalid Email...!!'); </script>";
         echo"<script language='javascript'>location.href='forgetPass.php'; </script>";
      }
   }
}

?>