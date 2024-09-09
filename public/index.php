<?php

require '../vendor/autoload.php';

use Camilo\TallerIntermedioPhp\Controllers\Controller;
use Camilo\TallerIntermedioPhp\Controllers\EmailController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $peso = isset($_POST['peso']) ? $_POST['peso'] : null;
    $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
    $kilometros = isset($_POST['kilometros']) ? $_POST['kilometros'] : null;
    $accion = isset($_POST['accion']) ? $_POST['accion'] : null; 

    if ($peso && $altura && $kilometros) {
        $controller = new Controller();

        if ($accion === 'generar_pdf') {
            $controller->generarPDF($peso, $altura, $kilometros); 
        } else {
            
            $resultado = $controller->calcular($peso, $altura, $kilometros);

            include '../src/views/index.php';
        }
        
        if ($accion === 'calcular_y_enviar_correo' && $email) {
            
            $emailController = new EmailController();
            
            
            $asunto = 'Resultados del cálculo';
            $cuerpo = "Aquí están tus resultados:\nIMC: {$resultado['IMC']}\nKilómetros a millas: {$resultado['Conversion']}";

          
            $emailController->enviarCorreo($email, $asunto, $cuerpo);
        }
    } else {
        echo 'Por favor, complete todos los campos antes de enviar.';
    }
} else {
    include '../src/views/index.php'; 
}
?>

