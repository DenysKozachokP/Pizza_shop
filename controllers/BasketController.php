<?php
namespace controllers;

use core\Controller;
use core\Core;
use models\Basket;
use models\Fishing;
use models\Purchase;
use models\Users;

class BasketController extends Controller
{
    public function actionIndex(){
        if($this->isPost){
            if ($this->post->but == 1){
                if ($this->post->buyValue > $this->post->maxCount){
                    $this->addErrorMessage("Неможливо виконати замовлення №{$this->post->idBasket} не достатня кількiсть наявна на складі");
                    $this->clearConfirmMessage();
                }
                else{
                    $login = Core::get()->session->get('login');
                    $email = Basket::FindByLoginAndTableName($login,'users')['email'];
                    $prod = Fishing::FindById($this->post->idValue);    
                    $finalPrice = $prod['discount'] > 0 ? round($prod['price'] - ($prod['price'] * $prod['discount']/100), 2) : $prod['price'];
                    $finalPrice = $this->post->buyValue > 1 ? $finalPrice * $this->post->buyValue : $finalPrice;
                    Purchase::registerPurchaseReport($prod['id'], $login, $email, $prod['price'], $prod['discount'], $finalPrice, $this->post->buyValue);
                    $newCount = $prod['count'] - $this->post->buyValue;
                    Fishing::updateById(['count' => $newCount], $prod['id']);
                    Basket::deleteById($this->post->idBasket);
                    $this->addConfirmMessage("Замовлення №{$this->post->idBasket} суммою = $finalPrice грн. зареєстровано, чекайте дзвінка менеджера");
                    $this->clearErrorMessage();
                }   
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
            $email = Basket::FindByLoginAndTableName($login,'users')['email'];
            Basket::AddIteamToBasket($id, $login, $email);
            return $this->redirect("/fishing/index?page=0&basket=1");
        }           
    }
}
?>
