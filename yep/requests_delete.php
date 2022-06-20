<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Confeitaria X</title>
    </head>

    
</html>

<?php
 
// Connect to database
 
$mysqli = new mysqli("localhost", "root@", '123456', "pweb");
 
// Check connection
 
if ($mysqli->connect_errno) {
    error_log("Connect failed:");
    error_log( print_r( $mysqli->connect_error, true ) );
    exit();
}

 
// Prepare a DELETE statement
 
$stmt = $mysqli->prepare("DELETE FROM requests WHERE idPedido = ?");
 
// Check if prepare() failed.
// prepare() can fail because of syntax errors, missing privileges, ....
 
if ( false === $stmt ) {
    error_log('mysqli prepare() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
 
    // Since all the following operations need a valid/ready statement object
    // it doesn't make sense to go on
    exit();
}

$value = $_GET['id'];
// Bind the value to the statement
 
$bind = $stmt->bind_param('i', $value);
 
// Check if bind_param() failed.
// bind_param() can fail because the number of parameter doesn't match the placeholders
// in the statement, or there's a type conflict, or ....
 
if ( false === $bind ) {
    error_log('bind_param() failed:');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
    exit();
}
 
// Execute the query
 
$exec = $stmt->execute();
 
// Check if execute() failed. 
// execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
 
if ( false === $exec ) {
    error_log('mysqli execute() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
}
 
// Close the prepared statement
 
$stmt->close();
 
// Close connection
 
$mysqli->close();

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('requests_crud.php', false);