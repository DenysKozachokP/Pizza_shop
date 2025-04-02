<?php
use models\Fishing;
$this->Title = 'Риболовні товари';
?>
<link href="/css/fishing/fishingAdd.css" rel="stylesheet">
<form method="post" enctype="multipart/form-data">
  <div class="containerForAdding">
    <legend>Видалення товару з бази даних</legend>
    <div class="mb-3">
      <label for="InputId" class="form-label">Введіть ID товару який хочете видалити з бази даних</label>
      <input value="<?= $this->controller->post->id ?>" name="id" type="text" class="form-control" id="InputId" placeholder="Name">
    </div>
    <button type="submit" class="btn btn-primary">Видалити</button>
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