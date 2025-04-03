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
 * @property string $name Назва продукту
 * @property string $description характиристики
 * @property int $discount Знижка
 * @property float $price Ціна
 */
class Products extends Model
{  
    public static $tableName = "products";

    public static function createCard($row)
    {
        $strNewPrice = '';
        if ($row["discount"] > 0){
            $NewPrice = round($row["price"] - ($row["price"] * $row["discount"]/100), 2);
            $strNewPrice = "<s><p class='card-text' style='font-size: 20px;color: red;'>Ціна: {$row['price']}</p></s>
            <p class='card-text' style='font-size: 16px;color: green;'>Ціна:$NewPrice</p> <p class='card-text' style='font-size: 19px;color: green;' >Знижка : {$row["discount"]}%</p>";
        }
        else{
            $strNewPrice = "<p class='card-text style='font-size: 20px;'>Ціна:{$row["price"]}</p>";
        }
        $strButton = '';
        if (!Users::IsUserLoged())
            $strButton = "<a href='#' class='btn btn-secondary disabled'>Щоб купити залогіньтесь</a>";
        else 
            $strButton = "<a href='/basket/add?id={$row["id"]}' class='btn btn-primary'>Додати до кошику</a>"; 
        return "<div class='card' style='width: 220px; margin: 10px;'>
            <a href='/fishing/prod?id={$row["id"]}'><img src='{$row["imgPath"]}' class='card-img-top' alt='фото продукту' style='width: 180px;height: 180px;'></a>
            <div class='card-body'>
            <h5 class='card-title'>Назва : {$row["name"]}</h5>
            <p class='card-text'>Опис : {$row["description"]}</p>
                ".$strNewPrice .""
            . $strButton . "
            </div>
        </div>";
    }
    public static function showProdacts($rows)
    {
        $contentArray = array();
        if (!empty($rows))
        {
            foreach($rows as $row)
            {
                $str = Products::createCard($row);
                $contentArray[] = $str;
            }
            return $contentArray;
        }
        else
        {
            return null;
        }
    }
    public static function AddProdacts($name, $description, $count, $discount, $price, $imgPath){
        $products = new Products();
        $products->name = $name;
        $products->description = $description;
        $products->discount = $discount;
        $products->price = $price;
        $products->imgPath = $imgPath;
        $products->save();
    }
}
?>