<?php
namespace models;

use core\Model;
use core\Core;
/**
 * @property int $id id
 * @property string $type Тип продукту
 * @property string $name Назва продукту
 * @property string $description характиристики
 * @property int $count Кількість
 * @property int $discount Знижка
 * @property float $price Ціна
 * @property string $imgPath Фото
 */
class Fishing extends Model
{  
    public static $tableName = "fishing_prodacts";

    public static $prodactsArray = [" type = 'reel' "," type = 'rod' "," type = 'accessories' "," type = 'equipment' "];
    public static $OrderBy = "";

    
    public static function createTable($rows) {
        $table = '<table>';
        $table .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Count</th>
                        <th>Discount</th>
                        <th>Price</th>
                        <th>ImagePath</th>
                        <th>Image</th>
                    </tr>
                   </thead>
                   <tbody>';
        foreach ($rows as $row) {
            $table .= '<tr>';
            $table .= '<td>' . "{$row['id']}" . '</td>';
            $table .= '<td>' . "{$row['type']}" . '</td>';
            $table .= '<td>' . "{$row['name']}" . '</td>';
            $table .= '<td>' . "{$row['description']}" . '</td>';
            $table .= '<td>' . "{$row['count']}" . '</td>';
            $table .= '<td>' . "{$row['discount']}" . '</td>';
            $table .= '<td>' . "{$row['price']}" . '</td>';
            $table .= '<td>' . "{$row['imgPath']}" . '</td>';
            $table .= '<td><img src="' . "{$row['imgPath']}" . '" alt="Image" style="width: 50px;height: 50px;"></td>';
            $table .= '</tr>';
        }
        $table .= '</tbody></table>';
        return $table;
    }
    public static function ShowTable()
    {
        $rows = self::FindAll();
        $contentArray = array();
        if (!empty($rows))
        {
            $str = Fishing::createTable($rows);
            $contentArray[] = $str;
            return $contentArray;
        }
        else
        {
            return null;
        }
    }

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
        else if ($row["count"] > 0)
            $strButton = "<a href='/basket/add?id={$row["id"]}' class='btn btn-primary'>Додати до кошику</a>"; 
        else
            $strButton = "<a href='#' class='btn btn-secondary disabled'>Немає в наявності</a>";
        return "<div class='card' style='width: 220px; margin: 10px;'>
            <a href='/fishing/prod?id={$row["id"]}'><img src='{$row["imgPath"]}' class='card-img-top' alt='фото продукту' style='width: 180px;height: 180px;'></a>
            <div class='card-body'>
            <h5 class='card-title'>Назва : {$row["name"]}</h5>
            <p class='card-text'>Опис : {$row["description"]}</p>
                ".$strNewPrice ."
            
            <p class='card-text'>Наявна кількість : {$row["count"]}</p>"
            . $strButton . "
            </div>
        </div>";
    }
    public static function createContainerProd($id){
        $row = Fishing::FindById($id);
        $strNewPrice = '';
        if ($row["discount"] > 0){
            $NewPrice = round($row["price"] - ($row["price"] * $row["discount"]/100), 2);
            $strNewPrice = "<s><p class='card-text' style='font-size: 20px;color: red;'>Ціна: {$row['price']}</p></s>
            <p class='card-text' style='font-size: 16px;color: green;'>Ціна:$NewPrice</p> <p class='card-text' style='font-size: 19px;color: green;' >Знижка : {$row["discount"]}%</p>";
        }
        $strButton = '';
        if (!Users::IsUserLoged())
            $strButton = "<a href='#' class='btn btn-secondary disabled'>Щоб купити залогіньтесь</a>";
        else if ($row["count"] > 0)
            $strButton = "<a href='/basket/add?id={$row["id"]}' class='btn btn-primary'>Додати до кошику</a>"; 
        else
            $strButton = "<a href='#' class='btn btn-secondary disabled'>Немає в наявності</a>";
        return "<div class='card'>
        <div class='card-img'>
            <img src='{$row["imgPath"]}' class='card-img' alt='фото продукту'>
        </div>
        <div class='card-body'>
            <h5 class='card-title'>Назва : {$row["name"]}</h5>
            <p class='card-text'>Опис : {$row["description"]}</p>
            <p class'card-text card-price'>Ціна: {$row["price"]}</p>
            <p class='card-text'>Наявна кількість : {$row["count"]}</p>
            ".$strNewPrice."
            <a href='/fishing/index?page=0' class='btn btn-primary'>Повернутись</a>
            ".$strButton."
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
                $str = Fishing::createCard($row);
                $contentArray[] = $str;
            }
            return $contentArray;
        }
        else
        {
            return null;
        }
    }
    public static function PageCount()
    {
        return ceil(count(self::FindAll())/ 24);
    }
    public static function ProdCount()
    {
        return count(self::FindAll());
    }

    public static function UploadPhoto($image, $target_dir)
    {
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($image["tmp_name"]);
        $allowed_formats = array("jpg", "jpeg", "png", "gif");
        if($check === false || file_exists($target_file) || $image["size"] > 500000 || !in_array($imageFileType, $allowed_formats) || $uploadOk == 0) {
            //echo "Помилка завантаження";
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                //echo "The file " . htmlspecialchars(basename($image["name"])) . " has been uploaded.";
            }
        }
    }
    public static function AddProdacts($type, $name, $description, $count, $discount, $price, $imgPath){
        $fishing = new Fishing();
        $fishing->type = $type;
        $fishing->name = $name;
        $fishing->description = $description;
        $fishing->count = $count;
        $fishing->discount = $discount;
        $fishing->price = $price;
        $fishing->imgPath = $imgPath;
        $fishing->save();
    }
}
?>