<?php 
require '../constants/db_config.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("UPDATE tbl_companies set estado='E' WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
            header("location:../users.php?r=3700");
    }catch(PDOException $e){
echo $e;
    }
}
?> 