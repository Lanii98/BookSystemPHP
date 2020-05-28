
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
echo '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">';
echo '<link rel="stylesheet" href="style.css">';

session_start();
$pdo = mysqli_connect("localhost", "root", "", "BookSite");
if(mysqli_connect_errno($pdo)){
	echo "Failed to connect" .mysqli_connect_error();

exit();}


$BookID = $_POST['BookID'];
$Title = $_POST['Title'];
$Author = $_POST['Author'];
$PageNum = $_POST['PageNum'];
$Description = $_POST['Description'];
$StockNo = $_POST['StockNo'];

$sql = "UPDATE Books SET Title = '$Title', Author = '$Author', PageNum = '$PageNum', Description = '$Description', StockNo = '$StockNo' WHERE BookID = $BookID";

$results = mysqli_query($pdo, $sql);
if(!$results){
	echo('Error | '. $sql .mysql_error());
}
else{
	echo  $results;
	if(mysqli_affected_rows($pdo) < 1){
		echo "Something went wrong ;-;";
	}
	else{
		echo "Record Updated";}
		mysqli_close($pdo);
	}

?>
