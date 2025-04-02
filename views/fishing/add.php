<?php
use models\Fishing;
$this->Title = 'Риболовні товари';
?>
<link href="/css/fishing/fishingAdd.css" rel="stylesheet">

<?php if (!empty($error_message)) :?>
  <div class="alert alert-danger" role="alert">
    <?= $error_message ?>
  </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
  <div class="containerForAdding">
    <legend>Додання товару до бази даних</legend>
    <div class="mb-3">
      <label for="InputType" class="form-label">Тип</label>
      <select id="InputType" class="form-select" name="typeAdd">
        <option>rod</option>
        <option>reel</option>
        <option>accessories</option>
        <option>equipment</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="InputName" class="form-label">Назва</label>
      <input name="name" type="text" class="form-control" id="InputName" placeholder="Name">
    </div>
    <div class="mb-3">
      <label for="inputDesc" class="form-label">Опис</label>
      <input name="description" id="inputDesc" type="text" class="form-control" placeholder="Description">
    </div>
    <div class="mb-3">
      <label for="inputCount" class="form-label">Наявна кількість на складі</label>
      <input name="count" id="inputCount" type="text" class="form-control" placeholder="Count">
    </div>
    <div class="mb-3">
      <label for="inputDiscount" class="form-label">Знижка</label>
      <input name="discount" id="inputDiscount" type="text" class="form-control" placeholder="Discount">
    </div>
    <div class="mb-3">
      <label for="inputPrice" class="form-label">Ціна</label>
      <input name="price" id="inputPricec" type="text" class="form-control" placeholder="Price">
    </div>
    <div class="mb-3">
      <input type="file" name="fileToUpload" id="fileToUpload">
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
th, td {
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