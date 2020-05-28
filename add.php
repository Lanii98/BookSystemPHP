
<?php
   include 'createBook.html';
   
   echo '<link rel="stylesheet" href="style.css">';
   
   if (isset($_POST['submitdetails'])) {                   
try { 

    $bName = $_POST['bName'];
    $bAuthor = $_POST['bAuthor'];
    $bPages = $_POST['bPages'];
    $bDesc = $_POST['bDesc'];
    $bStock = $_POST['bStock'];


    if ($bName == '' or $bAuthor == '' or $bPages == '' or $bDesc == '')
    {
        echo("You did not complete the insert form correctly <br> ");
                  }
                  
else{
    $pdo = new PDO('mysql:host=localhost;dbname=BookSite; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO Books (Title,Author,PageNum,Description,StockNo) VALUES(:bName,:bAuthor,:bPages,:bDesc, :bStock)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':bName', $bName);
    $stmt->bindValue(':bAuthor', $bAuthor);
    $stmt->bindValue(':bPages', $bPages);
    $stmt->bindValue(':bDesc', $bDesc);
    $stmt->bindValue(':bStock', $bStock);
    
    $stmt->execute();
    header('location: add.php'); 
    
    echo("Book added Succesfully! <br> ");
    
    }
} 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
} 

 ?>


