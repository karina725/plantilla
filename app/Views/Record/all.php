<?php setlocale(LC_TIME, "esp"); ?>
<div class="container">
    <?php if(isset(session()->user)){ ?>
        <h2>Subir Archivos</h2>
        <form action="record/add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <input name="userfile" type="file">
            <br>
            <div class="form-group">
                <input type="hidden" name="user" value="<?=session()->user?>">
                <textarea class="form-control" id="image" name="image" rows="3" placeholder="Nombre del archivo"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Adjuntar</button>
        </form>
        <br>
    <?php } ?>
    <h2>Archivos</h2>
    <?php foreach ($posts as $item): ?>
        <div class="card bg_light mb-3">
            <div class="card-body">
                <strong><?=$item['user']?></strong>
                <small><?=strftime("%A, %d de %B de %Y %I:%M",strtotime($item['posted_time']))?></small>
                <p class="card-text"><?=$item['image'];?></p>
                <img src="<?=$item['image'];?>" alt="<?=$item['image'];?>" width="300px" heigth="300px">
                <?php if((session()->user===$item['user']) || (session()->admin==1) ){ ?>
                    <br><br>
                    <a class="btn btn-primary" href="record/edit/<?=$item['id']?>" role="button">Editar</a>
                    <a class="btn btn-danger" href="record/delete/<?=$item['id']?>" role="button">Borrar</a>
                <?php } ?>
            </div>   
        </div>
    <?php endforeach; ?>
</div>