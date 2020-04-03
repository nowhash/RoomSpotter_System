<script src="providersValidate.js"></script>

<form action="providers_connect.php" method="POST" enctype="multipart/form-data" name="providersForm"
   onsubmit="return validateForm()">
   <table border="0">
      <tr>
         <td>First Name:</td>
         <td><input type="text" placeholder="Enter your First Name" name="fname" required>

         <span style="font-size:15px; color:red; display: inline-block;" id="fnameErr"></span>
         </td>
      </tr>

      <tr>
         <td>Last Name:</td>
         <td><input type="text" placeholder="Enter your Last Name" name="lname" required>
         
         <span style="font-size:15px; color:red; display: inline-block;" id="lnameErr"></span>
         </td>
      </tr>

      <tr>
         <td>Email:</td>
         <td><input type="text" placeholder="Enter your Email" name="email" required>

         <span style="font-size:15px; color:red; display: inline-block;" id="emailErr"></span>
         </td>
      </tr>

      <tr>
         <td>Personal Contact No.</td>
         <td><input type="text" placeholder="Enter your personal mobile no." name="pNumber" required>

         
         <span style="font-size:15px; color:red; display: inline-block;" id="pNumErr"></span>
         </td>
      </tr>

      <tr>
         <td>Birth Certificate No.</td>
         <td><input type="text" placeholder="Enter your Birth Certificate No." name="bcn" required>
         
         <span style="font-size:15px; color:red; display: inline-block;" id="bcnErr"></span>
         </td>
      </tr>

      <tr>
         <td>University Name: </td>
         <td>
            <select name="uni_name" style="width: 300px; padding:10px; font-size:0.8em;">
               <option value="International Islamic University Chittagong" selected>International Islamic University Chittagong</option>
               <option value="University of Chittagong">University of Chittagong</option>
            </select>
         </td>
      </tr>

      <tr>
         <td>Department:</td>
         <td><input type="text" placeholder="Enter your department Name" name="department" required>
         </td>
      </tr>

      <tr>
         <td>Hall Name:</td>
         <td><input type="text" placeholder="Enter your hall Name" name="hall" required>
         </td>
      </tr>


      <tr>
         <td>Address:</td>
         <td><input type="text" placeholder="Enter your address" name="address" required>
         </td>
      </tr>

      <tr>
         <td>Password:</td>
         <td><input type="password" id="pass" placeholder="Enter your password" name="pass" required>
         
         <span style="font-size:15px; color:red; display: inline-block;" id="passErr"></span>
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
            <select name="gender" style="padding:10px; font-size:0.8em;">
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