<?php

$mysqli = new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASSWORD"),getenv("DB_DATABASE"));

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";

$tables = array();
if($result = $mysqli->query(sprintf("SELECT table_name FROM information_schema.tables WHERE table_type = 'base table' AND table_schema='%s'", getenv("DB_DATABASE")))) {
  while($row = $result->fetch_assoc()) {
    $tables[] = $row['table_name'];
  }
} else {
  echo "Didn't get a result";
}

?>
<DOCTYPE html>
<html lang="en">
  <head>
    <title>Test</title>
  </head>
  <body>
    <h1>Hello to the world</h1>
    <div>DB_USER: <?php echo getenv("DB_USER"); ?></div>
    <pre><?php print_r($_ENV); ?></pre>
    <h2>Table list</h2>
    <ul>
    <?php 
    foreach($tables as $t) {
      echo "<li>". print_r($t, true) ."</li >";
    }
    ?>
    </ul>
  </body>
</html>
