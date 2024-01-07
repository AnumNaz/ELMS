function updateTime() {
  var now = new Date();
  var time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  var date = now.toLocaleDateString();

  document.getElementById("time").textContent = time;
  document.getElementById("date").textContent = date;
}

setInterval(updateTime, 1000);
