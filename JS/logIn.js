let btn = document.getElementById("logInBtn");

btn.addEventListener("click", function (e) {
  e.preventDefault();

  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  fetch("http://localhost/curd_task_3/PHP/logIn.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `email=${email}&password=${password}`,
  })
    .then((waad) => waad.text())
    .then((res) => {
      let str = res.split("/");
      //console.log(res);
      if (str[0] == "true") {
        if (str[2] == "admin")
 window.location.href = "./PHP/admin.php?name=" + str[1];
        else window.location.href = "./PHP/wlc.php?name=" + str[1];
      } else {
        alert("check your password and email .Please ");
      }
    });
});
