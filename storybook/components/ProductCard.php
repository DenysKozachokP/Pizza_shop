<?php
function renderProductCard($props) {
    $strNewPrice = '';
    if ($props["discount"] > 0){
        $NewPrice = round($props["price"] - ($props["price"] * $props["discount"]/100), 2);
        $strNewPrice = "<s><p class='card-text' style='font-size: 20px;color: red;'>Ціна: {$props['price']}</p></s>
        <p class='card-text' style='font-size: 16px;color: green;'>Ціна:$NewPrice</p> <p class='card-text' style='font-size: 19px;color: green;' >Знижка : {$props["discount"]}%</p>";
    } else {
        $strNewPrice = "<p class='card-text style='font-size: 20px;'>Ціна:{$props["price"]}</p>";
    }
    
    $strButton = $props['isLoggedIn'] 
        ? "<a href='/basket/add?id={$props["id"]}' class='btn btn-primary'>Додати до кошику</a>"
        : "<a href='#' class='btn btn-secondary disabled'>Щоб купити залогіньтесь</a>";
        
    return "<div class='card' style='width: 220px; margin: 10px;'>
        <a href='/fishing/prod?id={$props["id"]}'><img src='{$props["imgPath"]}' class='card-img-top' alt='фото продукту' style='width: 180px;height: 180px;'></a>
        <div class='card-body'>
        <h5 class='card-title'>Назва : {$props["name"]}</h5>
        <p class='card-text'>Опис : {$props["description"]}</p>
            ".$strNewPrice .""
        . $strButton . "
        </div>
    </div>";
}
?>