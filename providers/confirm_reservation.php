<?php
   session_start();
   include_once '../config.php';

   if(isset($_SESSION['providers_id']))
   {

      if(isset($_POST['submit']))
      {
         $applicants_id=$_POST['applicants_id'];
         $providers_id=$_POST['providers_id'];
         $reservation_id=$_POST['reservation_id'];

         $sql11="select email from applicants where applicants_id=".$applicants_id."";
         $result11=mysqli_query($conn,$sql11);
         $data11=mysqli_fetch_assoc($result11);
         $applicants_email=$data11['email'];

         $sql12="select * from providers where providers_id=".$providers_id."";
         $result12=mysqli_query($conn,$sql12);
         $data12=mysqli_fetch_assoc($result12);

         $p_name=$data12['fname'].' '.$data12['lname'];
         $p_email=$data12['email'];
         $p_contact=$data12['p_contact'];

        $sql="select * from applicants a,providers p,accommodation ac,reservation r, providers_accom_info pai,accom_pro_reservation apr 
        where a.applicants_id=apr.applicants_id 
        and 
        p.providers_id=apr.providers_id 
        and 
        r.reserve_id=apr.reserve_id 
        and 
        p.providers_id=pai.providers_id 
        and 
        ac.accom_id=pai.accom_id 
        and
        a.applicants_id=".$applicants_id."
        and
        p.providers_id=".$providers_id."
        and
        r.reserve_id=".$reservation_id."
        ";

        
         $result=mysqli_query($conn,$sql);
         $data=mysqli_fetch_assoc($result);


         $sql1="UPDATE reservation SET reserve_status='0' where reserve_id=".$data['reserve_id']."";
         $sql2="UPDATE accommodation SET available_space=available_space-1 where accom_id=".$data['accom_id']."";

         if (($conn->query($sql1)==TRUE) && ($conn->query($sql2)==TRUE)) {
            
               //Start Mail Notification.
            require '../PHPMailer/PHPMailerAutoload.php';

            $message="Your reservation is confirmed.<br>Providers info <br> Name: $p_name <br> Email: $p_email <br> Contact No. : $p_contact";
         
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
            $mail->addAddress($applicants_email);
            $mail->isHTML(true);
            $mail->Subject = 'Reservation Confirmation';
            $mail->Body    = $message;
            if(!$mail->send()) {
               echo "Request Cannot Send right now.";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
            //End Mail Notification.

            
            echo ("<script> alert('Reservation Confirmed');</script>");
            echo("<script>window.location='provider_homepage.php'</script>");


         } 
         else {
            echo "Error: " . $sql . "<br>" . $conn->error;
           }
      }
   }
?>