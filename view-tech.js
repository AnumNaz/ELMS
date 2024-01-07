function searchTable() {
    // Get the search input element, table element, and table rows
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("studentTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through each table row
    for (i = 0; i < tr.length; i++) {
      // Get the text content of the row
      txtValue = tr[i].textContent || tr[i].innerText;
      // Check if the row text contains the search filter
      // Set the row's display style based on the result
      if (txtValue.toUpperCase().includes(filter)) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
        
    }
  }
  
  function redirectToUpdatePage() {
      // Redirect to the update page
      window.location.href = "updt-teach.html";
    }

    function deleteRow(row) {
      var i = row.parentNode.parentNode.rowIndex;
      document.getElementById("studentTable").deleteRow(i);
  }

  function approveRequest(button) {
    var row = button.parentNode.parentNode;
    var authorName = row.cells[0].innerHTML;
    var prompt = document.getElementById("prompt");
    prompt.innerHTML = "Author <strong>" + authorName + "</strong> has been approved.";
    prompt.style.display = "block";
    setTimeout(function() {
        prompt.style.display = "none";
        row.parentNode.removeChild(row);
    }, 500);
}

function deleteRequest(button) {
    var row = button.parentNode.parentNode;
    var authorName = row.cells[0].innerHTML;
    var prompt = document.getElementById("prompt");
    prompt.innerHTML = "Author <strong>" + authorName + "</strong> has been deleted.";
    prompt.style.display = "block";
    setTimeout(function() {
        prompt.style.display = "none";
        row.parentNode.removeChild(row);
    }, 500);
}