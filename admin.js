// Close the dropdown menu if the user clicks outside of it
// window.onclick = function (event) {
  if (!event.target.matches(".dropbtn")) {
    // var dropdowns = document.getElementsByClassName("dropdown-content");
    // for (var i = 0; i < dropdowns.length; i++) {
      // var openDropdown = dropdowns[i];
      // if (openDropdown.style.display === "block") {
        // openDropdown.style.display = "none";
      }
    // }
  // }
// };


//  start

document.addEventListener("DOMContentLoaded", function() {
  var button = document.getElementById("student-btn");
  var listItem = document.getElementById("student");

  button.addEventListener("click", function() {
    if (listItem.style.display === "none") {
      listItem.style.display = "block";
    } else {
      listItem.style.display = "none";
    }
  });
});


