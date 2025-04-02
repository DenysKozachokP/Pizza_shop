<?php
use models\Purchase;
$this->Title = 'Риболовні товари';
?>

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

<?php if (!empty($confirm_message)) :?>
    <div class="alert alert-success" role="alert">
        <?= $confirm_message ?>
    </div>
<?php endif; ?>
<?php if (!empty($warning_message)) :?>
    <div class="alert alert-warning" role="alert">
        <?= $warning_message ?>
    </div>
<?php endif; ?>

<form action="POST">
    <?php
        if (!empty(Purchase::ShowTableReport()[0]))
            echo Purchase::ShowTableReport()[0];
        else 
            echo "Замовлень немає";
    ?>
</form>
