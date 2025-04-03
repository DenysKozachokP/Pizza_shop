<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace controllers;

use core\Controller;
use core\Core;
use models\Products;
use models\Basket;
use models\Users;

class ApiController extends Controller
{
    public function actionProducts()
    {
        header('Content-Type: application/json');
        $products = Products::FindAll();
        echo json_encode($products);
    }

    public function actionBasket()
    {
        header('Content-Type: application/json');
        
        if (!Users::IsUserLoged()) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        $productId = $data['product_id'] ?? null;
        $quantity = $data['quantity'] ?? 1;
        
        if (!$productId || !Products::FindById($productId)) {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
            return;
        }
        
        $login = Core::get()->session->get('login');
        Basket::AddIteamToBasket($productId, $login);
        
        echo json_encode(['success' => true]);
    }
}