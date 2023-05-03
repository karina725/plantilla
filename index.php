<?php   
    $nombre = "sin nombre";
    $apellidos = "sin apellidos";
    $email = "sin email";
    $estado = "sin estado";
    $comentario = "sin comentario";
    if ( !empty($_POST['nombre']) && !empty($_POST['comentario']) ) { 
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $comentario = $_POST['comentario'];
        echo $nombre;
        echo $apellidos;
        echo $email;
        echo $estado;
        echo $comentario;

        $host = 'us-cdbr-east-06.cleardb.net';
        $user = 'b264e7f33d46d8';
        $pass = 'a4b22f42';
        $ddbb = 'heroku_63529e2d71924ab';

        $mysqli = new mysqli($host,$user,$pass);
        mysqli_select_db($mysqli,$ddbb);
        $sql = "INSERT INTO comentarios (nombre, apellidos, email, estado, comentario) VALUES ('$nombre', '$apellidos', '$email', '$estado', '$comentario')";
        $result = mysqli_query($mysqli,$sql);
    }
    /*
    CLEARDB_DATABASE_URL: mysql://b264e7f33d46d8:a4b22f42@us-cdbr-east-06.cleardb.net/heroku_63529e2d71924ab?reconnect=true
    */
    $host = 'us-cdbr-east-06.cleardb.net';
    $user = 'b264e7f33d46d8';
    $pass = 'a4b22f42';
    $ddbb = 'heroku_63529e2d71924ab';
    /*
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $ddbb = 'dbs10743387';
    */
    $mysqli = new mysqli($host,$user,$pass);
    mysqli_select_db($mysqli,$ddbb);
    $result = mysqli_query($mysqli,"SELECT * FROM comentarios");
?>
<html>
    <head>
        <title>Producto integrador - Sitio Web responsivo con Flex y Grid </title>
        <meta charset="UTF-8"/>
        <meta name="author" content="karina guadalupe barragan jara"/>
        <link type="text/css" rel="stylesheet" href="estilo/estilo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body class="sitio">
        <header class="encabezado">
            <div class="logo">
                <figure class="imagen">
                    <img src="imagen/imagen1.png" />
                </figure>
            </div>
        </header>
        <figure class="imagen">
            <img src="imagen/imagen2.jpg" alt=''>
        </figure>
        <main id="content" class="principal">
            <section class="area-central">
                <div class="area-central-contenido">
                    <h2>Nuestros Jugos</h2>
                    <div class="area-central-texto">
                        <p>Nos enorgullece ofrecer un producto de alta calidad y un servicio excepcional a nuestros clientes, y esperamos tener la oportunidad de compartir nuestra pasión por los jugos frescos y saludables con ustedes.</p>
                    </div>
                </div>
            </section>
            <section class="intermedia">
                <ul>
                    <li>
                        <img src="imagen/imagen3.jpg" alt=''>
                        <div class="area-intermedia">
                            <h3>Variedad</h3>
                            <p>En nuestro negocio tenemos una gran variedad, como lo son Naranja, Zanahoria, Toronja, Mandarina, Betabel, Verde y conbinado.</p>
                        </div>
                    </li>
                    <li>
                        <img src="imagen/imagen4.jpg" alt=''>
                        <div class="area-intermedia">
                            <h3>Jugo Verde</h3>
                            <p>El jugo verde es uno de nuestros productos mas especiales, elaborado con productos 100% naturales sin conservadores ni aditivos.</p>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="inferior">
                <div class="contenido-inferior">
                    <h2>Ubicación</h2>
                    <p>Estamos ubicados:<br>
                        Avenida Acueducto #736<br>
                        La Casita, Los Girasoles<br>
                        C.P. 45138 Zapopan, Jal.<br>
                        <p>
                </div>
            </section>
        </main>
        <aside class="lateral">
            <div class="barra-lateral">
                <h2>Horario</h2>
                <p>
                    Lun:7:00–13:00<br>
                    Mar:7:00–13:00<br>
                    Mié:7:00–13:00<br>
                    Jue:Cerrado   <br>
                    Vie:7:00–13:00<br>
                    Sáb:7:00–13:00<br>
                    Dom:8:00–13:00<br>
                </p>
            </div>
            <div class="barra-lateral">
                <h2>comentarios </h2>
                <form action="<?php $_PHP_SELF ?>" target="" method="POST" name="formComentario">
                <h3>Formulario de contacto y comentarios</h3>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"/>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"/>
                <label for="email" />Email</label>
                <input type="email" name="email" id="email" placeholder="email"/>

                <br/>
                <label for="estado">De donde nos visitas: </label>
                <select id="estado" name="estado">
                    <option value="">Estado</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Cancun">Cancun</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Guadalajra">Guadalajra</option>
                </select>

                <br/>
                <label for="comentario">Comentario</label>
                <textarea name="comentario" id="comentario" placeholder="comenta brevemente en menos de 300 carácteres" maxlength="300"></textarea>

                <input type="submit" name="enviar" value="enviar datos"/>
            </form>
            <br>
            <br>

            <h3>Comentarios de algunos clientes</h3>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($r = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$r['nombre']."</td>";
                        echo "<td>".$r['apellidos']."</td>";
                        echo "<td>".$r['email']."</td>";
                        echo "<td>".$r['comentario']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
                <p></p>
            </div>
        </aside>
        <footer class="pie-de-pagina">
            <aside>Para mayor información, visite 
            <a href="#" target="_blank" rel="nofollow">nuestro sitio</a>.
        </footer>
</body>
</html>


  
  