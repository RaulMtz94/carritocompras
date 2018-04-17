<?php 
session_start();
if(isset($_SESSION['user'])) {
    $usuario=$_SESSION['user']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url("imagenes/fondo.jpg");
    }
    .baner{
        margin-left: 400px;
    }
    .contenedor{
        width: 800px;
        background-color: white;
        height: 450px;
        margin-left: 400px;
    }

    .menu{
        background-color: rgb(0, 0, 0);
        color:white;
        height: 50px;
    }
    .cuerpo {
        background-color: white;
        height: 500px;
    }
    .libros1{
        background-color: white;
        width: 266.66px;
        height: 300px;
        float: left;
    }
    .libros{
        background-color: white;
        width: 266.66px;
        height: 300px;
        float: left;
    }
    .libros2{
        background-color: white;
        width: 266.66px;
        height: 300px;
        float: left;
    }
    .libros_abajo{
        background-color: white;
        width: 266.66px;
        height: 300px;
    }
    .bienvenido{
        margin-left: 10px;
    }
    .carrito{
        margin-left: 500px;
    }
    .imagenes_libros{
        margin-left: 80px;
        margin-top:5px;
    }
    .agregar_carrito{
        margin-left: 50px;
    }
    .libros_arriba{
        background-color: white;
    }
    
</style>
<header>
    <img class="baner" src="imagenes/baner.png">
    <div class="contenedor">
        <div class="menu">
            <label class="bienvenido"><?php echo "Bienvenido : ",$_SESSION['user']?></label>
            
            <a class="carrito" href="#"><img src="imagenes/carrito.png" width="40" height="40"  title="ir al carrito de compras"></a>
            <a href="logout.php"><img src="imagenes/logout.png" width="40" height="40"  title="cerrar sesion"></a>
   
        </div>
        <div class="cuerpo">
           <div class="libros">
                <div class="libros_arriba">
                <h3 align="center">Java la novela</h3>
                <h4 align="center">precio : $399.99</h4>
                <img class="imagenes_libros" src="imagenes/java.jpg" width="100" height="150"  >
               <br>
                <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
                </div>
                <div class="libros_abajo">
                       <h3 align="center">Node js</h3>
                        <h4 align="center">precio : $289.99</h4>
                        <img class="imagenes_libros" src="imagenes/nodejs.jpg" width="100" height="150"  >
                        <br>
                        <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
                </div>
                
               
           </div>
           <div class="libros1">
                <div class="libros_arriba">
                <h3 align="center">PHP 7</h3>
                <h4 align="center">precio : $528.67</h4>
                <img class="imagenes_libros" src="imagenes/php.jpg" width="100" height="150" ><br>
                <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
                </div>
                <div class="libros_abajo">
                       
                        <h3 align="center">HTML 5</h3>
                        <h4 align="center">precio : $419.99</h4>
                        <img class="imagenes_libros" src="imagenes/html.jpg" width="100" height="150" ><br>
                        <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
           
                    </div>
               
           </div>
           <div class="libros2">
               
                <h3 align="center">Ubuntu</h3>
                <h4 align="center">precio : $749.99</h4>
                <img class="imagenes_libros" src="imagenes/ubuntu.jpg" width="100" height="150" ><br>
                <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
           
                <div class="libros_abajo">
                       
                        <h3 align="center">Android</h3>
                        <h4 align="center">precio : $1099.99</h4>
                        <img class="imagenes_libros" src="imagenes/android.jpg" width="100" height="150" ><br>
                        <a class="agregar_carrito" href="#"><img src="imagenes/carrito.png" width="30" height="30">Agregar al carrito</a>
           
                    </div>
               
           </div>
           

        </div>

    </div>
</header>
<body>
  
</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>