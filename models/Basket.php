<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace models;

use core\Model;
use core\Core;
/**
 * @property int $id id
 * @property int $id_prod id продукту
 * @property string $login Логін
 */
class Basket extends Model
{  
    public static $tableName = "basket";

    public static function ShowAllProdInBasket()
    {
        return Basket::FindProdactsByLogin(Core::get()->session->get('login'));
    }
 
    public static function AddIteamToBasket($id_prod, $login)
    {
        $basket = new Basket();
        $basket->id_prod = $id_prod;
        $basket->login = $login;
        $basket->save();
    }
    public static function createBaskets($row)
    {
        $strNewPrice = '';
        if ($row["discount"] > 0){
            $NewPrice = round($row["price"] - ($row["price"] * $row["discount"]/100), 2);
            $strNewPrice = "<s><p class='card-text' style='font-size: 20px;color: red;'>Ціна: {$row['price']}</p></s>
            <p class='card-text' style='font-size: 16px;color: green;'>Ціна:$NewPrice</p>";
        }
        else{
            $strNewPrice = "<p class='card-text style='font-size: 20px;'>Ціна:{$row["price"]}</p>";
        }
        $str = "<button name='but' value='1' type='submit' class='btn btn-primary'>Купити</button>";
        return "<form method='POST'>
        <div class='container-for-card'>
        <div class='card' id='{$row["id"]}'>
            <div class='card-horizontal'>
                <div class='img-square-wrapper'>
                    <p class='card-text' style='font-size:16px; font-weight: bold; color: #6c757d;'>№ замовлення {$row["idbasket"]}</p>
                    <img src='{$row["imgPath"]}' class='card-img-top' alt='фото продукту'>
                </div>
                <div class='card-body'>
                
                    <input type='hidden' name='idValue' value='{$row["id"]}'>
                    <input type='hidden' name='idBasket' value='{$row["idbasket"]}'>
                    <h5 class='card-title'>Назва: {$row["name"]}</h5>
                    <p class='card-text'>Опис: {$row["description"]}</p>
                    ".$strNewPrice."
                    
                    <div class='quantity-control'>
                        <label for='InputCount' class='form-label'>Введіть кiлькість</label>
                        <input name='buyValue' id='InputCount' type='text' class='quantity-field' value='1'>
                    </div>
                    <div class='d-flex'>
                        <button name='but' value='0' type='submit' class='btn btn-outline-secondary'>Видалити з кошику</button>
                        ". $str ."
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>";
    }

    public static function showProdacts()
    {
        $rows = Basket::FindProdactsByLogin(Core::get()->session->get('login'));
        $contentArray = array();
        if (!empty($rows))
        {
            foreach($rows as $row)
            {
                $str = Basket::createBaskets($row);
                $contentArray[] = $str;
            }
            return $contentArray;
        }
        else
        {
            return null;
        }
    }
}