<?php
session_start();
require_once '../include/head.php';
if(isset($_SESSION['admin_id']))
{
?>

<html>
<body>
   <div class="wrapper">
      <!--Start Nav_Banner Area-->
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
      <!--End Nav_Banner Area-->

      <div class="body-content">
         <div class="user-homepage-btn">

            <button class="user-homepage" onclick="location.href='../news/news_post.php';"></i>&nbsp;Publish News</button>

            <button class="user-homepage" onclick="location.href='../faq/faq_post.php';">&nbsp;Publish FAQ</button>
         </div>

          <center>
            <form action="faq_conn.php" method="post">
                  <font size="4px">Question:</font><br>
                  <input type="text" name="question" size="50" style="height: 60px; width:380px" required /><br>


                  <font size="4px">Solution:</font><br>
                  <textarea name="solution" rows="10" cols="50" required></textarea><br><br>
                  <input type="submit" name="submit" value="Submit" style="height:60; width:150; font-size:20px;">
            </form>
      </center>
      <br><br>
        
         <!--Start Footer Part-->
         <?php include_once '../include/footer.php' ?>
         <!--End Footer Part-->
      </div>
</body>

</html>

<?php }
      else{
         header("Location:../index.php");
      } ?>