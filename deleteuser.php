<?php
$servername = "localhost";
$username = "ivaxpayroll";
$password = "ivaxpayroll";
$dbname = "ivaxpayroll";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* set the PDO error mode to exception */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     /*sql to delete a record*/
    $sql = "DELETE FROM ivax_users WHERE id='" . $_GET["id"] . "'";

    /*use exec() because no results are returned*/
    $conn->exec($sql);
echo '<script language="javascript">';
echo 'alert("User Deleted Successfully")';
echo '</script>';
}
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;
?>
