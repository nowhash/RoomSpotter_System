function printError(elemId, hintMsg) {
   document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {
   var name = document.contact.author.value;
   var email = document.contact.email.value;
   var number = document.contact.phone.value;


   var nameErr = emailErr = numErr = true;

   if (name == "") {
      printError("nameErr", "Please enter your name.");
   } else {
      var regex = /^[a-zA-Z\s]+$/;
      if (regex.test(name) == false) {
         printError("nameErr", "**Please enter a valid name.");
      } else {
         printError("nameErr", "");
         nameErr = false;
      }
   }

   if (email == "") {
      printError("emailErr", "Please enter your email address.");
   } else {
      var regex = /^\S+@\S+\.\S+$/;
      if (regex.test(email) == false) {
         printError("emailErr", "**Please enter a valid Email Address.");
      } else {
         printError("emailErr", "");
         emailErr = false;
      }
   }


   if (number == "") {
      printError("numErr", "Please enter your mobile number");
   } else {
      var regex = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/
      if (regex.test(number) == false) {
         printError("numErr", "**Please enter a valid Mobile No.");
      } else {
         printError("numErr", "");
         numErr = false;
      }
   }

   if ((nameErr || emailErr || numErr ) == true) {
      return false;
   } else {
      return true;
   }
};