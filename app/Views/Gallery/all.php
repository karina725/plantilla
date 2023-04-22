<?php setlocale(LC_TIME, "esp"); ?>
<div class="container">
    <h2>Galería</h2>
    <?php foreach ($posts as $item): ?>
        <?php if((session()->user===$item['user']) || (session()->admin==1) ){ ?>
            <img src="<?=$item['image'];?>" alt="<?=$item['image'];?>" width="300px" heigth="300px">
        <?php } ?>
    <?php endforeach; ?>
</div>