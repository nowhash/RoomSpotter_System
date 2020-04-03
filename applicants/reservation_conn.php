<?php 
session_start();

if(isset($_SESSION['applicants_id']))
{

   include_once '../config.php';

   if(isset($_POST['submit']))
      {
         $applicants_id=$_POST['applicants_id'];
         $providers_id=$_POST['providers_id'];
         $check_in=$_POST['checkIn'];
         $check_out=$_POST['checkOut'];

         
         $sql="select * from accommodation a,providers p,providers_accom_info pai where a.accom_id=pai.accom_id and p.providers_id=pai.providers_id and p.providers_id=".$providers_id." ";

         $result=mysqli_query($conn,$sql);
         $data=mysqli_fetch_assoc($result);
         $providers_mail=$data['email'];
         
        if($data['available_space']>0)
         {
         //Start Mail Notification.
         require '../PHPMailer/PHPMailerAutoload.php';
         $message="A reservation request is pending now. Please login to accept.<br> Login: <a href='http://localhost/RoomSpotter/login/login.php'>Login</a>";
      
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
         $mail->addAddress($providers_mail);
         $mail->isHTML(true);
         $mail->Subject = 'Reservation Approval';
         $mail->Body    = $message;
         if(!$mail->send()) {
            echo "Request Cannot Send right now.";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
         }
         //End Mail Notification.


         $sql1="select count(*) as last_reservation from reservation";
         $result1=mysqli_query($conn,$sql1);
         $data1=mysqli_fetch_assoc($result1);
         $reservation_id=$data1['last_reservation']+1;

         $reservation_sql="INSERT INTO reservation (reserve_id,check_in,check_out,reserve_status) VALUES ('$reservation_id','$check_in','$check_out','1')";

         $accom_pro_reservation="INSERT INTO accom_pro_reservation(reserve_id,providers_id,applicants_id) VALUES('$reservation_id','$providers_id','$applicants_id')";

         if(($conn->query($reservation_sql)==TRUE) && ($conn->query($accom_pro_reservation)==TRUE))
         {
            echo ("<script> alert('Your Request send Successfully...!!')</script>");
            echo("<script>window.location='applicant_homepage.php'</script>");
         }

         else{
            echo ("<script> alert('Please try again later..!); </script");
         }

         }
         else{
            echo ("<script> alert('No Avalable Space');</script>");
            echo("<script>window.location='available_accommodation.php'</script>");
         }
      }

   else
      {
         echo("<script>alert('Some error occurred. Please try again..!!');</script>");
         echo("<script>window.location='available_accommodation.php'</script>");
      }


 }
   else
      {
         header("Location:../index.php");
      } 
?>