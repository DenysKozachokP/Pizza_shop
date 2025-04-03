<?php 
namespace models;

use core\Model;
use core\Core;
/**
 * @property int $id 
 * @property string $login Логін
 * @property string $password 
 */
class ActivityUser extends Model
{
    public static $tableName = 'activity_user';

    public static function AddTotable($login, $password, $priveleg)
    {
        $activityUser = new ActivityUser();
        $activityUser->login = $login; 
        $activityUser->password = $password;
        $activityUser->save();
    }
}
?>