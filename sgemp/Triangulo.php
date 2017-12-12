<?php
class Triangulo
{
    private $cateto1;
    private $cateto2;
    private $hipotenusa;

    public function __construct($cateto1,$cateto2)
    {
        $this->cateto1=$cateto1;
        $this->cateto2=$cateto2;
        $this->hipotenusa= sqrt(pow($cateto1,2)+pow($cateto2,2));
    }
    public function getHipotenusa()
    {
        return $this->hipotenusa;
    }
    public function __destruct()
    {
    }
    public function getCateto1()
    {
        return $this->cateto1;
    }
    public function getCateto2()
    {
        return $this->cateto2;
    }

}
?>