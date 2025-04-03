<?php
use models\Fishing;
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
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/imgForAds/4ads.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/img/imgForAds/5ads.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/img/imgForAds/6ads.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<form method="POST" class="containerFilter container mt-4" style="background-color: #ffffff;">
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
    <input name ="check1" type="checkbox" class="btn-check" id="btncheck1" autocomplete="off"<?php echo $this->controller->post->check1 === 'on' ?  'checked' : ''?>>
    <label class="btn btn-outline-primary" for="btncheck1">Катушки</label>

    <input name ="check2" type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" <?php echo $this->controller->post->check2 === 'on' ?  'checked' : ''?>>
    <label class="btn btn-outline-primary" for="btncheck2">Вудлища</label>

    <input name ="check3" type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" <?php echo $this->controller->post->check3 === 'on' ?  'checked' : ''?>>
    <label class="btn btn-outline-primary" for="btncheck3">Оснащення</label>

    <input name ="check4" type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" <?php echo $this->controller->post->check4 === 'on' ?  'checked' : ''?>>
    <label class="btn btn-outline-primary" for="btncheck4">Екіпіровка</label>
    </div>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input value="+" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"<?php echo $this->controller->post->btnradio === '+' ?  'checked' : ''?>>
        <label class="btn btn-outline-primary" for="btnradio1">Ціна за зростанням</label>

        <input value="-" type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"<?php echo $this->controller->post->btnradio === '-' ?  'checked' : ''?>>
        <label class="btn btn-outline-primary" for="btnradio2">Ціна за спаданням</label>
    </div>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input name="search" type="text" class="form-control" placeholder="Введіть назву продукту (не обов.)">
    </div>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <button type="submit" class="btn btn-outline-success">Застосувати фільтри</button>
    </div>
</form>

<div class="container-for-card" style="display: flex;flex-wrap: wrap;background-color: #ffffff;z-index:999;">
    <?php
    if ($this->controller->post->search != null && strlen($this->controller->post->search) > 0){
        $prodArray = Fishing::showProdacts(Fishing::FindByTypeDiscount(Fishing::$prodactsArray, Fishing::$OrderBy, "AND name LIKE '%{$this->controller->post->search}%'"));
    }
    else{
        $prodArray = Fishing::showProdacts(Fishing::FindByTypeDiscount(Fishing::$prodactsArray, Fishing::$OrderBy));

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
<form method="GET">
    <nav aria-label="Page navigation example">
        <div class="pagination justify-content-center">
            <?php for ($p = 0; $p < Fishing::PageCount(); $p++) :?>
                <a class="page-link" href="?page=<?php echo $p?>"><?php echo $p + 1?></a>
            <?php endfor;?>
        </div>
    </nav>
</form>