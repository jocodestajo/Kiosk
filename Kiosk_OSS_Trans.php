<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet'>
<!--Get your own code at fontawesome.com-->


<!-- OSS transactionpage -->
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/r-icon" href="Photos/PUPLogo.png" />
    <title> OFFICE OF THE STUDENT SERVICES </title>
    
 
        <div class="img1">
            <h1> <img src="Photos/PUPLogo.png" style="width: 120px;"></h1>
        </div>

        <div class="title" style="font-size:1.8rem;" >
            <b> OFFICE OF THE STUDENT SERVICES </b>
        </div>
        <div class="trans"> 
            <button id="back-btn"><a href='PUPKiosk.html'> <b>    < </a>  </b> </button>
        <label class="select-trans"> Select Transaction(s)</label>
        </div>
</head>
<body>
<form action="result.php" method="post" id="transactionForm">
<div class="container" id="blur">
    <div class="left-side">
        <input type="checkbox" id="ch1" name="ch[]" class ="Checkbox" value="Requesting for Good Moral Character"/> 
        <label class="labels" for="ch1" > Good Moral Character  </label><br>

        <input type="checkbox" id="ch2" name="ch[]" class ="Checkbox" value="Iskolar ng Bayan Scholarship " /> 
        <label class="labels" for="ch2"> Iskolar ng Bayan Scholarship </label><br>

        <input type="checkbox" id="ch3" name="ch[]" class ="Checkbox" value="Applying for Scholarship " />
        <label class="labels" for="ch3">   Applying for Scholarship </label><br>

        <input type="checkbox" id="ch4" name="ch[]" class ="Checkbox" value="Applying for Student Assistantship"/> 
        <label class="labels" for="ch4"> Student Assistantship  </label><br>
    </div>
        
    <div class="right-side">
        <input type="checkbox" id="ch5" name="ch[]" class ="Checkbox" value="Recommendation Letter for Scholarship"/> 
        <label class="labels" for="ch5">   Recommendation Letter </label><br>

        <input type="checkbox" id="ch6" name="ch[]" class ="Checkbox" value="Renewing of Scholarship"/>
        <label class="labels" for="ch6">  Scholarship Renewal  </label><br>

        <input type="checkbox" id="ch7" name="ch[]" class ="Checkbox" value="Seeking for Counseling "/> 
        <label class="labels" for="ch7">  Seeking for Counseling  </label><br>

        <input type="checkbox" id="ch8" name="ch[]" class ="Checkbox" value="Sponsoring a Scholarship Program  "/>
        <label class="labels" for="ch8">  Sponsoring a Scholarship </label><br>
    </div>
    </form>

    <br><br>
     </div> 

     <div class="btn-proceed">
        <button id="proceed" onclick="showConfirmation()" > <b> PROCEED </b> </button>
        <a id="kiosk"> <img src="Photos/PUPKioskLogo.png" style="width: 150px;"></a>
     </div>

    
     

       <!-- Confirmation Modal -->
       <div id="confirmationModal">
        <div class="modalcontent" id="modal">
            <h2>CONFIRM</h2>
            <p><b> Are you sure with the transaction? </b></p>
            <button onclick="closeModal()"  id="no"><b>  NO  </b></button>
            <button onclick="combineUsers()" id="yes"><b>  YES  </b></button>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
    <script src="script.js"> </script>

    <script>

        let modalcontent = document.getElementById("modal");
        function showConfirmation() {
            modalcontent.classList.add("open-modalcontent");
            document.getElementById("confirmationModal").style.display = "block";
        }

        function closeModal() {
            modalcontent.classList.remove("open-modalcontent");
            document.getElementById("confirmationModal").style.display = "block";
        }

        function combineUsers() {
            document.getElementById("transactionForm").submit();
        }
    </script>
</body>
</html>