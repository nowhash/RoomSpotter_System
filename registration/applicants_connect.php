<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $p_contact=$_POST['pNumber'];
   $e_contact=$_POST['eNumber'];
   $bcn=$_POST['bcn'];
   $ssc_reg=$_POST['sscReg'];
   $hsc_reg=$_POST['hscReg'];
   $pass=md5($_POST['pass']);
   $c_pass=md5($_POST['c_pass']);
   $gender=$_POST['gender'];
   $vkey=md5(time().$fname);

   
   //File Uploading
   $img_name=uniqid().str_replace(" ","_",$_FILES['img']['name']);
   $destination="../upload/".$img_name;
   $temp_name=$_FILES['img']['tmp_name'];
   move_uploaded_file($temp_name,$destination);

   $supported_image=array('jpg','jpeg','png');
   $extension=strtolower(pathinfo($img_name,PATHINFO_EXTENSION));

   if(in_array($extension,$supported_image)){
      $dest=$destination;
   }
   else{
      $dest="../upload/profile_thumbnail.png";
   }

   if($pass==$c_pass)
   {
      $query="select * from applicants where email='$email'";
      $query_check=mysqli_query($conn,$query);

      if($query_check){
         if(mysqli_num_rows($query_check)>0)
         {
            echo("<script>alert('The Email is already Registered..!!');</script>");
            echo("<script>window.location='applicants_registration.php'</script>");
         }
      
         else{
            $_SESSION["login"]="Successful";

            $sql1="select count(*) as last_applicant from applicants";
            $result1=mysqli_query($conn,$sql1);
            $data1=mysqli_fetch_assoc($result1);
            $applicants_id=$data1['last_applicant']+1;


            $sql="INSERT INTO applicants (applicants_id,fname,lname,email,p_contact,e_contact,bcn,ssc_reg,hsc_reg,pass,c_pass,gender,img_dest,vkey,verified) VALUES('$applicants_id','$fname','$lname','$email','$p_contact','$e_contact','$bcn','$ssc_reg','$hsc_reg','$pass','$c_pass','$gender','$dest','$vkey','0')";


            if ($conn->query($sql)==TRUE) {
               echo ("<script> alert('A confirmation mail is sent...!!');</script>");
               echo("<script>window.location='../index.php'</script>");

               //Start Mail Notification.
            require '../PHPMailer/PHPMailerAutoload.php';

            $message="Please click here to confirm your mail <a href='http://localhost/RoomSpotter/registration/verify_applicants.php?vkey=$vkey'>Confirm your mail</a>";
         
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
            $mail->Subject = 'Email Verification...!!';
            $mail->Body    = $message;
            if(!$mail->send()) {
               echo "Request Cannot Send right now.";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
            //End Mail Notification.

            } 
            else {
               echo "Error: " . $sql . "<br>" . $conn->error;
              }
         }
      }
   }

   else
   {
      echo("<script>alert('Password is not matched..!!');</script>");
      echo("<script>window.location='applicants_registration.php'</script>");
   }
   
}

?>