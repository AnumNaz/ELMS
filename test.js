document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("student-btn");
  var listItem = document.getElementById("student");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("teacher-btn");
  var listItem = document.getElementById("teacher");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("books-btn");
  var listItem = document.getElementById("books");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("reserve-btn");
  var listItem = document.getElementById("reserve");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("review-btn");
  var listItem = document.getElementById("review");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("author-btn");
  var listItem = document.getElementById("author");
  var buttons = document.querySelectorAll(".button");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
      buttons.forEach(function(btn) {
      btn.classList.remove("active"); // Remove active class from all buttons
    });
      button.classList.add('active');
    } else {
      listItem.style.display = "none";
      button.classList.remove('active');
    }
  });
});

var now = new Date();
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var date = now.toLocaleDateString("en-US", options);

document.getElementById("date").textContent = date;


