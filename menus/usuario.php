<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de documentación</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" href="../img/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>
    <div id="mySidebar" class="sidebar">
        <h3 class="username"><?php echo $_SESSION['username']; ?></h3>   
        <a href="seccionU1.php">Documentación de Ingeniería</a>
        <a href="seccionU2.php">Documentación de Proveedores</a>
        <a href="seccionU3.php">Documentación del Sistema de Gestion de Calidad</a>
        <a href="seccionU4.php">Documentación de Clientes</a>
        <a href="seccionU5.php">Normas y manuales</a>
        <div class="logout-message">
            <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>

        </div>
    </div>

    <header class="header">
        <div class="header-logo">
            <img src="..\img\logo.png" alt="Logo de la empresa">
        </div>
        <span id="openNav" onclick="openNav()">&#9776;</span>
        <!--  -->
        <div class="search-container">
            <i class="fa fa-search"></i>
            <input type="search" placeholder="Busca tu Archivo" id="Buscador" />
        </div>
        <div id="resultados" class="resultados"></div>
        <!--  -->
        <nav class="header-nav">
            <ul>
                <!-- Sección 1 -->
                <li><a href="#" id="openModal">
                        <img src="..\img\subir-archivo.png" alt="Imagen" id="imagenBoton">
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
            </ul>
        </nav>
    </header>
    <br>
<body>
<script src="../js/script.js"></script>
</body>
</html>