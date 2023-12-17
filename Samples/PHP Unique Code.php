<!-- 
<?php
function generateUniqueCode($pageClicked, $transactionNumber) {
    // Get the current date
    $currentDate = date("mdy");

    // Format the transaction number (pad with zeros if needed)
    $formattedTransactionNumber = str_pad($transactionNumber, 4, "0", STR_PAD_LEFT);

    // Concatenate the elements to create the unique code
    $uniqueCode = strtoupper(substr($pageClicked, 0, 3)) . $currentDate . $formattedTransactionNumber;

    return $uniqueCode;
}

// Example usage
// $name = "John Doe";
$currentTransactionNumber = 25;
$pageClicked = "Registrar"; // Replace this with the identifier for the clicked page

$generatedCode = generateUniqueCode($pageClicked, $currentTransactionNumber);
echo "Generated Code: " . $generatedCode;
?> -->



<!-- <?php
// Extracting information from the generated code
$generatedCode = "JOH202301250002A"; // Replace this with your actual generated code

$pageClicked = substr($generatedCode, -1); // Extract the last character as the page identifier
echo "Page Clicked: " . $pageClicked;
?> -->

<!-- Result.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pageClicked"])) {
        $pageClicked = $_POST["pageClicked"];
        // Here, you can use $pageClicked in generating the unique code or processing the data accordingly
        echo "Page Clicked: " . $pageClicked;
        // You can generate the unique code here by calling your function and passing $pageClicked as an argument
    } else {
        echo "No page clicked data received.";
    }
} else {
    echo "Invalid request method.";
}
?>

