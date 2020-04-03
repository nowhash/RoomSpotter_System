<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css" />
   <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   <div class="wrapper">
      <!--Start Heading Part-->
      <div class="header-part">
         <img src="assets/logo.svg" height="100" width="100" style="padding-left: 10px;" />&nbsp;<font
            style="font-family: 'Righteous', cursive; font-size: 3em;">Room Spotter</font><br>
         <hr class="headerLine">
         <!--Start Navigation Bar-->
         <div class="navigation-bar">
            <ul>
               <li><a href="index.php">Home</a></a></li>
               <li class="dropdown">
                  <a class="dropbtn" href="#">University</a>
                  <div class="dropdown-content">
                     <a href="university/iiuc.php">International Islamic University Chittagong(IIUC)</a>
                  </div>
               </li>
               <li><a href="news/news.php">Admission Circular</a></a></li>
               <li><a href="about/about.php">About</a></a></li>
               <li><a href="service/service.php">Services</a></a></li>
               <li><a href="faq/faq.php">FAQ</a></a></li>
               <li><a href="contact/contact.php">Contact Us</a></a></li>
            </ul>
         </div>
      </div>

      <!--End Heading Part-->

      <div class="body-content">
         <table border="0" style="border: collapse;">
            <tr>
               <td>
                  <div
                     style="color: rgb(28, 105, 116); padding-top: 20; padding-left: 60px; font-family: 'Ma Shan Zheng', cursive; font-size: 20px;">
                     Room Spotter helps to connect you with people<br>&
                     share or rent room...!!<br>
                  </div>

                  <img src="assets/map.png" width="90%">

               </td>

               <td>
                  <!--Start Login Area-->
                  <div style="padding-right: 30px;">
                     <div class="login-title">Login</div>

                     <form action="login/login_conn.php" method="POST">
                        <label for="email"><b>Email:</b></label><br>
                        <input type="text" placeholder="Enter Your Email.." name="email" />

                        <br>

                        <label for="password"><b>Password</b></label><br>
                        <input type="password" placeholder="Enter Your Password.." name="pass" />

                        <br>

                        <label for="userType"><b>User Type:</b></label>
                        <br>
                        <div class="userType">
                        <select name="userType" style="padding:8px; width:300px; font-size:0.9em;">
                              <option value="applicant" selected>Applicant</option>
                              <option value="provider">Provider</option>
                           </select>
                        </div>
                        <button type="Submit" name="submit">Login</button>
                     </form>
                     <a href="forgetPass/forgetPass.php">Forget Password?</a>
                     <br>
                     Not registered? <a href="registration/applicants_registration.php">Create an account</a>
                  </div>
      </div>
      </td>
      </tr>
      </table>
   </div>
   <!--Start Footer Area-->
   <div class="footer">
      <b>Copyright @ Room Spotter </b><br>
      An accommodation crisis resolving system for the applicant during admission test.
   </div>
   </div>
</body>

</html>