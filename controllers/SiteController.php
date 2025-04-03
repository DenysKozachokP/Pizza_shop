<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace controllers;

use core\Controller;

class SiteController extends Controller
{
    public function actionIndex(){
        return $this->render();
    }
}
?>