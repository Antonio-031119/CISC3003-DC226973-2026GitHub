<?php 
session_start();

if ($_SERVER['REQUEST_METHOD']=="POST"){
    
    $_SESSION['form_data'] = $_POST;
    
    header("Location: art-process.php");
    exit();
}

// Define two string arrays as specified
$genres = array("Abstract", "Baroque", "Gothic", "Renaissance");
$subjects = array("Animals", "Landscape", "People");

// Function to generate HTML options from an array
function generateOptions($values) { 
    $result="";
    foreach ($values as $values){
        $result .= "<option value='". htmlspecialchars($values)."'>"  . htmlspecialchars($values) ."</option>";
    }
    return $result;
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>CISC3003 Suggested Exercise 09</title>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/misc.js"></script>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<?php include 'header.inc.php'; ?>
    
<main>
<form class="form"  id="mainForm" action="" method="POST">
   <fieldset class="form__panel">
      <legend class="form__heading">Edit Art Work Details</legend>
        <p class="form__row">
           <label>Title</label><br/>
           <input type="text" name="title" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label>Description</label><br/>
           <input type="text" name="description" class="form__input form__input--large">
       </p>            
       <p class="form__row"> 
           <label>Genre</label><br/>
           <select name="genre" class="form__input form__select">
              <option>Choose genre</option> 
              <?php echo generateOptions($genres)?>
           </select>
       </p>
       <p class="form__row"> 
           <label>Subject</label><br/>
           <select name="subject" class="form__input form__select">
              <option>Choose subject</option> 
              <?php echo generateOptions($subjects)?>
           </select>
       </p>
       <p class="form__row">	
           <label>Medium</label><br/>               
           <input type="text" name="medium" class="form__input form__input--medium" />
       </p>
       <p class="form__row">	
           <label>Year</label><br/>               
           <input type="text" name="year" class="form__input form__input--small" />
       </p>  
       <p class="form__row">	
           <label>Museum</label><br/>               
           <input type="text" name="museum" class="form__input form__input--medium"/>
       </p>                             

       <div class="form__box" > 
          <input type="submit" value="Submit" class="form__btn"> <input type="reset" value="Clear Form" class="form__btn">      
       </div>
   </fieldset>
</form>
</main>       
</body>
</html>
