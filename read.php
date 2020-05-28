
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

if (isset($_POST['submitdetails'])) { 
try { 
$pdo = new PDO('mysql:host=localhost;dbname=BookSite; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM Books where BookID = :BookID';
$result = $pdo->prepare($sql);
$result->bindValue(':BookID', $_POST['BookID']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM Books where BookID = :BookID';
    $result = $pdo->prepare($sql);
    $result->bindValue(':BookID', $_POST['BookID']); 
    $result->execute();
    
    while ($row = $result->fetch()) { 

      echo 'Title: ' . $row['Title'] . ' | <br/>
      Author: ' . $row['Author'] . ' | <br/>
      Page Count: ' . $row['PageNum'] . ' | <br/>
      Description: ' . $row['Description'] . ' | <br/>
      Stock Left: ' . $row['StockNo'] . ' |';
      
     }
}
else {
      print "No book found with this ID";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
}
?>
