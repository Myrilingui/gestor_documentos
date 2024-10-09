<?php
session_start();

if (empty($_SESSION['username'])) {

    header("Location: ../index.php");
    exit();
}

?>
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
<?php include '../menus/usuario.php'; ?>
<body>
    <main class="main">
        <section class="section">
            <div class="header-right">
                <br>
                <h2 class="section-title">Documentación Ingeniería</h2> <br>
            </div>
            <div class="section-header">
                <p class="section-content">Documentos disponibles:</p>

                <div class="header-left">
                    <a href="#">
                        <img src="..\img\filtroAz.png" alt="Imagen" id="imagenBoton">
                    </a>
                </div>

                <div class="header-left">
                    <a href="#">
                        <img src="..\img\filtrar.png" alt="Imagen" id="imagenBoton">
                    </a>
                </div>
                <div class="header-left">
                    <a href="#">
                        <img src="..\img\QuitarFiltro.png" alt="Imagen" id="imagenBoton">
                    </a>
                </div>
            </div>
            <br>
            <div class="document-container">
                <section class="document">
                    <ul class="enlaces-lista">
                        <li>
                            <a href="http://localhost/proyecto/doc/Branding%20guideline%20Plastiexports%20noviembre%20(2).pdf"
                                target="preview" class="Edoc">Documento 1</a>
                        </li>
                    </ul>
                </section>
                <section class="document">
                    <ul class="enlaces-lista">
                        <li>
                            <a href="http://localhost/proyecto/doc/GUIADETESINA-TIC.pdf" target="preview"
                                class="Edoc">Documento 2</a>
                        </li>
                    </ul>
                </section>
 

            </div>

        </section>

        <div class="section-right">

            <div class="tabs">
                <div class="tab">
                    <div class="color-boxblack" style="background-color: #f0f0f0;" data-tooltip="Rojo"></div>
                    <div class="color-box" style="background-color: red;" onmouseover="showMessage('Expirado')"
                        onmouseout="hideMessage()"></div>
                    <div class="color-box" style="background-color: green;" onmouseover="showMessage('Vigente')"
                        onmouseout="hideMessage()"></div>
                    <div class="color-box" style="background-color: yellow;"
                        onmouseover="showMessage('Próximo a vencer')" onmouseout="hideMessage()"></div>

                    <div id="message-container">
                        <p id="message"></p>
                    </div>
                </div>
                <div class="tab-container">
                    <div id="tab2" class="tab">
                        <a href="#tab2">Historial</a>
                        <div class="tab-content">
                            <table>
                                <tr>
                                    <td>Fecha</td>
                                    <td>Descripción de Cambio</td>
                                    <td>Revición</td>
                                    <td>In/Out</td>
                                    <td>Nombre de usuario</td>

                                </tr>
                                <tr>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="tab1" class="tab">
                        <a href="#tab1">Detalles</a>
                        <div class="tab-content">

                            <table>
                                <tr>
                                    <td>Descripción</td>
                                    <td>................</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>....................</td>
                                </tr>
                                <tr>
                                    <td>Dueño</td>
                                    <td>......................</td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>........................</td>
                                </tr>
                                <tr>
                                    <td>Última modificación</td>
                                    <td>........................</td>
                                </tr>
                                <tr>
                                    <td>Expiración</td>
                                    <td>........................</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview-container">
                <!-- <p class="section-content">
                    PREVIEW
                </p> -->
                <iframe src="" name="preview"></iframe>
            </div>
        </div>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>