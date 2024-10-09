<?php
require_once('conexion.php');

$data = json_decode(file_get_contents('php://input'), true);
$usuarioAEliminar = $data['id'];

$query = "DELETE FROM Usuarios WHERE id = :";
$statement = $conexion->prepare($query);
$resultado = $statement->execute(array(':' => $usuarioAEliminar));

if ($resultado) {
    echo json_encode(['message' => 'Usuario eliminado exitosamente']);
} else {
 
    echo json_encode(['error' => 'No se pudo eliminar el usuario']);
}
?>
