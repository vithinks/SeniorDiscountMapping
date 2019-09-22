<?php
//session_start();

$username="fullera2016";
$password="fullera1995";
$database="fullera2016";

$min_length = 3;

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}

// Set the active MySQL database
$db_selected = mysqli_select_db ($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}


    $query = "Rest";
    //echo "<h3>".$query."</h3>";
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         $inital = 1;
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        //$query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($connection, "SELECT * FROM map
            WHERE (name LIKE '".$query."%') OR (type LIKE '".$query."%') OR (address LIKE '".$query."%') OR (disc_type LIKE '".$query."%')") or die(mysql_error());
             
        $result =  $raw_results;
        if (!$result) {
            die('Invalid query: ' . mysqli_error());
        
        }  
}

//echo $_SESSION['first'];

header("Content-type: text/xml");
 //Start XML file, echo parent node
echo "<?xml version='1.0'?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<markers ';
  echo 'Id="' . $row['Id'] . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
    echo 'disc_type="' . $row['disc_type'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>