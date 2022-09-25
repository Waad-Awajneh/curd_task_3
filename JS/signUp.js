let btn = document.getElementById("Register");

btn.addEventListener("click", function (e) {
  e.preventDefault();

  let email = document.getElementById("email").value;
  let fullName = document.getElementById("fullName").value;
  let password = document.getElementById("password").value;
  let cPassword = document.getElementById("cPassword").value;
  let mobile = document.getElementById("mobile").value;
  let birthday = document.getElementById("birthday").value;

  // check if email valid
  const emailValid = Validation.EmailValidation(email);
  // check if user name valid
  const usernameValid = Validation.NameValidation(fullName);
  // check if password match
  const matchPassword = Validation.PasswordValidation(password, cPassword);
  const mobileValidation = Validation.mobileValidation(mobile);
  const dateValidation = Validation.calculateRemainTime(birthday);
// console.log( usernameValid , mobileValidation,dateValidation, emailValid , matchPassword  );
    if(emailValid &&usernameValid && matchPassword && mobileValidation &&dateValidation){

  fetch("http://localhost/curd_task_3/PHP/signup.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `email=${email}&password=${password}&fullName=${fullName}&mobile=${mobile}&birthday=${birthday}`,
  })
    .then((waad) => waad.text())
    .then((res) => {console.log(res);
      if (res == "true") {
        window.location.href = "./PHP/wlc.php?name=" + fullName;
      } else {
        alert("It looks like you’re connected try login. Please ");
        window.location.href = "./login.html";
      }
    });}else alert("error")
});

class Validation {
  static EmailValidation(email) {
  
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      return true;
    }
    alert("inValid email ");
    return false;
  }

  static NameValidation(name) {
    let strname = name.split(" ");
    // console.log(strname);
    if (/^[a-zA-Z\s]*$/.test(name) && name != "" && strname.length > 3) {
      return true;
    }
    alert("inValid name ");
    return false;
  }
  //"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
  static PasswordValidation(password, confirmPassword) {
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    if (strongRegex.test(password)) {
      return true && Validation.MatchPassword(password, confirmPassword) ;
    }
    alert("inValid password ");
    return false;
  }

  static MatchPassword(password, confirmPassword) {
    if (
      password == confirmPassword &&
      password != "" &&
      confirmPassword != ""
    ) {
      return true;
    }

    return false;
  }

  static mobileValidation(mobile) {
    if (/^\+?\d{3}[- ]?\d{3}[- ]?\d{6}$/.test(mobile)) {
      return true;
    }
    alert("inValid mobile number ");

    return false;
  }

  static calculateRemainTime(dateAsString) {
    let date1 = new Date();
    let date2 = new Date(dateAsString);
    let time = date1.getTime() - date2.getTime();
    let days = time / (1000 * 3600 * 24);
    if( Math.floor(Math.abs(days)) > 5840)return true;
    else{
      alert("inValid Age ");
      return false;

    }
  }
}
