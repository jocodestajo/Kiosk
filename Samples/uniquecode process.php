<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pageClicked"])) {
        $pageClicked = $_POST["pageClicked"];
        
        // Function to generate a unique code
        function generateUniqueCode($pageClicked, $transactionNumber) {
            $currentDate = date("mdy");
            $formattedTransactionNumber = str_pad($transactionNumber, 4, "0", STR_PAD_LEFT);
            $uniqueCode = strtoupper(substr($pageClicked, 0, 3)) . $currentDate . $formattedTransactionNumber ;
            return $uniqueCode;
        }

        // Example values (replace with actual data)
        $currentTransactionNumber = 25; // Replace this with the actual current transaction number

        // Generate the unique code based on the clicked page
        $generatedCode = generateUniqueCode($pageClicked, $currentTransactionNumber);

        // Output the generated code
        echo "Code: " . $generatedCode;
    } else {
        echo "No page clicked data received.";
    }
} else {
    echo "Invalid request method.";
}
?>
