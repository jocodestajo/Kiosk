// Data to be sent to PHP
var data = {
  key1: "value1",
  key2: "value2",
};

// Create a new XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Define the PHP file URL and specify the request method (POST or GET)
var phpFile = "php.php";
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
