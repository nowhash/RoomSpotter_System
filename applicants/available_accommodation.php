<?php 
   session_start(); 
   include '../include/head.php';
   include_once '../config.php';

   if(isset($_SESSION['applicants_id']))
   {
?>

<html>

<head>
<style>
      table {
         width: 800px;
         margin: 20px auto;
         table-layout: auto;
         border-collapse: collapse;
         box-shadow: 2px 2px 2px 2px #AE9F9C;
      }
      th,
      td {
         padding: 10px;
         border: solid 1px #D6C8C5;
         background-color: #f5f5f5;
      }
   </style>
</head>
<!--End Head Content-->

<body>
   <div class="wrapper">
      <!--Start Banner_Nav Area-->
      <?php  
         if(isset($_SESSION['applicants_id']))
         {
            include '../include/applicants_banner_nav.php';
         }
         else if(isset($_SESSION['providers_id'])){
            include '../include/providers_banner_nav.php';
         }
         else{
            include'../include/banner_nav.php';
         }
      ?>
      <!--End Banner-Nav Area-->

      <div class="body-content">
         <div class="user-homepage-btn">
            <button class="user-homepage" onclick="location.href='applicant_homepage.php';">
            <i class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage active" onclick="location.href='available_accommodation.php';">
            <i class="fas fa-home"></i>&nbsp;Available Accommodation</button>
         </div>

         <center>
            <div class="heading4" style="margin-top:20px; width:770px;">Available Accommodation</div></center>
         <center>
         <div class="select_uni_menu">
            <form action='#' method ='POST'>
               <select name="versity" id="versity" class="uni_name_select_menu" style="width:300px;">
               <option>Select Category</option>
               <option value ='International Islamic University Chittagong'>International Islamic University Chittagong</option>
               <option value ='University of Chittagong'>University of Chittagong</option>
               </select>
               <input class="btn-style" type='submit' value='Search' style="margin-left:5px; padding:5px; font-size:1.3em;">
            </form>
         </div>
         <br/>
         </center>

         <?php
         if(isset($_POST['versity'])):
            $sql="select * from providers p, providers_info pi, versity v where p.providers_id = pi.providers_id  && pi.versity_id=v.versity_id and versity_name='".$_POST['versity']."'";
            $result=mysqli_query($conn, $sql);

         else:
            $sql="select * from providers p, providers_info pi, versity v where p.providers_id = pi.providers_id  && pi.versity_id=v.versity_id";
            $result=mysqli_query($conn,$sql);
         endif;
         
         while($data=mysqli_fetch_assoc($result))
            { 

               $sql1="select * from accommodation a, providers_accom_info pai where pai.providers_id =".$data['providers_id']." && pai.accom_id=a.accom_id";
               $result1=mysqli_query($conn,$sql1);
               $data1=mysqli_fetch_assoc($result1);
               

               $name=$data['fname'].' '.$data['lname'];
               $email=$data['email'];
               $versity=$data['versity_name'];
               $available_space=$data1['available_space'];
               $img_dest=$data['img_dest'];
               $applicants_id=$_SESSION['applicants_id'];
               $providers_id=$data['providers_id']; 

               echo ("
                  <table border='0'>
                  <tr style='align:center;'>	
                  
                  <td valign='top'>
                  <img width='93' height='95' BORDER='0' src='$img_dest'/>
                  <br/><br/>
                  </td>

                  <td  width='900px' >

                  <font style='font: 1.1em Trebuchet MS,Arial,Helvetica,sans-serif; color: #2B272A;'><b>Name:</b>&nbsp;$name</font><br/>

                  <font style='font: 1.1em Trebuchet MS,Arial,Helvetica,sans-serif; color: #2B272A;'><b>Email:</b>&nbsp;$email</font><br/>

                  <font style='font: 1.1em Trebuchet MS,Arial,Helvetica,sans-serif; color: #2B272A;'><b>University:</b>&nbsp;$versity</font><br/>

                  <font style='font: 1.1em Trebuchet MS,Arial,Helvetica,sans-serif; color: #2B272A;'><b>Available Space:</b>&nbsp;$available_space</font><br/>
                  </td>

                  <td style='align:center;'>
                  <form action='reservation_request.php' method='post'>
                     <input type='hidden' name='applicants_id' value='$applicants_id'/>

                     <input type='hidden' name='providers_id' value='$providers_id'/>

                     <input  style=' text-decoration: none; color: #414A49; width: 120px; height: 50px;
                     line-height: 50px; border-radius: 5px; text-align: center; vertical-align: middle; overflow: hidden; font-weight: bold; background-image: -webkit-linear-gradient(#EBFAF8 0%, #ffaaaa 100%); background-image: linear-gradient(#EBFAF8 0%, #A5C6DA 100%); text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
                     box-shadow: 0 1px 1px rgba(0, 0, 0, 0.28); font-size:1.02em;' type='submit' name='submit' value='Reserve'>
                  </form>
                  <br/><br/>
                  </td>
                  </table>
         ");
            }
         ?>
      </div>


      <!--Start Footer Part-->
      <?php include '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>

</html>

<?php }
      else{
         header("Location:../index.php");
      } ?>