<?php 

abstract class Crud extends PDO {

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=carrental; port=3306; charset=utf8', 'root', '');
    }


    public function select($innerjoin = false, $leftjoin = false, $field = 'id', $where = null, $order = null) {

        if (!$innerjoin) {

            $sql = "SELECT * FROM $this->table ORDER BY $field $order";

            $stmt = $this->query($sql);

        } elseif (isset($this->table3))  {

            if ($where != null) {

                $sql = "SELECT * FROM $this->table a
                INNER JOIN $this->table2 b ON b.$this->primaryKey2 = a.$this->primaryKey
                INNER JOIN $this->table3 c ON c.$this->primaryKey3 = a.$this->secondPrimaryKey
                WHERE b.id = $where
                ORDER BY a.$field $order";

            } else {
                
            $sql = "SELECT * FROM $this->table a
                    INNER JOIN $this->table2 b ON b.$this->primaryKey2 = a.$this->primaryKey
                    INNER JOIN $this->table3 c ON c.$this->primaryKey3 = a.$this->secondPrimaryKey
                    ORDER BY a.$field $order";
            }



            $stmt = $this->query($sql);

        } else {

            if ($leftjoin) {

                $sql = "SELECT * FROM $this->table a
                LEFT JOIN $this->table2 b ON b.$this->primaryKey = a.$this->foreign
                ORDER BY a.$field $order";

            } else {

                $sql = "SELECT * FROM $this->table a
                INNER JOIN $this->table2 b ON b.$this->primaryKey = a.$this->foreign
                ORDER BY a.$field $order";
            }

            $stmt = $this->query($sql);
        }

        return $stmt->fetchAll();
    }


    public function selectId($value, $value2 = null) {

        if ($value2 == null) {
            $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        } else {
            $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey AND $this->secondPrimaryKey = :$this->secondPrimaryKey";
        }

        $stmt = $this->prepare($sql);
       
        $stmt->bindValue(":$this->primaryKey", $value);

        if (!$value2 == null) {
            $stmt->bindValue(":$this->secondPrimaryKey", $value2);
        }

        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count == 1) {
            
            return $stmt->fetch();

        }  else {
            header("location:../../home/error");
            exit;
        }
    }


    public function insert($data) {

        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        $fieldsName = implode(", ", array_keys($data));
        $fieldsValue = ":".implode(", :", array_keys($data));

        $sql = "INSERT INTO $this->table ($fieldsName) VALUES ($fieldsValue)";
         
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()) {
            return $this->lastInsertId();
        } else {
            print_r($stmt->errorInfo());
        }

    }


    public function update($data, $twoTables = false) {

        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        $fieldName = null;
        
        foreach($data as $key=>$value) {
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        //Si ce n'est pas une table n à n
        if (!$twoTables) {            
            $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        } else {
            $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey AND $this->secondPrimaryKey = :$this->secondPrimaryKey";
        }
        
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()) {
            return true;
        } else {
            print_r($stmt->errorInfo());
        }

    }
 

    public function delete($value, $value2 = null) {

        if ($value2 == null) {
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        } else {
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey AND $this->secondPrimaryKey = :$this->secondPrimaryKey";
        }

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);

        if (!$value2 == null) {
            $stmt->bindValue(":$this->secondPrimaryKey", $value2);
        }     
        
        if ($stmt->execute()) {
            return true;
        } else {
            print_r($stmt->errorInfo());
        }

    }
}

?>