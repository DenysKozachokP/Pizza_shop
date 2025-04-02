<?php 
namespace models;

use core\Model;
use core\Core;
/**
 * @property int $id 
 * @property string $login Логін
 * @property string $password Пароль
 * @property string $name Ім'я
 * @property string $lastname Прізвище
 * @property string $email Пошта
 * @property string $number Номер телефону
 */
class Users extends Model
{
    public static $tableName = 'users';

    public static function VerifyUser($login, $password)
    {
        $rows = self::FindByCondition(['login' => $login, 'password' => $password]);
        if (!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function FindByLogin($login)
    {
        $rows = self::FindByCondition(['login' => $login]);
        if (!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function IsUserLoged()
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function LoginUser($user){
        Core::get()->session->set('user', $user);
    }
    public static function LogoutUser(){
        Core::get()->session->remove('user');
        Core::get()->session->remove('login');
    }
    public static function RegisterUser($name, $lastname, $number, $email, $login, $password)
    {
        $user = new Users();
        $user->name = $name;
        $user->lastname = $lastname;
        $user->number = $number;
        $user->email = $email;
        $user->login = $login;
        $user->password = $password;
        $user->save();
    }
}

?>