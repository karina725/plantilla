<div class="container">
    <?php if((session()->user===$posts['user']) || (session()->admin==1) ){ ?>
        <h2>Actualizar archivo</h2>
        <form action="" method="post">
            <div Class="form-group">
                <input type="hidden" name="id" value="<?=$posts['id']?>">
                <textarea class="form-control" name="image" rows="3" placeholder="Escribe algo"><?=$posts['image'];?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        <br>
    <?php }else{ ?>
        <div class="alert alert-danger" role="alert">No tienes permiso.</div>
    <?php } ?>
</div>