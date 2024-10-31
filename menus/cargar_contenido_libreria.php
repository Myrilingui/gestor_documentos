<?php


if (isset($_GET['id'])) {
    $id_libreria = $_GET['id'];

    try {
        $consulta_contenido = $conexion->prepare("SELECT * FROM librerias WHERE id_libreria = :id");
        $consulta_contenido->bindParam(':id', $id_libreria);
        $consulta_contenido->execute();
        $contenido = $consulta_contenido->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exp) {
        echo "Error: " . $exp->getMessage();
    }
} else {
    echo "ID de la librería no proporcionado";
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div id="menuContainer"></div>
    <script>
        $.ajax({
            url: '../menus/obtener_menu.php',
            method: 'GET',
            success: function (response) {
                $('#menuContainer').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    </script>

    <main class="main">
        <section class="section">
            <div class="header-right">
                <br>
                <?php
                if (isset($_GET['id'])) {
                    $id_libreria = $_GET['id'];

                    try {
                        $consulta_contenido = $conexion->prepare("SELECT * FROM librerias WHERE id_libreria = :id");
                        $consulta_contenido->bindParam(':id', $id_libreria);
                        $consulta_contenido->execute();
                        $contenido = $consulta_contenido->fetchAll(PDO::FETCH_ASSOC);

                        // Obtener el nombre de la librería
                        $consulta_nombre_libreria = $conexion->prepare("SELECT nombre FROM librerias WHERE id_libreria = :id");
                        $consulta_nombre_libreria->bindParam(':id', $id_libreria);
                        $consulta_nombre_libreria->execute();
                        $nombre_libreria = $consulta_nombre_libreria->fetch(PDO::FETCH_ASSOC);

                        if ($nombre_libreria) {
                            $nombre = $nombre_libreria['nombre'];
                            echo '<h2 class="section-title">' . $nombre . '</h2><br>';
                        } else {
                            $nombre = "Nombre no encontrado";
                        }
                        ?>
                    </div>
                    <!-- caaaaaaaaaaaaaaaaaaaammmmmmmmmmmmmmmmmmmmmmmmmbbbbbbbbbbbbbbbbbbbiiiiiiiiiiiiiiiiiiooooooooooooooooooooooooooo -->
                    <div class="section-header">
                        <p class="section-content">Documentos disponibles:</p>

                        <div class="header-left">
                            <a href="#" onclick="ordenAlfabetico()">
                                <img src="..\img\filtroAz.png" alt="Ordenar Alfabéticamente" id="filtroAlfabetico">
                            </a>
                        </div>

                        <div class="header-left">
                            <a href="#" onclick="ordenModificacion()">
                                <img src="..\img\filtrar.png" alt="Ordenar por Modificación" id="filtroModificacion">
                            </a>
                        </div>
                        <div class="header-left">
                            <a href="#" onclick="quitarFiltro()">
                                <img src="..\img\QuitarFiltro.png" alt="Quitar Filtro" id="quitarFiltro">
                            </a>
                        </div>
                    </div>
                    <?php

                    try {
                        // Consulta SQL para obtener los documentos
                        $query = "SELECT * FROM documentos";
                        $statement = $conexion->prepare($query);
                        $statement->execute();

                        $archivos = $statement->fetchAll(PDO::FETCH_ASSOC);

                        // Convertir a formato JSON para usar en JavaScript
                        $archivos_json = json_encode($archivos);
                    } catch (PDOException $e) {
                        echo "Error al obtener documentos: " . $e->getMessage();
                    }
                    ?>

                    <script>
                        let archivos = <?php echo json_encode($archivos); ?>;
                        let filtroActivo = null;

                        function mostrarDocumentos(listaDocumentos) {
                            const contenedorDocumentos = document.querySelector('.document-container');
                            contenedorDocumentos.innerHTML = '';

                            listaDocumentos.forEach(archivo => {
                                let elementoDocumento = document.createElement('section');
                                elementoDocumento.classList.add('document');

                                let enlaceDocumento = document.createElement('a');
                                enlaceDocumento.href = archivo.ruta;
                                enlaceDocumento.target = 'preview';
                                enlaceDocumento.classList.add('Edoc');
                                enlaceDocumento.dataset.id = archivo.id_documento;
                                enlaceDocumento.textContent = archivo.nombre;

                                let lista = document.createElement('ul');
                                let listaItem = document.createElement('li');
                                listaItem.appendChild(enlaceDocumento);
                                lista.appendChild(listaItem);

                                elementoDocumento.appendChild(lista);
                                contenedorDocumentos.appendChild(elementoDocumento);
                            });
                        }

                        function ordenAlfabetico() {
    archivos.sort((a, b) => a.nombre.localeCompare(b.nombre));
    mostrarDocumentos(archivos);
    aplicarEstilosFechaExpiracion(); // Llamada a la función para aplicar estilos
    filtroActivo = 'alfabetico';
}

function ordenModificacion() {
    archivos.sort((a, b) => {
        const dateA = new Date(a.ultimaM).getTime();
        const dateB = new Date(b.ultimaM).getTime();
        return dateB - dateA;
    });
    mostrarDocumentos(archivos);
    aplicarEstilosFechaExpiracion(); // Llamada a la función para aplicar estilos
    filtroActivo = 'modificacion';
}

function quitarFiltro() {
    if (filtroActivo === 'alfabetico') {
        archivos.sort((a, b) => a.id_documento - b.id_documento);
    } else if (filtroActivo === 'modificacion') {
        archivos.sort((a, b) => a.id_documento - b.id_documento);
    }

    mostrarDocumentos(archivos);
    aplicarEstilosFechaExpiracion(); // Llamada a la función para aplicar estilos
    filtroActivo = null;
}


                        // Mostrar los documentos por defecto
                        mostrarDocumentos(archivos);
                        function aplicarEstilosFechaExpiracion() {
    const documentos = document.querySelectorAll('.Edoc');
    const hoy = new Date().getTime();

    documentos.forEach(documento => {
        const fechaExpiracion = new Date(documento.dataset.fechaExpiracion).getTime();

        if (fechaExpiracion) {
            if (hoy > fechaExpiracion) {
                documento.classList.add('expired');
            } else if (hoy === fechaExpiracion) {
                documento.classList.add('near-expiry');
            } else {
                documento.classList.add('valid');
            }
        } else {
            documento.classList.add('valid');
        }
    });
}
                    </script>

                    <!-- caaaaaaaaaaaaaaaaaaaammmmmmmmmmmmmmmmmmmmmmmmmbbbbbbbbbbbbbbbbbbbiiiiiiiiiiiiiiiiiiooooooooooooooooooooooooooo -->
                    <br>
                    <!-- ///////////////////////////////////////////////////////////////////FECHA EXPIRACION ///////////////////////////////////////////////////////////////// -->
                    <?php
                    function FechaExpiracion($idArchivo, $conexion)
                    {
                        try {
                            $query = "SELECT expiracion FROM documentos WHERE id_documento = :id";
                            $statement = $conexion->prepare($query);
                            $statement->bindParam(':id', $idArchivo, PDO::PARAM_INT);
                            $statement->execute();

                            $resultado = $statement->fetch(PDO::FETCH_ASSOC);

                            if ($resultado) {
                                return $resultado['expiracion'];
                            } else {
                                return null;
                            }
                        } catch (PDOException $exp) {
                            echo "Error: " . $exp->getMessage();
                            return null;
                        }
                    }
                    $archivos = [];

                    if (isset($_GET['id'])) {
                        $id_libreria = $_GET['id'];

                        try {
                            $consulta_documentos = $conexion->prepare("SELECT * FROM documentos WHERE id_libreria = :id");
                            $consulta_documentos->bindParam(':id', $id_libreria);
                            $consulta_documentos->execute();
                            $archivos = $consulta_documentos->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <style>
                                .document.expired {
                                    border-left: 0.4rem solid #ff0000;
                                }

                                .document.near-expiry {
                                    border-left: 0.4rem solid #ffff00;
                                }

                                .document.valid {
                                    border-left: 0.4rem solid #0d8517;
                                }
                            </style>
                            <div class="document-container">
                           <?php $fechasExpiracion = []; ?>
                                <?php foreach ($archivos as $archivo): ?>
                                    <?php
                                    $fechaExpiracion = FechaExpiracion($archivo['id_documento'], $conexion);
                                    $hoy = strtotime(date('Y-m-d'));
                                    $fechaExpiracion = strtotime($fechaExpiracion);

                                    if ($fechaExpiracion) {
                                        if ($hoy > $fechaExpiracion) {
                                            $class = 'expired';
                                        } elseif ($hoy == $fechaExpiracion) {
                                            $class = 'near-expiry';
                                        } else {
                                            $class = 'valid';
                                        }
                                    } else {
                                        $class = 'valid';
                                    }
                                    ?>

                                    <section class="document <?php echo $class; ?>">
                                        <ul class="enlaces-lista">
                                            <li>
                                                <a href="<?php echo $archivo['ruta']; ?>" target="preview"
                                                    class="Edoc <?php echo $class; ?>" data-id="<?php echo $archivo['id_documento']; ?>">
                                                    <?php echo basename($archivo['nombre']); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                <?php endforeach; ?>
                            </div>


                        </section>
                        <?php
                        } catch (PDOException $exp) {
                            echo "Error: " . $exp->getMessage();
                        }
                    }
                    ?>
                <script>
                    document.querySelectorAll('.Edoc').forEach(function (enlace) {
                        enlace.addEventListener('click', function (event) {
                            event.preventDefault();
                            var idArchivo = this.getAttribute('data-id');

                            // Obtener detalles del archivo
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    var detalles = JSON.parse(xhr.responseText);
                                    document.getElementById('descripcion').textContent = detalles.descripcion;
                                    document.getElementById('estado').textContent = detalles.estado;
                                    document.getElementById('dueno').textContent = detalles.dueno;
                                    document.getElementById('creado').textContent = detalles.creado;
                                    document.getElementById('ultima-modificacion').textContent = detalles.ultimaM;
                                    document.getElementById('expiracion').textContent = detalles.expiracion;

                                    var xhrHistorial = new XMLHttpRequest();
                                    xhrHistorial.onreadystatechange = function () {
                                        if (xhrHistorial.readyState == 4 && xhrHistorial.status == 200) {
                                            var historial = JSON.parse(xhrHistorial.responseText);

                                            var historialContainer = document.getElementById('historial-container');

                                            historialContainer.innerHTML = '';


                                            var table = document.createElement('table');
                                            table.classList.add('fixed-width-table');


                                            var headerRow = table.insertRow();
                                            ['Fecha', 'Descripción de cambio', 'Revición', 'In/Out', 'Nombre de usuario'].forEach(function (headerText) {
                                                var th = document.createElement('th');
                                                th.textContent = headerText;
                                                headerRow.appendChild(th);
                                            });

                                            historial.forEach(function (entry) {
                                                var row = table.insertRow();
                                                ['fecha', 'descripcion', 'revicion', 'InOu', 'nombreUsuario'].forEach(function (key) {
                                                    var cell = row.insertCell();
                                                    cell.textContent = entry[key];
                                                });
                                            });

                                            historialContainer.appendChild(table);

                                            var previewFrame = document.querySelector('iframe[name="preview"]');
                                            previewFrame.src = detalles.ruta;
                                        }
                                    };

                                    xhrHistorial.open('GET', '../bd/obtener_historial.php?id=' + idArchivo, true);
                                    xhrHistorial.send();
                                }
                            };
                            xhr.open('GET', '../bd/obtener_detalles.php?id=' + idArchivo, true);
                            xhr.send();
                        });
                    });
                </script>

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
                                    <table class="fixed-width-table">
                                        <colgroup>
                                            <col style="width: 150px;">
                                            <col style="width: 300px;">
                                        </colgroup>
                                        <tr>
                                            <td>Estatus</td>
                                            <td>Fecha aceptado</td>
                                            <td>Fecha rechazo</td>
                                            <td>Comentarios</td>
                                            <td>Usuario</td>
                                        </tr>
                                        <div class="filtroA">
                                            <a href="#">
                                                <img src="..\img\filtrar.png" alt="Imagen" id="imagenBoton" class="espacio">
                                            </a>
                                            <a href="#">
                                                <img src="..\img\QuitarFiltro.png" alt="Imagen" id="imagenBoton">
                                            </a>
                                        </div>
                                        <?php
                                        require_once('../bd/conexion.php');

                                        $query_historial = "SELECT Aceptado, Rechazado, comentarios, usuario FROM Historialsolicitudes";

                                        $statement_historial = $conexion->prepare($query_historial);
                                        $statement_historial->execute();

                                        while ($row = $statement_historial->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>";

                                            if (!empty($row['Aceptado'])) {
                                                echo "Aceptado";
                                            } elseif (!empty($row['Rechazado'])) {
                                                echo "Rechazado";
                                            } else {
                                                echo "Indefinido";
                                            }

                                            echo "</td>";
                                            echo "<td>" . $row['Aceptado'] . "</td>";
                                            echo "<td>" . $row['Rechazado'] . "</td>";
                                            echo "<td>" . $row['comentarios'] . "</td>";
                                            echo "<td>" . $row['usuario'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </div>
                            </div>
                            <?php
                            $query_solicitudes = "SELECT * FROM solicitudes";
                            $statement_solicitudes = $conexion->prepare($query_solicitudes);
                            $statement_solicitudes->execute();
                            $solicitudes = $statement_solicitudes->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <div id="tab3" class="tab">
                                <a href="#tab3">Solicitudes</a>
                                <div class="tab-content">
                                    <table class="fixed-width-table">
                                        <tr>
                                            <td>Fecha</td>
                                            <td>Descripción de cambio</td>
                                            <td>Nombre de usuario</td>
                                            <td>Nombre del documento</td>
                                            <td></td>
                                        </tr>
                                        <?php foreach ($solicitudes as $solicitud): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $solicitud['fecha']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $solicitud['Dcambio']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $solicitud['usuario']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $rutaDocumentoTemporal = $solicitud['documento_temporal'];
                                                    ?>
                                                    <a href="#" onclick="abrirVistaPrevia('<?php echo $rutaDocumentoTemporal; ?>')">
                                                        <?php echo basename($rutaDocumentoTemporal); ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- Botones de acción -->
                                                    <div class="button-container">
                                                        <!-- Botón de Aceptar -->
                                                        <form action="../bd/acciones_solicitud.php" method="post">
                                                            <input type="hidden" name="id_solicitud_aprobada"
                                                                value="<?php echo $solicitud['id_solicitud']; ?>">
                                                            <button type="submit" class="accept-button"
                                                                name="aprobar">Aceptar</button>
                                                        </form>
                                                        <p>/</p>
                                                        <!-- Botón de Rechazar -->
                                                        <form id="rechazarForm" action="../bd/acciones_solicitud.php" method="post">
                                                            <input type="hidden" name="id_solicitud_rechazada"
                                                                value="<?php echo $solicitud['id_solicitud']; ?>">
                                                            <button type="button" class="reject-button"
                                                                id="openModal6">Rechazar</button>
                                                        </form>

                                                        <script>
                                                            const rechazarButton = document.getElementById('openModal6');
                                                            const rechazarForm = document.getElementById('rechazarForm');

                                                            rechazarButton.addEventListener('click', function () {
                                                                const comentarios = prompt('Ingrese comentarios de rechazo:');
                                                                if (comentarios !== null) {
                                                                    const comentariosField = document.createElement('input');
                                                                    comentariosField.type = 'hidden';
                                                                    comentariosField.name = 'comentarios';
                                                                    comentariosField.value = comentarios;
                                                                    rechazarForm.appendChild(comentariosField);
                                                                    rechazarForm.submit();
                                                                }
                                                            });
                                                        </script>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>

                            <script>
                                function abrirVistaPrevia(rutaDocumentoTemporal) {
                                    var urlVistaPrevia = "../bd/vista_previa.php?archivo=" + encodeURIComponent(rutaDocumentoTemporal);
                                    window.open(urlVistaPrevia, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600");
                                }
                            </script>


                            <div id="tab2" class="tab">
                                <a href="#tab2">Historial ver</a>
                                <div id="historial-container" class="tab-content">
                                    <table class="fixed-width-table">
                                        <tr>
                                            <td>Fecha</td>
                                            <td>Descripción de cambio</td>
                                            <td>Revición</td>
                                            <td>In/Out</td>
                                            <td>Nombre de usuario</td>
                                        </tr>
                                        <tr>
                                            <td id="fechaH">........................</td>
                                            <td id="descripcionH">........................</td>
                                            <td id="revicionH">........................</td>
                                            <td id="inou">........................</td>
                                            <td id="usuarioH">........................</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="tab1" class="tab">
                                <a href="#tab1">Detalles</a>
                                <!-- Contenedor para detalles del archivo -->
                                <div id="detalles-container" class="tab-content">
                                    <table class="fixed-width-table">
                                        <colgroup>
                                            <col style="width: 150px;">
                                            <col style="width: 300px;">
                                        </colgroup>
                                        <tr>
                                            <td>Descripción</td>
                                            <td id="descripcion">........................</td>
                                        </tr>
                                        <tr>
                                            <td>Estado</td>
                                            <td id="estado">........................</td>
                                        </tr>
                                        <tr>
                                            <td>Dueño</td>
                                            <td id="dueno">........................</td>
                                        </tr>
                                        <tr>
                                            <td>Creado</td>
                                            <td id="creado">........................</td>
                                        </tr>
                                        <tr>
                                            <td>Última modificación</td>
                                            <td id="ultima-modificacion">........................</td>
                                        </tr>
                                        <tr>
                                            <td>Expiración</td>
                                            <td id="expiracion">........................</td>
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
        </body>
        <!-- <script type="text/javascript" src="../../js/script.js"></script> -->
        </html>
        <?php
                    } catch (PDOException $exp) {
                        echo "Error: " . $exp->getMessage();
                    }
                } else {
                    echo "ID de la librería no proporcionado";
                }
                ?>