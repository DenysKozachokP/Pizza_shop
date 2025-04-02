<?php
use models\Basket;
$this->Title = 'Кошик';

?>
<link href="/css/basket/basketIndex.css" rel="stylesheet">

<h3>Кошик</h3>
<?php if (!empty($confirm_message)) :?>
    <div class="alert alert-success" role="alert">
        <?= $confirm_message ?>
    </div>
<?php endif; ?>
<?php if (!empty($error_message)) :?>
    <div class="alert alert-danger" role="alert">
        <?= $error_message ?>
    </div>
<?php endif; ?>
<div class="shopping-cart" style="background-color: #ffffff;;z-index:999;">
    
    <?php 
        $prodArray = Basket::showProdacts();
        if (!empty($prodArray)) {
            foreach($prodArray as $row) {
                echo $row;
            }
        } else {
            echo "Ви не додали жодного предмету до кошику";
        }
        ?>
</div



