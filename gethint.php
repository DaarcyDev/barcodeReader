<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];
$anaquel = $_REQUEST["anaquel"];

//$hint = "";
$con = mysqli_connect('localhost', 'root', '', 'qrs');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q != "") {
  $result = mysqli_query($con, "SELECT * FROM logs WHERE name='$q'");
  $rowcount = mysqli_num_rows($result);
  if ($rowcount == 0) {
    $ret = mysqli_query($con, "INSERT INTO `logs`(name,Time,anaquel) VALUES ('$q',NOW(), '$anaquel')");
    if ($ret) {
      echo '<div class="alert alert-success"><strong>Success!</strong> employee successfully registered</div>' + date('l jS \of F Y h:i:s A');
      exit();
    } else {
    }
  } else {
    // echo 'employee is already registered';  
    echo '<div class="alert" style="color: rgb(11, 9, 4);
background-color: rgb(132, 110, 45) !important;"><strong>Codigo de barras repetido</strong></div>';
    // echo '<div class="alert alert-success"><strong>Success!</strong> employee successfully registered</div>';
    echo date('l jS \of F Y h:i:s A');
  }
}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>