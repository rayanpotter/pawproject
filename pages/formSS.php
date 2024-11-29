<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>Search Student</title>
</head>

<body>

    <div class="container" id="container">
     
        <div class="form-container sign-in">
            <form method="post" action="../db/search.php">
            
                <h1>Search</h1>
             
                <span>  email / Firstname / Lastname</span>
                <input type="email"  class="form-control" id="email" name="email" placeholder="Email">
             
                <input type="text"  class="form-control" id="prenom" name="prenom" placeholder="Firstname">
                <input type="text"  class="form-control" id="nom" name="nom" placeholder="Lastname">
            
                <button>Search</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
              
                <div class="toggle-panel toggle-right">
                    <h1>you looking for someone ?</h1>
                   
                 <button>  <a href="../index.php" style="color:aliceblue;">Back to Home</a> </button> 
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>