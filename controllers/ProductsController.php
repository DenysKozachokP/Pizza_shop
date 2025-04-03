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

class ProductsController extends Controller
{
    public function actionIndex(){
        return $this->render();
    }
}