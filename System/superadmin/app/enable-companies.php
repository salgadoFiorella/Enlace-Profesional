<?php 
require '../constants/db_config.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("UPDATE tbl_companies set estado='S' WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $stmt2 = $conn->prepare("SELECT * FROM tbl_denied_acces_companies WHERE company_id = :id AND access_denied = 'Si'");
        $stmt2->bindParam(':id',$id);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
            foreach($result2 as $row){
                $stmt3 = $conn->prepare("UPDATE tbl_denied_acces_companies set access_denied = 'No' WHERE id = :dId");
                $idbc = $row['id'];
                $stmt3->bindParam(':dId',$idbc);
                $stmt3->execute();
            }
        
        header("location:../users.php?r=3698");
    }catch(PDOException $e){
echo $e;
    }
}
?> 