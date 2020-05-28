
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

$pdo = mysqli_connect("localhost", "root", "", "BookSite");
//$pdo = new PDO('mysql:host=localhost;dbname=BookSite; charset=utf8', 'root', ''); 
if (mysqli_connect_errno($pdo)){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$BookID=$_POST['BookID'];

$sql="SELECT * FROM Books WHERE BookID=$BookID";

$results = mysqli_query($pdo, $sql);
if ( !$results) {
        echo('No book with this ID found');
        exit();
    }


else 
{
$row = mysqli_fetch_array($results); 
$Title = $row['Title'];
$Author = $row['Author'];
$PageNum = $row['PageNum'];
$Description = $row['Description'];
$StockNo = $row['StockNo'];


}
//free results
  mysqli_free_result($results);
  
  //close connection
  mysqli_close($pdo);
?>
<html>
<head>
</head>
</body>
<form action="updateBook.php" method="post">
<input type="hidden" name="BookID" value="<?php echo $BookID; ?>">
Title: <input type="text" class="txtBox" name="Title" value="<?php echo $Title; ?>"><br /><br />
Author: <input type="text" class="txtBox" name="Author" value="<?php echo $Author; ?>"><br /><br />
PageNum: <input type="text" class="txtBox" name="PageNum" value="<?php echo $PageNum; ?>"><br /><br />
Description: <input type="text" class="txtBox" name="Description" value="<?php echo $Description; ?>"><br /><br />
Stock Amount: <input type="text" class="txtBox" name="StockNo" value="<?php echo $StockNo; ?>"><br /><br />

<input type="Submit" class="txtBox" value="Update">
</form>
</body>
</html>







