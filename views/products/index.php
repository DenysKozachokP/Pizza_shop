<?php
use models\Products;
$this->Title = 'Риболовні товари';
if (isset($_GET['page'])){
    $page = $_GET['page'];
    $count = 24;   
}
?>

<link href="/css/fishing/fishingIndex.css" rel="stylesheet">

<?php if (isset($_GET['page']) && isset($_GET['basket'])) :?>
        <div class="alert alert-success" role="alert">
            <?= "Додано до кошику" ?>
        </div>
<?php endif; ?>

<div class="container-for-card" style="display: flex;flex-wrap: wrap;background-color: #ffffff;;z-index:999;">
    <?php
    if ($this->controller->post->search != null && strlen($this->controller->post->search) > 0){
        $prodArray = Products::showProdacts(Products::FindAll());
    }
    else{
        $prodArray = Products::showProdacts(Products::FindAll());

    }

    if (!empty($prodArray)) {
        for ($i = $page * $count; $i < ($page + 1) * $count; $i++) {
            if (empty($prodArray[$i]))
                break;
            echo $prodArray[$i];
        }
    } else {
        echo "No products found.";
    }
    ?>
</div>
    
</div>

