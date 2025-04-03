<?php

use models\Products;


?>
<style>
     .Contcard {
        height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         justify-items: center;
     }
     .card {
         width: 500px;
         margin: 10px;
         border: 1px solid #ddd;
         border-radius: 5px;
         overflow: hidden;
         box-shadow: 0 4px 8px rgba(0,0,0,0.1);
         height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         justify-items: center;
     }
     .card-img {
         width: 380px;
         height: 380px;
         object-fit: cover;
     }
     
 </style>
    <div class="Contcard">
    <?php

    echo Products::createContainerProd($_GET['id']);
    ?>
    </div>