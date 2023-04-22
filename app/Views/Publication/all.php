<?php setlocale(LC_TIME, "esp"); ?>
<div class="container">
    <?php if(isset(session()->user)){ ?>
        <h2>Crear publicación</h2>
        <form action="publication/add" method="post">
            <div class="form-group">
                <input type="hidden" name="user" value="<?=session()->user?>">
                <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
        <br>
    <?php } ?>
    <h2>Publicaciones</h2>
    <?php foreach ($posts as $item): ?>
        <div class="card bg_light mb-3">
            <div class="card-body">
                <strong><?=$item['user']?></strong>
                <small><?=strftime("%A, %d de %B de %Y %I:%M",strtotime($item['posted_time']))?></small>
                <p class="card-text"><?=$item['content'];?></p>
                <?php if((session()->user===$item['user']) || (session()->admin==1) ){ ?>
                    <a class="btn btn-primary" href="publication/edit/<?=$item['id']?>" role="button">Editar</a>
                    <a class="btn btn-danger" href="publication/delete/<?=$item['id']?>" role="button">Borrar</a>
                <?php } ?>
            </div>   
        </div>
    <?php endforeach; ?>
</div>