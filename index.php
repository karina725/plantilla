<?php   
    $nombre = "sin nombre";
    $apellidos = "sin apellidos";
    $email = "sin email";
    $estado = "sin jugo";
    $comentario = "sin comentario";
    if ( !empty($_POST['nombre']) && !empty($_POST['comentario']) ) { 
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $estado = $_POST['jugo'];
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
        $sql = "INSERT INTO comentarios (nombre, apellidos, email, jugo, comentario) VALUES ('$nombre', '$apellidos', '$email', '$jugo', '$comentario')";
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
                            <p>En nuestro negocio tenemos una gran variedad, como lo son Naranja, Zanahoria, Toronja, Mandarina, Betabel, Verde y combinado.</p>
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
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14925.354465229324!2d-103.4244063!3d20.7370651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428af6912ae390f%3A0xa30cd1e5e30c7d8d!2sJugos%20Jara!5e0!3m2!1ses-419!2smx!4v1683141562328!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <h2>Comentarios </h2>
                <form action="<?php $_PHP_SELF ?>" target="" method="POST" name="formComentario">
                <h3>Formulario de contacto y comentarios</h3>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"/>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"/>
                <label for="email" />Email</label>
                <input type="email" name="email" id="email" placeholder="email"/>

                <br/>
                <label for="jugo">Que jugó prefieres: </label>
                <select id="jugo" name="jugo">
                    <option value="">Jugó </option>
                    <option value="Naranja">Naranja</option>
                    <option value="Verde">Verde</option>
                    <option value="Zanahoria">Zanahoria</option>
                    <option value="Combinado">Combinado</option>
                    <option value="Mandarina">Mandarina</option>
                    <option value="Toronja">Toronja</option>
                    <option value="Betabel">Betabel</option>
                </select>

                <br/>
                <label for="comentario">Comentario</label>
                <textarea name="comentario" id="comentario" placeholder="comenta brevemente en menos de 300 carácteres" maxlength="300"></textarea>

                <input type="submit" name="enviar" value="enviar datos"/>
            </form>
            <br>
            <br>

            
                <p></p>
            </div>
        </aside>
        <footer class="pie-de-pagina">
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
            <aside>Para mayor información, visite 
            <a href="#" target="_blank" rel="nofollow">nuestro sitio</a>.
        </footer>
</body>
</html>


  
  
