function printError(elemId, hintMsg) {
   document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {
   var fname = document.applicantsForm.fname.value;
   var lname = document.applicantsForm.lname.value;
   var email = document.applicantsForm.email.value;
   var pNumber = document.applicantsForm.pNumber.value;
   var eNumber = document.applicantsForm.eNumber.value;
   var bcn = document.applicantsForm.bcn.value;
   var sscReg = document.applicantsForm.sscReg.value;
   var hscReg = document.applicantsForm.hscReg.value;
   var pass = document.getElementById("pass").value;

   var fnameErr = lnameErr = pNumErr = emailErr = eNumErr = bcnErr = sscRegErr = hscRegErr = passErr = true;

   if (fname == "") {
      printError("fnameErr", "Please enter your first name");
   } else {
      var regex = /^[a-zA-Z\s]+$/;
      if (regex.test(fname) == false) {
         printError("fnameErr", "**Please enter a valid name");
      } else {
         printError("fnameErr", "");
         fnameErr = false;
      }
   }

   if (lname == "") {
      printError("lnameErr", "Please enter your last name");
   } else {
      var regex = /^[a-zA-Z\s]+$/;
      if (regex.test(lname) == false) {
         printError("lnameErr", "**Please enter a valid name");
      } else {
         printError("lnameErr", "");
         lnameErr = false;
      }
   }

   if (email == "") {
      printError("emailErr", "Please enter your email address");
   } else {
      var regex = /^\S+@\S+\.\S+$/;
      if (regex.test(email) == false) {
         printError("emailErr", "**Please enter a valid email address");
      } else {
         printError("emailErr", "");
         emailErr = false;
      }
   }


   if (pNumber == "") {
      printError("pNumErr", "Please enter mobile number");
   } else {
      var regex = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/;
      if (regex.test(pNumber) == false) {
         printError("pNumErr", "**Please enter a valid number");
      } else {
         printError("pNumErr", "");
         pNumErr = false;
      }
   }


   if (eNumber == "") {
      printError("eNumErr", "Please enter mobile number");
   } else {
      var regex = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/;
      if (regex.test(eNumber) == false) {
         printError("eNumErr", "**Please enter a valid number");
      } else {
         printError("eNumErr", "");
         eNumErr = false;
      }
   }

   if (bcn == "") {
      printError("bcnErr", "Please enter your Birth ID");
   } else {
      var regex = /^[0-9]+$/;
      if (regex.test(bcn) == false) {
         printError("bcnErr", "**Please enter a valid ID");
      } else {
         printError("bcnErr", "");
         bcnErr = false;
      }
   }


   if (sscReg == "") {
      printError("sscRegErr", "Please enter your Reg ID");
   } else {
      var regex = /^[0-9]+$/;
      if (regex.test(sscReg) == false) {
         printError("sscRegErr", "**Please enter a valid ID");
      } else {
         printError("sscRegErr", "");
         sscRegErr = false;
      }
   }

   if (hscReg == "") {
      printError("hscRegErr", "Please enter your Reg ID");
   } else {
      var regex = /^[0-9]+$/;
      if (regex.test(hscReg) == false) {
         printError("hscRegErr", "**Please enter a valid ID");
      } else {
         printError("hscRegErr", "");
         hscRegErr = false;
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
         "**Password must be 8 bit long and contain at least uppercase,lowercase,special character and digit");
   }

   if ((fnameErr || lnameErr || emailErr || pNumErr || eNumErr || bcnErr || sscRegErr || hscRegErr || passErr) ==
      true) {
      return false;
   } else {
      return true;
   }
};