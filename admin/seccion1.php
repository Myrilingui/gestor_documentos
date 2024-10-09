<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de documentación</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" href="../img/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<?php include '../menus/administrador.php'; ?>

<body>
<br><br>
    <main class="main">
        <section class="section">
            <div class="header-right">
                <br>
                <?php
                // Simulación de la librería
                $libreria = [
                    'id_libreria' => 1,
                    'nombre' => 'Librería Simulada'
                ];

                // Mostrar el nombre de la librería simulada
                echo '<h2 class="section-title">' . $libreria['nombre'] . '</h2> <br>';
                ?>
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
                <?php
                // Simulación de los documentos
                $documentos = [
                    ['nombre' => 'Documento 1', 'ruta' => '../doc/GUIADETESINA-TIC.pdf'],
                    ['nombre' => 'Documento 2', 'ruta' => 'http://localhost/proyecto/doc/Documento2.pdf'],
                    ['nombre' => 'Documento 3', 'ruta' => 'http://localhost/proyecto/doc/Documento3.pdf']
                ];

                // Mostrar los documentos simulados
                foreach ($documentos as $documento) {
                    echo '<section class="document">';
                    echo '<ul class="enlaces-lista">';
                    echo '<li>';
                    echo '<a href="' . $documento['ruta'] . '" target="preview" class="Edoc">' . $documento['nombre'] . '</a>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</section>';
                }
                ?>
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
                    <div id="tab4" class="tab">
                        <a href="#tab4">Historial sol</a>
                        <div class="tab-content">
                            <table>
                                <tr>
                                    <td>Estatus</td>
                                    <td>Fecha aceptado</td>
                                    <td>Fecha rechazo</td>
                                    <td>Comentarios</td>
                                </tr>
                                <tr>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="tab3" class="tab">
                        <a href="#tab3">Solicitudes</a>
                        <div class="tab-content">
                            <table>
                                <tr>
                                    <td>Fecha</td>
                                    <td>Descripción de cambio</td>
                                    <td>Nombre de usuario</td>
                                    <td>Nombre del documento</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>....................</td>
                                    <td>
                                        <div class="button-container">
                                            <button class="accept-button">Aceptar</button>
                                            <p>/</p>
                                            <button class="reject-button" id="openModal6">Rechazar</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="tab2" class="tab">
                        <a href="#tab2">Historial ver</a>
                        <div class="tab-content">
                            <table>
                                <tr>
                                    <td>Fecha</td>
                                    <td>Descripción de cambio</td>
                                    <td>Revisión</td>
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
                <iframe src="" name="preview"></iframe>
            </div>
        </div>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>
