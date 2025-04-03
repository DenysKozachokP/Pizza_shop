<?php
namespace controllers;

use core\Controller;
use core\Core;
use models\Basket;
use models\Products;
use models\Purchase;
use models\Users;

class BasketController extends Controller
{
    public function actionIndex(){
        return $this->render();
    }
    public function actionAdd(){
        if (Users::IsUserLoged()){
            $id = $_GET['id'];
            $login = Core::get()->session->get('login');
            Basket::AddIteamToBasket($id, $login);
            return $this->redirect("/products/index?page=0&basket=1");
        }           
    }
}
?>
