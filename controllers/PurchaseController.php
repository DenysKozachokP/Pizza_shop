<?php
namespace controllers;

use core\Controller;
use core\Core;
use models\Fishing;
use models\Purchase;

class PurchaseController extends Controller
{
    public function actionIndex()
    {
        if ($this->get->list == 1){
            $this->addConfirmMessage("Лист успішно надіслано");
            $this->clearWarningMessage();
            $this->isGet = false;
        }
        if ($this->get->list == 2){
            $this->addWarningMessage("Замовлення видалено");
            $this->clearConfirmMessage();
            $this->isGet = false;
        }
        return $this->render();
    }
    public function actionSendList()
    {
        $id = $this->get->id;
        Purchase::RequestAnswerToEmail($id);
        return $this->redirect('/purchase/index?list=1');
    }
    public function actionDelList()
    {
        $id = $this->get->id;
        Purchase::deleteById($id);
        return $this->redirect('/purchase/index?list=2');
    }
    
}
?>