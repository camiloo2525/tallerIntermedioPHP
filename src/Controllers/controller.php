<?php

namespace Camilo\TallerIntermedioPhp\Controllers;

use Camilo\TallerIntermedioPhp\Models\Models;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use \FPDF; 

class EmailController
{
    public function enviarCorreo($para, $asunto, $cuerpo)
    {
        try {
            
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername('juan.3802010536@ucaldas.edu.co') 
                ->setPassword('kogd fhse avnb eqia'); 

            
            $mailer = new Swift_Mailer($transport);

            
            $message = (new Swift_Message($asunto))
                ->setFrom(['juan.3802010536@ucaldas.edu.co' => 'JUAN CAMILO'])
                ->setTo([$para])
                ->setBody($cuerpo);

            
            $result = $mailer->send($message);

            if ($result) {
                return "Correo enviado con éxito";
            } else {
                return "No se pudo enviar el correo";
            }
        } catch (\Exception $e) {
            
            return 'Error al enviar correo: ' . $e->getMessage();
        }
    }
}

class Controller
{
    public function calcular($peso, $altura, $kilometros)
    {
        
        if ($peso <= 0 || $altura <= 0 || $kilometros < 0) {
            return [
                'IMC' => 'Datos inválidos',
                'Conversion' => 'Datos inválidos'
            ];
        }

        
        $operacion = new Models($peso, $altura, $kilometros);

        
        $resultadoIMC = $operacion->calcularIMC();
        $resultadoConversion = $operacion->convertirKilometrosAMillas();

        return [
            'IMC' => $resultadoIMC,
            'Conversion' => $resultadoConversion
        ];
    }

    public function generarPDF($peso, $altura, $kilometros)
    {
        
        $resultado = $this->calcular($peso, $altura, $kilometros);

        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Resultados de Cálculo', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

      
        $pdf->Cell(0, 10, 'IMC: ' . $resultado['IMC'], 0, 1);
        $pdf->Cell(0, 10, 'Conversión a millas: ' . $resultado['Conversion'], 0, 1);

        
        $pdf->Output('D', 'resultado.pdf'); 
        exit(); 
    }
}
?>



