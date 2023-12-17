// SCRIPT.JS
// document.getElementById("proceed").addEventListener("click", function () {
//   document.getElementById("transactionForm").style.display = "block";
//   document.getElementById("overlay").style.display = "block";
// });

document.getElementById("no").addEventListener("click", function () {
  document.getElementById("confirmationModal").style.display = "block";
  document.getElementById("overlay").style.display = "none";
});

// Data to be sent to PHP
// var data = {
//     key1: 'value1',
//     key2: 'value2'
// };

var data = [];

// Create a new XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Define the PHP file URL and specify the request method (POST or GET)
var phpFile = "Result.php";
var method = "POST";

// Set up the request
xhr.open(method, phpFile, true);

// Set the request header if needed (e.g., for POST requests)
xhr.setRequestHeader("Content-Type", "application/json");

// Handle the request completion
xhr.onreadystatechange = function () {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      // Request was successful, handle the response from PHP (if any)
      console.log(xhr.responseText);
    } else {
      // Request failed
      console.log("Error: " + xhr.status);
    }
  }
};

// Convert JavaScript object to JSON string
var jsonData = JSON.stringify(data);

// Send the request with the data
xhr.send(jsonData);

// <!-- FOR UNIQUE CODE -->

//   let lastResetDate = new Date().getDate(); // Declare lastResetDate globally

let lastResetDate = new Date(); // Initialize lastResetDate with current date and time
let counter = 0; // Initialize the daily transaction count

const today = new Date();
const formattedDate = formatDateToMMDDYY(today);

// Reset Transaction Count
function resetDailyTransactions() {
  const currentDate = today;

  if (
    currentDate.getDate() !== lastResetDate.getDate() ||
    currentDate.getMonth() !== lastResetDate.getMonth() ||
    currentDate.getFullYear() !== lastResetDate.getFullYear()
  ) {
    // If the day, month, or year has changed, reset the transaction count
    counter = 0;
    lastResetDate = currentDate;
    console.log("Daily transactions reset."); // Log the reset
    // Clear sessionStorage for all counters
    sessionStorage.removeItem("ossCounter");
    sessionStorage.removeItem("acadCounter");
    sessionStorage.removeItem("regCounter");

    // sessionStorage.clear();
    // console.log(`Transaction Count Reset Successful`);
  } else {
    console.warn(`Transaction Count Reset Unsuccessful`);
  }
}

const ticketReg = document.querySelector("#ticketReg");

function generateCode(type) {
  switch (type) {
    case "OSS":
      counter = sessionStorage.getItem("ossCounter") || 0;
      sessionStorage.setItem("ossCounter", ++counter);
      document.getElementById(
        "ticketOutput"
      ).innerText = ` OSS-${formattedDate}-${padCounter(counter)}`;

      // To check the daily transaction count:
      console.log(`OSS Transaction Count: ${counter}`);
      break;

    case "ACAD":
      counter = sessionStorage.getItem("acadCounter") || 0;
      sessionStorage.setItem("acadCounter", ++counter);
      document.getElementById(
        "ticketOutput"
      ).innerText = ` ACAD-${formattedDate}-${padCounter(counter)}`;

      // To check the daily transaction count:
      console.log(`ACAD Transaction Count: ${counter}`);
      break;

    case "REG":
      counter = sessionStorage.getItem("regCounter") || 0;
      sessionStorage.setItem("regCounter", ++counter);
      document.getElementById(
        "ticketOutput"
      ).innerText = ` REG-${formattedDate}-${padCounter(counter)}`;

      // To check the daily transaction count:
      console.log(`REG Transaction Count: ${counter}`);
      break;

    case "ADM":
      counter = sessionStorage.getItem("admCounter") || 0;
      sessionStorage.setItem("admCounter", ++counter);
      document.getElementById(
        "ticketOutput"
      ).innerText = ` ADM-${formattedDate}-${padCounter(counter)}`;

      // To check the daily transaction count:
      console.log(`ADM Transaction Count: ${counter}`);
      break;
  }
}

function padCounter(counter) {
  return counter.toString().padStart(3, "0");
}

function formatDateToMMDDYY(date) {
  // format Date To MMDDYY
  const mm = String(date.getMonth() + 1).padStart(2, "0"); // Month starts from 0
  const dd = String(date.getDate()).padStart(2, "0");
  const yy = String(date.getFullYear()).slice(-2); // Extracting last two digits of the year

  return mm + dd + yy;
}

console.log(formattedDate); // Output: "mmddyy" format of today's date

// Modify the date change simulation to update the lastResetDate accordingly
setInterval(() => {
  console.log("Date is changing...");
  today.setDate(today.getDate() + 1); // Increment the date by 1 day
  resetDailyTransactions(); // Check and reset the daily transactions
  // sessionStorage.clear();
}, 10000);
