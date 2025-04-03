<?php
namespace controllers;

use core\Controller;
use core\Core;
use models\Basket;
use models\Products;
use models\Purchase;
use models\Users;

class ProductsController extends Controller
{
    public function actionIndex(){
        return $this->render();
    }
}