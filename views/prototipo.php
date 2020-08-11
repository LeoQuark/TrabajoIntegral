<?php
// PROTOTIPO DE FUNCION PARA PEDIR ARCHIVOS.TXT

class coordenada
{
    public function init($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function mostrar()
    {
        echo "Coordenada X: " . $this->$x;
        echo "Coordenada Y: " . $this->$y;
    }
}

class camion
{
    public function init()
    {
        $this->centro_distribucion = true;
        $this->puntos_venta = [];
        $this->recorrido = true;
        $this->productos = true;
    }

    public function mostrar()
    {
        echo "Centro de distribucion: " . $this->centro_distribucion;
        echo "Puntos de venta: " . $this->puntos_venta;
        echo "Productos disponibles: " . $this->productos;
    }
}

function leerArchivo()
{
    $archivo = fopen("../Coordenadas.txt", "r");
    $lista = [];
    $centros = [];
    $puntos = [];

    for ($i = 0; $i < $archivo; $i++) {
         $lista.append($i);
    }

    while ($i < len($lista)) {
        if ($lista[$i][0] == "C") {
            $j = 2;
            $aux = "";

            while (j < len($lista[$i])) {
                if ($lista[$i][$j] > chr(47) and $lista[$i][$j] < chr(58)) {
                    $aux =  $aux + $lista[$i][$j];
                }
                if ($lista[$i][$j] == ";") {
                    while (len($centros) - 1 < int($aux)) {
                        $centros . append(null);
                    }
                    $variableUno = int($aux);
                    $aux = "";
                }
                if ($lista[$i][$j] == ",") {
                    $variableDos = int($aux);
                    $aux = "";
                }
                if ($lista[$i][$j] == '\n' or $j == len($lista[$i]) - 1) {
                    $centros[$variableUno] = ($variableDos);
                    $j = len($lista[$i]);
                }
                $j = $j + 1;
            }
            if ($lista[$i][0] == "P") {
                $j = 2;
                $aux = "";
                while ($j < len($lista[$i])) {
                    if ($lista[$i][$j] > chr(47) and $lista[$i][$j] < chr(58)) {
                        $aux = $aux + $lista[$i][$j];
                    }
                    if ($lista[$i][$j] == ";") {
                        while (len($puntos) - 1 < int($aux)) {
                            $puntos . append(null);
                        }
                        $indice = int($aux);
                        $aux = "";
                    }
                    if ($lista[$i][$j] == ",") {
                        $variableTres = int($aux);
                        $aux = "";
                    }
                    if ($lista[$i][$j] == '\n' or $j == len($lista[$i]) - 1) {
                        $puntos[$indice] = ($variableTres);
                        $j = len($lista[$i]);
                    }
                    $j = $j + 1;
                }

                $i = $i + 1;
            }
        }
    }

    return $centros;
    $puntos;
}


function leer(){
    $archivo= fopen("../coordenadas.txt","r");
    
    while(!feof($archivo)){
        $texto = fgets($archivo);
        // agrega un salto de linea \n
        $linea = nl2br($texto);
        $caracteres = strlen($texto);
        
        $opc = explode(";",$linea);
        echo $opc;
        // echo $linea[0] . $caracteres;
        // echo "<br>";
        // $camiones = explode(";",$linea);
        // echo $camiones;
        // $datos = array(
        //     "T"=>$texto[0]
        // );
        // echo $datos;
        // $str_linea = implode(",",$linea);
        // $camiones = explode(";",$str_linea);
        // echo $camiones;
        // $dato[$cont]=$camiones[0];
        // $cont++;
        // for($=0; )
        // $camiones = explode(";",$linea);
        // echo $camiones[1];

    }
    // echo $texto;
    fclose($archivo);
}

leer();

?>