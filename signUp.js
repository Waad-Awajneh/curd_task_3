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


  //   if(emailValid &&usernameValid && matchPassword && mobileValidation &&dateValidation){


  fetch("http://localhost/curd_task_3/signup.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `email=${email}&password=${password}&fullName=${fullName}&mobile=${mobile}&birthday=${birthday}`,
  })
    .then((waad) => waad.text())
    .then((res) => console.log(res)); //document.getElementById("result").innerHTML = res)

  //   }
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
    console.log(strname);
    if (/^[a-zA-Z\s]*$/.test(name) && name != "" && strname.length > 3) {
      return true;
    }


     return (false)
  }
  //"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
  static PasswordValidation(password, confirmPassword) {
    if (/"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
      return true && MatchPassword(password, confirmPassword);
    }

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
    if (/^(\+\d{1,3}[- ]?)?\d{14}$/.test(mobile)) {
      return true;
    }

    return false;
  }
  
  static calculateRemainTime(dateAsString) {
    let date1 = new Date();
    let date2 = new Date(dateAsString);
    let time = date1.getTime() - date2.getTime();
    let days = time / (1000 * 3600 * 24);
    return Math.floor(Math.abs(days)) > 5840;
  }
}
