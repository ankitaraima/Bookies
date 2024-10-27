
<?php
// include_once('books.php');
// session_start();
include_once('database.php');

if(isset($_GET['deleteAdminid'])){
    $id = $_GET['deleteAdminid'];
    $sql = "DELETE FROM admin WHERE Username='$id'";
    mysqli_query($conn, $sql);
    header("Location:AdminPage.php" );

}




?>