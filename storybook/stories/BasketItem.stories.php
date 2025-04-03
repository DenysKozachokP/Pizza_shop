<?php
require_once '../components/BasketItem.php';

$stories = [
    'Default Basket Item' => [
        'id' => 1,
        'idbasket' => 101,
        'name' => 'Fishing Rod Pro',
        'description' => 'High quality fishing rod for professionals',
        'price' => 1200,
        'discount' => 0,
        'imgPath' => '/img/fishing/rod.jpg'
    ],
    'Basket Item with Discount' => [
        'id' => 2,
        'idbasket' => 102,
        'name' => 'Fishing Reel Elite',
        'description' => 'Premium fishing reel with smooth mechanism',
        'price' => 800,
        'discount' => 15,
        'imgPath' => '/img/fishing/reel.jpg'
    ],
    'Multiple Quantity Item' => [
        'id' => 3,
        'idbasket' => 103,
        'name' => 'Fishing Lure Set',
        'description' => 'Set of 10 professional fishing lures',
        'price' => 350,
        'discount' => 10,
        'imgPath' => '/img/fishing/lures.jpg',
        'quantity' => 3
    ]
];
?>

<div class="storybook">
    <h1>Basket Item Stories</h1>
    <?php foreach ($stories as $title => $props): ?>
        <div class="story">
            <h2><?= $title ?></h2>
            <div class="component">
                <?= renderBasketItem($props) ?>
            </div>
            <div class="props">
                <h3>Properties:</h3>
                <pre><?= htmlspecialchars(json_encode($props, JSON_PRETTY_PRINT)) ?></pre>
            </div>
        </div>
    <?php endforeach; ?>
</div>