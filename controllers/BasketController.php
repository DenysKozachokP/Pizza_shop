<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

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
        if($this->isPost){
            if ($this->post->but == 1){
                $login = Core::get()->session->get('login');
                    $prod = Products::FindById($this->post->idValue);    
                    $finalPrice = $prod['discount'] > 0 ? round($prod['price'] - ($prod['price'] * $prod['discount']/100), 2) : $prod['price'];
                    $finalPrice = $this->post->buyValue > 1 ? $finalPrice * $this->post->buyValue : $finalPrice;
                    Basket::deleteById($this->post->idBasket);
                    $this->addConfirmMessage("Замовлення №{$this->post->idBasket} суммою = $finalPrice грн. зареєстровано, чекайте дзвінка менеджера");
                    $this->clearErrorMessage();  
            }
            if ($this->post->but == 0){
                Basket::deleteById($this->post->idBasket);
                $this->addConfirmMessage("Замовлення №{$this->post->idBasket} видалено");
                $this->clearErrorMessage();
            }
        }
        Basket::ShowAllProdInBasket();
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
