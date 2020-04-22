function myFunction() {
    document.getElementById("monPanier").classList.toggle("show");
  }
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('myBtn').addEventListener("click", function() {myFunction();});
  });