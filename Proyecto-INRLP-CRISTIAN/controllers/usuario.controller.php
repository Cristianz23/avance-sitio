<?php
session_start();
include_once "../template/header.php";
include_once "../models/users.model.php";

// Validación y sanitización de entradas
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$contrasena = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
$tipouser = filter_var($_POST['tipouser'], FILTER_SANITIZE_SPECIAL_CHARS);


try {
    $objetoUsuario = new Users();
    
    // Verificar si el usuario ya existe
    $resultado = $objetoUsuario->login($email);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Error!',
                text: 'El usuario ya existe.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../views/register.php';
                }
            });
        });
        </script>";
    } else {
        // Registrar el nuevo usuario
        $registro = $objetoUsuario->register($nombre, $email, $contrasena, $tipouser);
        
        if ($registro) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Registro exitoso!',
                    text: 'Usuario registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../views/login.php';
                    }
                });
            });
            </script>";
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Error!',
                    text: 'Hubo un problema al registrar el usuario.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../views/register.php';
                    }
                });
            });
            </script>";
        }
    }
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
