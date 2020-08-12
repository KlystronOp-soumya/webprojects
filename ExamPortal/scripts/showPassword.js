function myFunction() {
    var x = document.getElementById("pasd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }