<!DOCTYPE html>
<html>    
    <head>        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="myowncss/estilo.css" rel="stylesheet" type="text/css">        
        <meta charset="UTF-8">
        <title>Prueba BSALE</title>        
    </head>
    <body>
        <form action="index.php" method="post"> 
            <header class="container">
                <h1>Tienda en Línea</h1>
                <table class="table" id="tablacontrol">
                    <tbody> 
                        <tr>
                            <td id="td1">
                                <?php
                                require_once 'clases/conexion/Conexion.php';
                                $conexion = new Conexion();
                                $conexion->ObtenerCategorias();
                                ?>
                            </td>
                        </tr>        
                        <tr>
                            <td id="td2">
                                <input id="busqueda" name="busqueda" type="text"  placeholder="Ingrese el nombre del producto"/>                               
                            </td>
                        </tr>                         
                        <tr>
                            <td id="td3">
                                <button id="botonbuscar" name="botonbuscar" class="btn btn-primary" type="submit" require>BUSCAR</button>
                            </td>
                        </tr>
                    </tbody>
                </table>  
            </header>
            <main class="container">
                <table class="table">   
                    <tbody>
                        <?php
                        if (isset($_POST["botonbuscar"])) {
                            $busqueda = $_POST["busqueda"];
                            if ($busqueda != "") {
                                require_once 'clases/conexion/Conexion.php';
                                $conexion = new Conexion();
                                $sql = "select * from product where name like '%$busqueda%'";
                                $conexion->ObtenerProductos($sql);
                            } else {
                                $categoria = $_POST["listacategorias"];
                                if ($categoria != 0) {
                                    require_once 'clases/conexion/Conexion.php';
                                    $conexion = new Conexion();
                                    $sql = "select * from product where category = $categoria";
                                    $conexion->ObtenerProductos($sql);
                                } else {
                                    require_once 'clases/conexion/Conexion.php';
                                    $conexion = new Conexion();
                                    $sql = "select * from product";
                                    $conexion->ObtenerProductos($sql);
                                }
                            }
                        } else {
                            require_once 'clases/conexion/Conexion.php';
                            $conexion = new Conexion();
                            $sql = "select * from product";
                            $conexion->ObtenerProductos($sql);
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </form> 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
