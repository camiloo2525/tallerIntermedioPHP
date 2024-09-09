<?php

namespace Camilo\TallerIntermedioPhp\Models;

class Models
{
    private $peso;
    private $altura;
    private $kilometros;

    public function __construct($peso, $altura, $kilometros)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->kilometros = $kilometros;
    }

    public function calcularIMC()
    {
        return $this->peso / ($this->altura * $this->altura);
    }

    
    public function convertirKilometrosAMillas()
    {
        return $this->kilometros * 0.621371;
    }
}
?>


