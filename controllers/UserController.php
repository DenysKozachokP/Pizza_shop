<?php
namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\ActivityUser;
use models\Users;
use models\Fishing;

class UserController extends Controller
{
    public function actionAdd(){
        return $this->render('views/user/add.php');
    }
    public function actionProfile(){
        if ($this->isPost){
            $id = Users::FindByLogin(Core::get()->session->get('login'))['id'];
            if ($this->post->name != null){
                Users::updateById(['name' => $this->post->name], $id);
                $this->addConfirmMessage("Ім'я оновлено");
            }if ($this->post->lastname != null){
                Users::updateById(['lastname' => $this->post->lastname], $id);
                $this->addConfirmMessage("Прізвище оновлено");
            }if ($this->post->email != null){
                Users::updateById(['email' => $this->post->email], $id);
                $this->addConfirmMessage("Email оновлено");
            }if ($this->post->number != null){
                Users::updateById(['number' => $this->post->number], $id);
                $this->addConfirmMessage("Номер телефону оновлено");
            }
        }
        return $this->render();
    }
    public function actionLogin(){
        if (Users::IsUserLoged())
            return $this->redirect('/');
        if ($this->isPost)
        {
            $user = Users::VerifyUser($this->post->login, $this->post->password);
            if (!empty($user)){
                Users::LoginUser($user);
                ActivityUser::AddTotable($this->post->login,$this->post->password,Users::FindByLogin($this->post->login)['priveleg']);
                Core::get()->session->setValues(["login" => $this->post->login]);
                return $this->redirect('/');
            }else{
                $this->addErrorMessage("Неправильний логін або пароль");
            }
        }
        return $this->render();   
    }
    public function actionLogout(){
        Users::LogoutUser();
        return $this->redirect('/user/login');
        return $this->render();
    }
    public function actionRegister()
    {
        //Core::get()->session->setValues(["login" => 'admin']);
        if($this->isPost)
        {
            $user = Users::FindByLogin($this->post->login);
            if (!empty($user))
                $this->addErrorMessage("Користувач з таким логіном вже існує");
            if(strlen($this->post->login) == 0)
                $this->addErrorMessage("Логін не вказано");
            if(strlen($this->post->name) == 0)
                $this->addErrorMessage("Ім'я не вказано");
            if(strlen($this->post->lastname) == 0)
                $this->addErrorMessage("Прізвище не вказано");
            if(strlen($this->post->email) == 0)
                $this->addErrorMessage("Email не вказано");
            if(strlen($this->post->password1) == 0)
                $this->addErrorMessage("Пароль не вказано");
            if($this->post->password1 != $this->post->password2)
                $this->addErrorMessage("Паролі не співпадають");
            if (!$this->isErrorMessageExist()){
                Users::RegisterUser($this->post->name, $this->post->lastname,$this->post->number,$this->post->email,$this->post->login,$this->post->password1);
                return $this->redirect('/user/registersuccsess');
            }
            Core::get()->session->setValues(["login" => $this->post->login]);
        }
        return $this->render();
    }
    public function actionRegistersuccsess()
    {
        return $this->render();
    }
    public function showErorrMess($errorMessages)
    {
        
    }
}


?>
