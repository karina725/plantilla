<div class="container">
    <?php if(isset(session()->login_error)){ ?>
        <div class="alert alert-danger" role="alert">
            <?=session()->login_error?>
        </div>
    <?php } ?>
    <h2>Iniciar sesión</h2>
    <form action="login" method="post">
        <div class="form-group">
            <label for="login">Nombre de usuario</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>