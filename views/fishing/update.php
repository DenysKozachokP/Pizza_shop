<?php
use models\Fishing;
$this->Title = 'Риболовні товари';
?>
<link href="/css/fishing/fishingAdd.css" rel="stylesheet">
<form method="post" enctype="multipart/form-data">
  <div class="containerForAdding">
    <legend>Оновлення товару в базі даних</legend>
    <div class="mb-3">
      <label for="InputId" class="form-label">Id</label>
      <input value="<?= $this->controller->post->id ?>" name="id" type="text" class="form-control" id="InputId" placeholder="Id">
    </div>
    <div class="mb-3">
      <label for="InputType" class="form-label">Виберіть поле для оновлення</label>
      <select id="InputType" class="form-select" name="type">
        <option>type</option>
        <option>name</option>
        <option>description</option>
        <option>count</option>
        <option>discount</option>
        <option>price</option>
        <option>imgPath</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="inputChange" class="form-label">Введіть значення для змін</label>
      <input value="<?= $this->controller->post->changeValue ?>" name="changeValue" id="inputChange" type="text" class="form-control" placeholder="">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>

<style>
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        text-align: center;
    }

    th,
    td {
        border: 1px solid #dddddd;
        padding: 12px;
        width: 12.5%;
    }

    th {
        background-color: #4c7faf;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    img {
        max-width: 100px;
        height: auto;
    }
</style>
<?php
echo Fishing::ShowTable()[0];
?>