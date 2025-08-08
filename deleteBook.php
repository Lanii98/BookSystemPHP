<nav>
        <ul>
            <li><a href="BookSystem.html">Home Page</a></li></li>
            <li><a href="createBook.html">Add Book</a></li>
            <li><a href="deleteform.html">Delete Book</a></li>
            <li><a href="updateForm.html">Update Book</a></li>
            <li><a href="chooseBook.html">View Book</a></li>
            <li><a href="purchaseForm.html">Purchase Book</a></li>
        </ul>
  </nav>
  <br/>
  <br/>

<?php

echo '<link rel="stylesheet" href="style.css">';

session_start();

$BookID = $_POST['BookID'];

if ($BookID == ''or !is_numeric($BookID) )
{
echo("No Such BookID exists. <br />\n");
} 

else
{
$pdo = mysqli_connect("localhost", "root", "", "BookSite");
if (mysqli_connect_errno($pdo )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

$sql = "DELETE from Books WHERE BookID = $BookID";
$results = mysqli_query($pdo, $sql);
if($results){
		$count = mysqli_affected_rows($pdo);
	}
	if($count!=' '){

             echo("Book with ID " . " ". $BookID. " " . "has been deleted successfully!\n");
             }
             else{
             
             echo "No such ID exists";
             }

  mysqli_close($pdo);	
	
}



?>
