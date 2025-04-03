<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace core;

class Model
{
    protected $fieldsArray;
    protected static $primaryKey = 'id';
    protected static $tableName = '';
    public function __construct()
    {
        $this->fieldsArray = [];
    }

    public function __set($name, $value)
    {
        $this->fieldsArray[$name] = $value;
    }

    public function __get($name)
    {
        $this->fieldsArray[$name];
    }
    public static function deleteById($id)
    {
        Core::get()->db->delete(static::$tableName, [self::$primaryKey => $id]);
    }
    public static function updateById($asocArr,$id)
    {
        Core::get()->db->update(static::$tableName, $asocArr, [self::$primaryKey => $id]);
    }
    public static function updateByCondition($asocArr, $wherArr)
    {
        Core::get()->db->update(static::$tableName, $asocArr, $wherArr);
    }
    public static function deleteByCondition($conditionAsocArray)
    {
        Core::get()->db->delete(static::$tableName, $conditionAsocArray);
    }
    public static function FindById($id)
    {
        $arr = Core::get()->db->select(static::$tableName, '*', [static::$primaryKey => $id]);
        if (count($arr) > 0)
            return $arr[0];
        else
            return null;
    }
    public static function FindByLoginAndTableName($login, $tableName)
    {
        $arr = Core::get()->db->select($tableName, '*', ['login' => $login]);
        if (count($arr) > 0)
            return $arr[0];
        else
            return null;
    }
    public static function FindByCondition($conditionAsocArray)
    {
        $arr = Core::get()->db->select(static::$tableName, '*', $conditionAsocArray);
        if (count($arr) > 0)
            return $arr;
        else
            return null;
    }
    public static function FindAll(){
        $arr = Core::get()->db->select(static::$tableName, '*', [1 => 1]);
        if (count($arr) > 0)
            return $arr;
        else
            return null;
    }
    public static function FindProdactsByLogin($login){
        $arr = Core::get()->db->selectSpecialRequest(
            "SELECT `basket`.`id` AS idbasket, `products`.`id`,`products`.`name` , `products`.`description`,`products`.`discount`, `products`.`price` , `products`.`imgPath`
            FROM `products` 
            JOIN `basket` ON `products`.`id` = `basket`.`id_prod` 
            JOIN `users` ON `basket`.`login` = `users`.`login` 
            WHERE `users`.`login` = '{$login}';");
        if (count($arr) > 0)
            return $arr;
        else
            return null;
    }
    public static function FindByType($conditionAsocArray, $OrderBy, $wheeLike = null)
    {
        $arr = Core::get()->db->selectWithoutWhere(static::$tableName, '*', $conditionAsocArray, $OrderBy, $wheeLike);
        if (count($arr) > 0)
            return $arr;
        else
            return null;
    }
    public static function FindByTypeDiscount($conditionAsocArray, $OrderBy, $wheeLike = null)
    {
        $arr = Core::get()->db->selectWithoutWhere(static::$tableName, '*', $conditionAsocArray,$OrderBy, "`fishing_prodacts`.`discount` > 0 " . $wheeLike );
        if (count($arr) > 0)
            return $arr;
        else
            return null;
    }

    public function save()
    {
        $IsInsert = false;
        if(!isset($this->{self::$primaryKey})){
            $IsInsert = true;
        }
        else{
            $value = $this->{self::$primaryKey};
            if (empty($value)){
                $IsInsert = true;
            }
        }   
        if($IsInsert)
        {
            Core::get()->db->insert(static::$tableName, $this->fieldsArray);
        }else
        {
            Core::get()->db->update(static::$tableName, $this->fieldsArray,
            [
                self::$primaryKey => $this->{self::$primaryKey}
            ]);
        }
    }
}
?>