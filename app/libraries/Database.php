<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PASS;
    private $dbname = DB_NAME;
    
    private $dbh; // database handler
    private $stmt;
    private $error;
    
    public function __construct() {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
        $options = array([
            PDO::ATTR_PERSISTENT => True,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pwd, $options);
            
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($type):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($type):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute() {
        return $this->stmt->execute();
    }
    
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
?>