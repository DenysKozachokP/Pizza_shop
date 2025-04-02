<?php
namespace models;

use core\Model;
use core\Core;


require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * @property int $id id
 * @property int $idProd id продукту
 * @property string $login Логін
 * @property string $email Email
 * @property float $cost Ціна
 * @property int $discost Знижка
 * @property float $finalPrice Фінальна ціна
 * @property int $count Кількість
 * @property string $dateReport Час
 * @property string $accepted Відзнака виконання замовлення
 */
class Purchase extends Model
{  
    public static $tableName = "purchase_report";

    public static function registerPurchaseReport($idProd, $login,$email,$cost,$discount,$finalPrice,$count)
    {
        $purchase = new Purchase();
        $purchase->idProd = $idProd;
        $purchase->login = $login;
        $purchase->email = $email;
        $purchase->cost = $cost;
        $purchase->discount = $discount;
        $purchase->finalPrice = $finalPrice;
        $purchase->count = $count;
        $purchase->dateReport = date('Y-m-d H:i:s');
        $purchase->accepted = 'false';
        $purchase->save();
    }
    public static function createTableReport($rows)
    {
        $button = '';
        $table = '<table>';
        $table .= '<thead>
                    <tr>
                        <th>ID</th>
                        <th>IdProdacts</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>FinalPrice</th>
                        <th>Count</th>
                        <th>DateReport</th>
                        <th>ButtonAccept</th>
                        <th>ButtonDelete</th>
                    </tr>
                   </thead>
                   <tbody>';
        foreach ($rows as $row) {
            if ($row['accepted'] == 'false'){
                $button = "<a href='/purchase/sendList?id={$row["id"]}' class='btn btn-primary' name='{$row['id']}'>Прийняти замовлення</a>";
            }else{
                $button = "<a href='/purchase/sendList?id={$row["id"]}' class='btn btn-secondary disabled' name='{$row['id']}'>Прийняте</a>";
            }
            $table .= '<tr>';
            $table .= '<td>' . "{$row['id']}" . '</td>';
            $table .= '<td>' . "{$row['idProd']}" . '</td>';
            $table .= '<td>' . "{$row['login']}" . '</td>';
            $table .= '<td>' . "{$row['email']}" . '</td>';
            $table .= '<td>' . "{$row['cost']}" . '</td>';
            $table .= '<td>' . "{$row['discount']}" . '</td>';
            $table .= '<td>' . "{$row['finalPrice']}" . '</td>';
            $table .= '<td>' . "{$row['count']}" . '</td>';
            $table .= '<td>' . "{$row['dateReport']}" . '</td>';
            $table .= '<td>' . $button . '</td>';
            $table .= '<td>'. "<a href='/purchase/delList?id={$row["id"]}' class='btn btn-primary' name='{$row['id']}'>Видалити</a>" . '</td>';
            $table .= '</tr>';
        }
        $table .= '</tbody></table>';
        return $table;
        
    }
    public static function ShowTableReport()
    {
        $rows = self::FindAll();
        $contentArray = array();
        if (!empty($rows))
        {
            $str = Purchase::createTableReport($rows);
            $contentArray[] = $str;
            return $contentArray;
        }
        else
        {
            return null;
        }
    }
}