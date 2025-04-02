<?php 
namespace models;

use core\Model;
use core\Core;
/**
 * @property int $id 
 * @property int $id_prod
 * @property int $count 
 */
class Storage extends Model
{
    public static $tableName = 'storage';

    public static function AddTotable($idProd, $count)
    {
        $storage = new Storage();
        $storage->id_prod = $idProd;
        $storage->count = $count;
        $storage->save();
    }
}
?>