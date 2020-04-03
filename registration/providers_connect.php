<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $p_contact=$_POST['pNumber'];
   $bcn=$_POST['bcn'];
   $pass=md5($_POST['pass']);
   $c_pass=md5($_POST['c_pass']);
   $gender=$_POST['gender'];
   $versity_name=$_POST['uni_name'];
   $hall=$_POST['hall'];
   $address=$_POST['address'];
   $vkey=md5(time().$fname);
   $department=$_POST['department'];


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
      $query="select * from providers where email='$email'";
      $query_check=mysqli_query($conn,$query);

      if($query_check){
         if(mysqli_num_rows($query_check)>0)
         {
            echo("<script>alert('The Email is already Registered..!!');</script>");
            echo("<script>window.location='providers_registration.php'</script>");
         }
      
         else{

            $sql="select count(*) as last_provider from providers";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            $providers_id=$data['last_provider']+1;
            

            $providers_sql="INSERT INTO providers (providers_id,fname,lname,email,p_contact,bcn,department,pass,c_pass,gender,img_dest,vkey,verified) VALUES('$providers_id','$fname','$lname','$email','$p_contact','$bcn','$department','$pass','$c_pass','$gender','$dest','$vkey','0')";

            $sql1="select count(*) as last_versity from versity";
            $result1=mysqli_query($conn,$sql1);
            $data1=mysqli_fetch_assoc($result1);
            $versity_id=$data1['last_versity']+1;

            $versity_sql="INSERT INTO versity (versity_id,versity_name,hall_name,loc) VALUES('$versity_id','$versity_name','$hall','$address')";

            $providers_info_sql="INSERT INTO providers_info (providers_id,versity_id) VALUES('$providers_id','$versity_id')";

            $sql2="select count(*) as last_provider from providers";
            $result2=mysqli_query($conn,$sql2);
            $data2=mysqli_fetch_assoc($result2);
            $accom_id=$data2['last_provider']+1;

            $accom_info_sql="INSERT INTO accommodation (accom_id,room_no,available_space) VALUES ('$accom_id','0','0')";

            $providers_accom_info="INSERT INTO providers_accom_info(providers_id,accom_id) VALUES ('$providers_id','$accom_id')";



            if (($conn->query($providers_sql)==TRUE) && ($conn->query($versity_sql)==TRUE) && ($conn->query($providers_info_sql)==TRUE) && ($conn->query($accom_info_sql)==TRUE) && ($conn->query($providers_accom_info)==TRUE)) {
               echo ("<script> alert('A confirmation mail is sent...!!');</script>");
               echo("<script>window.location='../index.php'</script>");

               //Start Mail Notification.
            require '../PHPMailer/PHPMailerAutoload.php';

            $message="Please click here to confirm your mail <a href='http://localhost/RoomSpotter/registration/verify_providers.php?vkey=$vkey'>Confirm your mail</a>";
         
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
      echo("<script>window.location='providers_registration.php'</script>");
   }
   
}

else{
   echo"not submitted";
}

?>