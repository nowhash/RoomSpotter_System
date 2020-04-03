<script src="applicantsFormValidate.js"></script>

<form action="applicants_connect.php" method="POST" enctype="multipart/form-data" name="applicantsForm"
   onsubmit="return validateForm()">
   <table border="0">
      <tr>
         <td>First Name:</td>
         <td><input type="text" id="fname" placeholder="Enter your Full Name" name="fname" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="fnameErr"></span>
         </td>
      </tr>

      <tr>
         <td>Last Name:</td>
         <td><input type="text" id="lname" placeholder="Enter your Last Name" name="lname" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="lnameErr"></span>
         </td>
      </tr>

      <tr>
         <td>Email:</td>
         <td><input type="text" placeholder="Enter your Email" name="email" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="emailErr"></span>
         </td>
      </tr>

      <tr>
         <td>Personal Contact No.</td>
         <td><input type="text" placeholder="Enter your personal mobile no." name="pNumber" required>
         </td>

         <td>
            <span style="font-size:15px; color:red;" id="pNumErr"></span>
         </td>
      </tr>

      <tr>
         <td>Emergency Contact No.</td>
         <td><input type="text" placeholder="Enter emergency mobile no." name="eNumber" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="eNumErr"></span>
         </td>
      </tr>

      <tr>
         <td>Birth Certificate No.</td>
         <td><input type="text" placeholder="Enter your Birth Certificate No." name="bcn" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="bcnErr"></span>
         </td>
      </tr>

      <tr>
         <td>SSC Registration No.</td>
         <td><input type="text" placeholder="Enter your SSC Registration No. " name="sscReg" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="sscRegErr"></span>
         </td>
      </tr>

      <tr>
         <td>HSC Registration No. </td>
         <td><input type="text" placeholder="Enter your HSC Registration No. " name="hscReg" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="hscRegErr"></span>
         </td>
      </tr>

      <tr>
         <td>Password:</td>
         <td><input type="password" id="pass" placeholder="Enter your password" name="pass" required></td>

         <td>
            <span style="font-size:15px; color:red;" id="passErr"></span>
         </td>
      </tr>

      <tr>
         <td>Confirm Password:</td>
         <td><input type="password" placeholder="Confirm your password" name="c_pass" required></td>
      </tr>

      <tr>
         <td style="padding-top:10px; padding-bottom:10px;">Upload Profile Picture: </td>
         <td><input type="file" name="img"></td>
      </tr>

      <tr>
         <td> Gender: </td>
         <td>
            <select name="gender" style="padding:6px; font-size:0.8em;">
               <option value="male" selected>Male</option>
               <option value="female">Female</option>
            </select>
         </td>
      </tr>
   </table>
   <!--End Table-->

   <center>
      <p>By creating an account you agree to our <a href="../terms_conditions/terms_conditions.php">Terms & Privacy</a>.</p>
      <button type="submit" name="submit" class="registerbtn">Sign Up</button>
      <p>Already have an account? <a href="../login/login.php">Sign in</a>.</p>
   </center>
</form>