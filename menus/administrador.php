
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de documentación</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" href="../img/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
    <div id="mySidebar" class="sidebar">
        <h3 class="username">
           
        </h3>
        <a href="../admin/seccion1.php">Documentación de Ingeniería</a>
        <a href="seccion2.php">Documentación de Proveedores</a>
        <a href="seccion3.php">Documentación del Sistema de Gestion de Calidad</a>
        <a href="seccion4.php">Documentación de Clientes</a>
        <a href="seccion5.php">Normas y manuales</a>
        <div class="logout-message">
            <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>

        </div>
    </div>

    <header class="header">
        <div class="header-logo">
            <img src="..\img\logobanner.png" alt="Logo de la empresa">
        </div>
        <span id="openNav" onclick="openNav()">&#9776;</span>
        <!--  -->
        <div class="search-container">
            <i class="fa fa-search"></i>
            <input type="search" placeholder="Busca tu Archivo" id="Buscador" />
        </div>
        <!--  -->
        <nav class="header-nav">
            <ul>
                <!-- Sección 1 -->
                <li><a href="#" id="openModal">
                        <img src="..\img\subir-archivo.png" alt="Imagen" id="imagenBoton">
                    </a></li>

                <!-- Sección 2 -->
                <li><a href="#" id="openModal2">
                        <img src="..\img\agregar-usuario.png" alt="Imagen" class="imagenBoton">
                    </a></li>

                <!-- Sección 3 -->
                <li><a href="#" id="openModal3">
                        <img src="..\img\quitar-usuario.png" alt="Imagen" id="imagenBoton">
                    </a></li>

                <!-- Sección 4 -->
                <li><a href="#" id="openModal4">
                        <img src="..\img\subir-libreria.png" alt="Imagen" id="imagenBoton">
                    </a></li>

                <!-- Sección 5 -->
                <li><a href="#" id="openModal5">
                        <img src="..\img\eliminar-libreria.png" alt="Imagen" id="imagenBoton">
                    </a></li>


                s


                <!-- //////////////////////////VENTANAS EMERGENTE////////////////////// -->
                <div id="modal_container" class="modal-container">
                    <div class="modal">
                        <div id="file-upload-container">
                            <h1 id="form-title">Carga de Archivos</h1>

                            <div class="file-upload">

                                <input type="file" id="file-input" class="file-input" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="preview">
                                <div class="file-preview">
                                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                    <span class="file-name">Ningún archivo seleccionado</span>
                                </div>
                            </div>
                            <br>
                            <textarea class="comment-input1" rows="4" placeholder="Agrega una descripción"></textarea>
                            <br>
                            <label for="file-input" class="file-label">
                                <i class="fa fa-file-text fa-lg"></i> Seleccionar Archivo
                            </label>
                            <button class="upload-button" disabled><i class="fa fa-upload fa-lg"></i>Subir
                                Archivo</button>
                        </div>
                        <button id="close" class="close-button">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>
                <!----------------------------------------- SECTION 2 ------------------------------------------->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['registro_completado'])) {
                    include '../bd/conexion.php';

                    $Nombre = $_POST['Nombre'];
                    $NombreUsuario = $_POST['NombreUsuario'];
                    $Correo = $_POST['Correo'];
                    $Contrasena = $_POST['Contrasena'];
                    $Tipo = $_POST['Tipo'];
                    $Departamento = $_POST['Departamento'];

                    try {
                        $query = "INSERT INTO Usuarios (Nombre, NombreUsuario, Correo, Contrasena, Tipo, Departamento) 
        VALUES (:Nombre, :NombreUsuario, :Correo, :Contrasena, :Tipo, :Departamento)";

                        $statement = $conexion->prepare($query);
                        $parameters = array(
                            ':Nombre' => $Nombre,
                            ':NombreUsuario' => $NombreUsuario,
                            ':Correo' => $Correo,
                            ':Contrasena' => $Contrasena,
                            ':Tipo' => $Tipo,
                            ':Departamento' => $Departamento
                        );

                        $statement->execute($parameters);
                        header("Location: ../admin/seccion1.php");
                        exit;
                    } catch (PDOException $exp) {
                        echo "Error: " . $exp->getMessage();
                    }
                }
                ?>

                <div id="modal_container2" class="modal-container">
                    <div class="modal">
                        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600'
                            rel='stylesheet' type='text/css'>
                        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

                        <div class="testbox">
                            <h1>Nuevo Usuario</h1>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <label id="icon" for="Correo"><i class="icon-envelope"></i></label>
                                <input type="text" name="Correo" id="Correo" placeholder="Correo" required />
                                <label id="icon" for="Nombre"><i class="icon-user"></i></label>
                                <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" required />
                                <label id="icon" for="NombreUsuario"><i class="icon-user"></i></label>
                                <input type="text" name="NombreUsuario" id="NombreUsuario" placeholder="Nombre Usuario"
                                    required />
                                <label id="icon" for="Contrasena"><i class="icon-shield"></i></label>
                                <input type="password" name="Contrasena" id="Contrasena" placeholder="Contraseña"
                                    required />
                                <div class="Tipo">
                                    <input type="radio" value="Usuario" id="Usuario" name="Tipo" checked />
                                    <label for="Usuario" class="radio">Usuario</label>
                                    <input type="radio" value="Administrador" id="Administrador" name="Tipo" />
                                    <label for="Administrador" class="radio">Administrador</label>
                                </div>
                                <select class="select" name="Departamento">
                                    <option label="Selecciona departamento" value="" selected="selected"></option>
                                    <option value="Ingenieria">Ingeniería</option>
                                    <option value="Contaduria">Contaduría</option>
                                    <option value="Calidad">Calidad</option>
                                    <option value="Sistemas">Sistemas</option>
                                </select><br>
                                <button type="submit" id="buttons">Registrar</button>
                            </form>
                        </div>
                        <button id="close2" class="close-button">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------->
                <!----------------------------------------- SECTION 3 ------------------------------------------->
                <div id="modal_container3" class="modal-container">
                    <div class="modal">
                        <h1>Eliminar Usuario</h1>

                        <div id='search-box'>
                            <form action='/search' id='search-form' method='get' target='_top'>
                                <input id='search-text' name='q' placeholder='Escribe nombre de usuario' type='text' />
                                <button id='search-button' disabled><span><i class="fa fa-search"
                                            style="color: #ffffff;"></i></span></button>
                            </form>
                        </div>

                        <div id="userList">
                            <?php
                            try {
                                $conexion = new PDO("sqlsrv:server=localhost\plasticos4;database=PlastiDocs", "sa", "Plasticos123");
                                $query = "SELECT * FROM Usuarios";
                                $statement = $conexion->query($query);
                                $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

                                if ($resultados) {
                                    foreach ($resultados as $usuario) {
                                        echo "<div class='userItem' data-id='" . $usuario['id'] . "'>";
                                        echo "<p><b>Nombre usuario: </b>" . $usuario['NombreUsuario'];
                                        echo " <b>Tipo:</b>" . $usuario['Tipo'];
                                        echo " <b>Departamento:</b>" . $usuario['Departamento'];
                                        echo "</p></div>";
                                    }
                                } else {
                                    echo "<p>No se encontraron usuarios.</p>";
                                }
                            } catch (PDOException $exp) {
                                echo "Error: " . $exp->getMessage();
                            }
                            ?>
                        </div>
                        <button id="deleteUserButton" class="deleteButton" type="post">Eliminar Usuario</button>
                        <button id="close3" class="close-button">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------->
                <!----------------------------------------- SECTION 4 ------------------------------------------->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['registro_completado'])) {
                    include '../bd/conexion.php';

                    $nombre = $_POST['nombre'];
                    $ruta = $_POST['ruta'];
                    $descripcion = $_POST['descripcion'];

                    try {
                        $query = "INSERT INTO librerias (nombre, ruta, descripcion) VALUES (:nombre, :ruta, :descripcion)";
                        $statement = $conexion->prepare($query);
                        $parameters = array(
                            ':nombre' => $nombre,
                            ':ruta' => $ruta,
                            ':descripcion' => $descripcion
                        );

                        $statement->execute($parameters);
                        echo "Librería creada exitosamente.";
                    } catch (PDOException $exp) {
                        echo "Error: " . $exp->getMessage();
                    }
                }
                ?>

                <div id="modal_container4" class="modal-container">
                    <div class="modal">
                        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600'
                            rel='stylesheet' type='text/css'>
                        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

                        <div class="testbox">
                            <h1>Nueva Libreria</h1>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                <label id="icon" for="name"><i class="fa fa-folder"></i></label>
                                <input type="text" name="nombre" id="name" placeholder="Nombre librería" required />
                                <label id="icon" for="name"><i class="fa fa-archive"></i></label>
                                <input type="text" name="ruta" id="name" placeholder="Nombre ruta" required />
                                <div class="gender"></div>
                                <br>
                                <textarea class="comment-input" rows="4" placeholder="Agrega una descripción"
                                    name="descripcion"></textarea>
                                <br>
                                <button type="submit" id="createLibraryButton">Crear</button>
                            </form>
                        </div>
                        <button id="close4" class="close-button">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------->
                <!----------------------------------------- SECTION 5 ------------------------------------------->
                <div id="modal_container5" class="modal-container">
                    <div class="modal">
                        <h1>Eliminar Libreria</h1>

                        <!-- Cuadro de Texto de Búsqueda -->
                        <div id='search-box1'>
                            <form action='/search' id='search-form1' method='get' target='_top'>
                                <input id='search-text1' name='q' placeholder='Escribe nombre de la libreria'
                                    type='text' />
                                <button id='search-button1' disabled><span><i class="fa fa-search"
                                            style="color: #ffffff;"></i></span></button>
                            </form>
                        </div>

                        <!-- Lista de Libreria -->
                        <div id="libreriaList1">
                            <div class="libreriaItem">Libreria 1</div>
                        </div>

                        <!-- Botón para Eliminar Libreria -->
                        <button id="deletelibreriaButton1" class="deleteButton1">Eliminar Libreria</button> <!--  -->
                        <button id="close5" class="close-button">
                            <span>&times;</span>
                        </button>
                    </div>

                </div>
                <!------------------------------------------------------------------------------------------------->
                <!----------------------------------------- SECTION RECHAZO DE SOLICITUD ------------------------------------------->
                <div id="modal_container6" class="modal-container">
                    <div class="modal">
                        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600'
                            rel='stylesheet' type='text/css'>
                        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

                        <div class="testbox">
                            <h1>Comentarios</h1>
                            <form action="/">
                                <br>
                                <textarea class="comment-input" rows="4"
                                    placeholder="Agrega una descripción"></textarea>
                                <br>
                                <a href="#" class="button">Enviar</a>
                            </form>
                        </div>
                    </div>
                    <button id="close6" class="close-button">
                        <span>&times;</span>
                    </button>
                </div>
                <!------------------------------------------------------------------------------------------------->

            </ul>
        </nav>
    </header>
    <br>
    <script src="../js/script.js"></script>
</body>

</html>