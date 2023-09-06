<?php


/**
 * Class Crud
 */
class Crud extends PDO{

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=carrent; port=3306; charset=utf8', 'root', '');
    }

    
    /**
     * Method select
     *
     * @param  string $table
     * @param  string $field
     * @param  string $order
     * @return array
     */
    public function select($table, $field = 'id', $order = 'ASC') {

        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    
    /**
     * Method selectInnerJoin
     *
     * @param  string $table1
     * @param  string $table2
     * @param  string $table3
     * @param  string $field
     * @param  string $order
     * @return array
     */
    public function selectInnerJoin($table1, $table2, $table3, $field = 'id', $order = 'ASC') {

        $id_table2 = $table2."_id";
        $id_table3 = $table3."_id";

        $sql = "SELECT * FROM $table1 a 
        INNER JOIN $table2 b ON a.$id_table2 = b.id 
        INNER JOIN $table3 c ON a.$id_table3 = c.id
        ORDER BY $field $order";

        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }    

        
    /**
     * Method selectId
     *
     * @param  string $table
     * @param  int    $value
     * @param  string $field
     * @param  string $url
     * @return array
     */
    public function selectId($table, $value, $field='id', $url="index") {

        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);

        $stmt->execute();

        $count = $stmt->rowCount();

        if($count == 1){
            return $stmt->fetch();
        }else{
            header("location:$table-$url.php");
            exit;
        }   
    }

    
    /**
     * Method selectDoublePK
     *
     * @param  string $table
     * @param  string $value1
     * @param  string $value2
     * @param  string $field1
     * @param  string $field2
     * @param  string $url
     * @return array
     */
    public function selectDoublePK($table, $value1, $value2, $field1, $field2, $url="index") {

        $sql = "SELECT * FROM $table WHERE $field1 = :$field1 AND $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field1", $value1);
        $stmt->bindValue(":$field2", $value2);

        $stmt->execute();

        $count = $stmt->rowCount();

        if($count == 1){
            return $stmt->fetch();
        }else{
            header("location:$table-$url.php");
            exit;
        }   
    }

        
    /**
     * Method insert
     *
     * @param  string $table
     * @param  array  $data
     * @return int
     */
    public function insert($table, $data) {

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";

        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            print_r($stmt->errorInfo());
        }   
    }

        
    /**
     * Method update
     *
     * @param  string $table
     * @param  array  $data
     * @param  string $field
     */
    public function update($table, $data, $field='id', $url="index") {

        $fieldName = null;

        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()){
            header("location:$table-$url.php");
            exit;
        }else{
            print_r($stmt->errorInfo());
        }
    }

    
    /**
     * Method updateDoublePK
     *
     * @param  mixed $table
     * @param  mixed $data
     * @param  mixed $field1
     * @param  mixed $field2
     * @param  mixed $url
     * @return void
     */
    public function updateDoublePK($table, $data, $field1, $field2, $url="index") {

        $fieldName = null;

        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field1 = :$field1 AND $field2 = :$field2";
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()){
            header("location:$table-$url.php");
            exit;
        }else{
            print_r($stmt->errorInfo());
        }
    }

        
    /**
     * Method delete
     *
     * @param  string $table
     * @param  int    $value
     * @param  string $url
     * @param  string $field
     */
    public function delete($table, $value, $field='id', $url="index"){

        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);

        if($stmt->execute()){
            header("location:$table-$url.php");
            exit;
        }else{
            print_r($stmt->errorInfo());
        }   
    }


    public function deleteDoublePK($table, $value1, $value2, $field1, $field2, $url="index"){

        $sql = "DELETE FROM $table WHERE $field1 = :$field1 AND $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field1", $value1);
        $stmt->bindValue(":$field2", $value2);

        if($stmt->execute()){
            header("location:$table-$url.php");
            exit;
        }else{
            print_r($stmt->errorInfo());
        }   
    }
}

?>