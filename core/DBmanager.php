<?php  
 
class DBmanager {
    private PDO  $pdo ;

public function __construct(  private $host , 
   private $dbname ,
    private $username ,
   private $password ) {
    $this->getconnection();
    
}

 public function getconnection () : PDO {
if(empty($this->pdo)){
    $this->pdo = new PDO($this->getdsn() , $this->username ,$this->password ) ;
    
}
 return $this->pdo ; 
}


public function query($sql, ...$params) {
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
} 

public function getdsn() : string {

  return  sprintf("mysql:host=%s;dbname=%s",$this->$host , $this->dbname );

}

}

?>