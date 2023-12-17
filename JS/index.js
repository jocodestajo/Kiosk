// INDEX.JS
`use strict`
var datetime = new Date();
console.log(datetime);
document.getElementById("time").textContent = datetime; //it will print on html page


`use strict`
var datetime = new Date().getMonth() + 1;
console.log(datetime); // it will represent date in the console of  developers tool
document.getElementById("time").textContent = datetime; // represent on html page

`use strict`;
function refreshTime() {
  const timeDisplay = document.getElementById("time");
  const dateString = new Date().toLocaleString();
  const formattedString = dateString.replace(", ", " - ");
  timeDisplay.textContent = formattedString;
}
  setInterval(refreshTime, 1000);