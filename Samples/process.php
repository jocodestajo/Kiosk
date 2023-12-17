<?php
session_start();

// Reset transaction number daily
if (!isset($_SESSION['transactionNumberDate']) || $_SESSION['transactionNumberDate'] != date('mdy')) {
    $_SESSION['transactionNumberDate'] = date('mdy');
    $_SESSION['transactionNumber'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['buttonValue'])) {
        $clickedButtonValue = $_POST['buttonValue'];
        echo "Clicked button value: " . htmlspecialchars($clickedButtonValue);
        // Process the clicked button value for each transaction page
    } elseif (isset($_POST['submitButton'])) {
        // If the submit button for text input is clicked
        if (isset($_POST['textInput'])) {
            $textInputValue = $_POST['textInput'];
            echo "Text input value: " . htmlspecialchars($textInputValue);
            // Process the text input for each transaction page
        } else {
            echo "No text input value submitted";
        }
    } else {
        echo "Form submitted, but no valid data received";
    }

    // Generate a unique code incorporating page name, date, and transaction number
    $pageName = "Transaction Page X"; // Replace with the respective page name
    $date = date('mdy');
    $transactionCode = $pageName . " - " . $date . " - " . $_SESSION['transactionNumber'];
    $_SESSION['transactionNumber']++; // Increment transaction number
    echo "Unique code: " . $transactionCode;
}
?>





for button
<button onclick="generateCode('REG')" id="ticket">GET TICKET</button>
<button onclick="generateCode('ACAD')" id="ticket">GET TICKET</button>
<button onclick="generateCode('OSS')" id="ticket">GET TICKET</button>
<button onclick="resetAll()" id="ticket">Reset Ticket</button>

<!-- for linking javascript -->
<p id="ticketOutput"></p>
<script src="ossTicket.js"></script>

<script>
  let lastResetDate = new Date().getDate(); // Get the current day
  function generateCode(Office) {
    let counter = 0; // Initialize the daily transaction count

    function resetDailyTransactions() {
      const currentDate = new Date().getDate();

      if (currentDate !== lastResetDate) {
        // If the day has changed, reset the transaction count
        counter = 0;
        lastResetDate = currentDate;
        console.log("Daily transactions reset."); // Optional: Log the reset
      }
    }

    switch (Office) {
      case "OSS":
        counter = sessionStorage.getItem("ossCounter") || 0;
        sessionStorage.setItem("ossCounter", ++counter);
        document.getElementById(
          "ticketOutput"
        ).innerText = ` OSS-${formattedDate}-${padCounter(counter)}`;

        // To check the daily transaction count:
        console.log(`Daily OSS Transaction Count: ${counter}`);
        break;

      case "ACAD":
        counter = sessionStorage.getItem("acadCounter") || 0;
        sessionStorage.setItem("acadCounter", ++counter);
        document.getElementById(
          "ticketOutput"
        ).innerText = ` ACAD-${formattedDate}-${padCounter(counter)}`;

        // To check the daily transaction count:
        console.log(`Daily ACAD Transaction Count: ${counter}`);
        break;

      case "REG":
        counter = sessionStorage.getItem("regCounter") || 0;
        sessionStorage.setItem("regCounter", ++counter);
        document.getElementById(
          "ticketOutput"
        ).innerText = ` REG-${formattedDate}-${padCounter(counter)}`;

        // To check the daily transaction count:
        console.log(`Daily REG Transaction Count: ${counter}`);
        break;
    }
  }

  // Function to perform a transaction
  function counter() {
    resetDailyTransactions(); // Check if a reset is needed before a transaction

    // Perform transaction logic here
    // For example:
    // transactionLogic();

    //   counter++; // Increment the transaction count
    console.log("Transaction completed."); // Optional: Log the transaction
  }

  function resetAll() {
    sessionStorage.clear();
    document.getElementById("ticketOutput").innerText = " ";
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

  const today = new Date();
  const formattedDate = formatDateToMMDDYY(today);

  console.log(formattedDate); // Output: "mmddyy" format of today's date

  // Simulate date change every 5 seconds (for testing purposes)
  setInterval(() => {
    console.log("Date is changing...");
    today.setDate(today.getDate() + 1); // Increment the date by 1 day
    lastResetDate = today.getDate(); // Update lastResetDate with the new day
  }, 5000);
</script>

