function printError(elemId, hintMsg) {
   document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm() {
   var fname = document.providersForm.fname.value;
   var lname = document.providersForm.lname.value;
   var email = document.providersForm.email.value;
   var pNumber = document.providersForm.pNumber.value;
   var bcn = document.providersForm.bcn.value;
   var pass = document.providersForm.pass.value;
   
   var fnameErr=lnameErr=emailErr=pNumErr=bcnErr=passErr=true;

   if (fname == "") {
      printError("fnameErr", "Please enter your first name.");
   } else {
      var regex = /^[a-zA-Z\s]+$/;
      if (regex.test(fname) == false) {
         printError("fnameErr", "**Please enter a valid name.");
      } else {
         printError("fnameErr", "");
         fnameErr = false;
      }
   }

   if (lname == "") {
      printError("lnameErr", "Please enter your first name.");
   } else {
      var regex = /^[a-zA-Z\s]+$/;
      if (regex.test(lname) == false) {
         printError("lnameErr", "**Please enter a valid name.");
      } else {
         printError("lnameErr", "");
         lnameErr = false;
      }
   }

   if (email == "") {
      printError("emailErr", "Please enter your Email Address.");
   } else {
      var regex = /^\S+@\S+\.\S+$/;
      if (regex.test(email) == false) {
         printError("emailErr", "**Please enter a valid Email Address.");
      } else {
         printError("emailErr", "");
         emailErr = false;
      }
   }

   if (pNumber == "") {
      printError("pNumErr", "Please enter your mobile number");
   } else {
      var regex = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/;
      if (regex.test(pNumber) == false) {
         printError("pNumErr", "**Please enter a valid Mobile No.");
      } else {
         printError("pNumErr", "");
         pNumErr = false;
      }
   }

   if (bcn == "") {
      printError("bcnErr", "Please enter your Birth ID.");
   } else {
      var regex = /^[0-9]+$/;
      if (regex.test(bcn) == false) {
         printError("bcnErr", "**Please enter a valid Birth ID.");
      } else {
         printError("bcnErr", "");
         bcnErr = false;
      }
   }


   if (pass.match(/[a-z]/g) && pass.match(
         /[A-Z]/g) && pass.match(
         /[0-9]/g) && pass.match(
         /[^a-zA-Z\d]/g) && pass.length >= 8) {
      passErr = false;
   } else {
      passErr = true;
      printError("passErr",
         "**Password must be 8 bit long.");
   }

   if(fnameErr==true || lnameErr==true || emailErr==true ||pNumErr==true ||bcnErr==true || passErr==true)
      return false;
   else 
      return true;
};