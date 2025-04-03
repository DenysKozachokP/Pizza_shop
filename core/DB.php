<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace core;

class DB
{
    public $pdo;
    public function __construct($host,$name,$login,$password)
    {
        $this->pdo = new \PDO("mysql:host={$host};dbname={$name}",$login,$password,
        [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }
    protected function where($where)
    {
        if (is_array($where))
        {
            $where_string = "WHERE ";
            $where_fields = array_keys($where);
            $parts = [];
            foreach($where_fields as $fields){   
                $parts[] = "{$fields} = :{$fields}"; 
            }
            $where_string .= implode(' AND ', $parts);
        }
        else
            if (is_string($where))
                $where_string = $where;
            else
            $where_string = "";
        return $where_string;
    }
    
    public function select($table, $field, $where)
    {
        if (is_array($field))
            $field_string = implode(', ', $field);
        else
            if (is_string($field))
                $field_string = $field;
            else
                $field_string = "*";

        $where_string = $this->where($where);
        $sql = "SELECT {$field_string} FROM {$table} {$where_string}";
        $sth = $this->pdo->prepare($sql);
        foreach($where as $key => $value)
            $sth->bindValue(":{$key}",$value);
        $sth->execute();
        return $sth->fetchAll();
    }
    public function selectWithoutWhere($table, $field, $where, $OrderBy, $wherLike)
    {
        if (is_array($field))
            $field_string = implode(', ', $field);
        else
            if (is_string($field))
                $field_string = $field;
            else
                $field_string = "*";
        if ($wherLike != null){
            $where_string = "WHERE ";
            foreach($where as $row){
                $where_string .= $wherLike. "AND". $row . "OR ";
            }
            $where_string = substr($where_string, 0, -3);
            $where_string .= $OrderBy;
        }
        else
            $where_string = "WHERE " . implode('OR', $where) . $OrderBy;
        $sql = "SELECT {$field_string} FROM {$table} {$where_string}";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
    public function selectSpecialRequest($sql){
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
    public function insert($table, $row_to_insert)
    {
        $field_list = implode(", ", array_keys($row_to_insert));
        $params_array = [];
        foreach($row_to_insert as $key=>$value){
            $params_array[] = ":{$key}";
        }
        $params_list = implode(", ", $params_array);

        $sql = "INSERT INTO {$table} ({$field_list})VALUES ({$params_list})";
        $sth = $this->pdo->prepare($sql);
        echo $sql;
        foreach($row_to_insert as $key => $value)
            $sth->bindValue(":{$key}",$value);
        
        $sth->execute();
        return $sth->rowCount();
    }
    public function delete($table, $where)
    {
        $where_string = $this->where($where);
        $sql = "DELETE FROM {$table}  {$where_string}";
        $sth = $this->pdo->prepare($sql);
        foreach($where as $key => $value)
            $sth->bindValue(":{$key}",$value);
        $sth->execute();
        return $sth->rowCount();
    }
    public function update($table, $row_to_update ,$where)
    {
        $where_string = $this->where($where);
        $set_array = [];
        foreach($row_to_update as $key =>$value){
            $set_array[] = "{$key} = :{$key}";
        }
        $set_string = implode(", ", $set_array);
        $sql = "UPDATE {$table} SET {$set_string} {$where_string}";
        $sth = $this->pdo->prepare($sql);
        foreach($where as $key => $value)
            $sth->bindValue(":{$key}",$value);
        foreach($row_to_update as $key => $value)
            $sth->bindValue(":{$key}",$value);
        $sth->execute();
        return $sth->rowCount(); 
    }
}


?>