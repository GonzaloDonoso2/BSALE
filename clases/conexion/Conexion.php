<?php

class Conexion {
    /*Esta clase define los parámetros para la conexión con la base de datos.*/

    private $servidor;
    private $usuario;
    private $contrasena;
    private $basedatos;

    function __construct() {
        $listaparametrosconexion = $this->ParametrosConexion();
        foreach ($listaparametrosconexion as $key => $value) {
            $this->servidor = $value["servidor"];
            $this->usuario = $value["usuario"];
            $this->contrasena = $value["contrasena"];
            $this->basedatos = $value["basedatos"];
        }
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basedatos);
    }

    private function ParametrosConexion() {
        $direccion = dirname(__FILE__);
        $json = file_get_contents($direccion . "/" . "configuracionconexion.txt");
        return json_decode($json, true);
    }

    /*Para poder cambiar los parámetros de la conexión con la
      base de datos es necesario editar el archivo README
      en la carpeta clases/conexión.*/


    /*Esta función muestra todas las categorías almacenadas en la base de datos.*/

    public function ObtenerCategorias() {
        require_once 'clases/conexion/Conexion.php';
        require_once 'clases/Categoria.php';
        $conexion = new Conexion();
        $listaresultados = $this->conexion->query("select * from category");
        foreach ($listaresultados as $key => $value) {
            $identificador = $value["id"];
            $nombre = $value["name"];
            $categoria = new Categoria($identificador, $nombre);
            $listacategorias[] = $categoria;
        }
        /*Este fragmento de código muestra todas las categorías almacenadas en la
          base de datos mediante una inyección de código PHP.*/
        $categoria1 = $listacategorias[0]->getNombre();
        $categoria2 = $listacategorias[1]->getNombre();
        $categoria3 = $listacategorias[2]->getNombre();
        $categoria4 = $listacategorias[3]->getNombre();
        $categoria5 = $listacategorias[4]->getNombre();
        $categoria6 = $listacategorias[5]->getNombre();
        $categoria7 = $listacategorias[6]->getNombre();
        echo"            
            <select name=listacategorias>
                <option value=0>Seleccione una categoría</option>
                <option value=1>$categoria1</option>
                <option value=2>$categoria2</option>
                <option value=3>$categoria3</option>
                <option value=4>$categoria4</option>
                <option value=5>$categoria5</option>
                <option value=6>$categoria6</option>
                <option value=7>$categoria7</option>
            </select>
        ";
    }    
    
    private function ListarProductos($listaproductos) {
        /*Este funcion muestra en pantalla todos los productos almacenados en la
          base de datos, mediante un ciclo For que realiza una inyección de
          código PHP que muestra en pantalla cada uno de los productos,
          cada vez que el valor de la variable $columnas es igual al valor
          de la variable $filas se imprime en pantalla una nueva fila,
          de esta manera tiene una apariencia más ordenada con filas de 6 productos
          y tantas columnas como productos pueda tener almacenados la base datos.*/
        $filas = 5;
        for ($i = 0; $i < count($listaproductos); $i++) {
            $columnas = $i;
            $identificador = $listaproductos[$i]->getIdentificador();
            $nombre = $listaproductos[$i]->getNombre();
            $imagen = $listaproductos[$i]->getImagen();
            $precio = $listaproductos[$i]->getPrecio();
            $descuento = $listaproductos[$i]->getDescuento();
            if ($columnas <= $filas) {
                echo "<td><img src=$imagen><p>$nombre</p><p>$precio CLP</p><p>DESCUENTO: $descuento %</p><p>IDENTIFICADOR: $identificador</p><button id='boton' type='button' class='btn btn-success'>AGREGAR</button></td>";
            }
            if ($columnas == $filas) {
                echo "</tr>";
            }
            if ($columnas == $filas) {
                $filas = (($filas + 6));
            }
        }
    }

    public function ObtenerProductos($sql) {
        /*Dependiendo de la instrucción SQL, esta función muestra al usuario
          los productos almacenados, en caso de que el usuario busque un producto
          que no esté almacenado en la base de datos, la pagina vuelve a mostrar
          todos los productos.*/
        require_once 'clases/conexion/Conexion.php';
        require_once 'clases/Producto.php';
        $listaresultados = $this->conexion->query($sql);
        foreach ($listaresultados as $key => $value) {
            $identificador = $value["id"];
            $nombre = $value["name"];
            $imagen = $value["url_image"];
            $precio = $value["price"];
            $descuento = $value["discount"];
            $categoria = $value["category"];
            $producto = new Producto($identificador, $nombre, $imagen, $precio, $descuento, $categoria);
            $listaproductos[] = $producto;
        }
        if (isset($listaproductos)) {
            $this->ListarProductos($listaproductos);
        } else {
            $listaresultados = $this->conexion->query("select * from product");
            foreach ($listaresultados as $key => $value) {
                $identificador = $value["id"];
                $nombre = $value["name"];
                $imagen = $value["url_image"];
                $precio = $value["price"];
                $descuento = $value["discount"];
                $categoria = $value["category"];
                $producto = new Producto($identificador, $nombre, $imagen, $precio, $descuento, $categoria);
                $listaproductos[] = $producto;
            }
            $this->ListarProductos($listaproductos);
        }
    }
}
