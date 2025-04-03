<?php
function renderBasketItem($props) {
    $strNewPrice = '';
    if ($props["discount"] > 0){
        $NewPrice = round($props["price"] - ($props["price"] * $props["discount"]/100), 2);
        $strNewPrice = "<s><p class='card-text' style='font-size: 20px;color: red;'>Ціна: {$props['price']}</p></s>
        <p class='card-text' style='font-size: 16px;color: green;'>Ціна:$NewPrice</p>";
    } else {
        $strNewPrice = "<p class='card-text style='font-size: 20px;'>Ціна:{$props["price"]}</p>";
    }
    
    $str = "<button name='but' value='1' type='submit' class='btn btn-primary'>Купити</button>";
    
    return "<form method='POST'>
    <div class='container-for-card'>
    <div class='card' id='{$props["id"]}'>
        <div class='card-horizontal'>
            <div class='img-square-wrapper'>
                <p class='card-text' style='font-size:16px; font-weight: bold; color: #6c757d;'>№ замовлення {$props["idbasket"]}</p>
                <img src='{$props["imgPath"]}' class='card-img-top' alt='фото продукту'>
            </div>
            <div class='card-body'>
                <input type='hidden' name='idValue' value='{$props["id"]}'>
                <input type='hidden' name='idBasket' value='{$props["idbasket"]}'>
                <h5 class='card-title'>Назва: {$props["name"]}</h5>
                <p class='card-text'>Опис: {$props["description"]}</p>
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
?>