<?php

$resultado="";
if(isset($_GET['Registrar'])){

    $nombre=$_GET['nombre'];
    $usuario=$_GET['usuario'];
    $password=$_GET['password'];
    $re=$_GET['re'];
    $resultado=registrar($nombre,$usuario,$password,$re);
    if ($resultado==true){?>
        <script>
            alert("USUARIO CREADO CON EXITO..");
            window.history.back();
        </script>
        <?php
                
    }else{?>
     <script>
            alert("EL USUARIO SE ENCUENTRA EN USO ELIGE OTRO..");   
            window.history.back();
        </script>
    <?php    
    }   
} else if(isset($_GET['Enviar'])){
    $usuario=$_GET['usuario'];
    $password=$_GET['password'];
    $re=$_GET['re'];
    iniciarSesion($usuario,$password,$re);
}


//----------------------------------FUNCIONES REGISTRO Y LOGIN------------------------
function registrar($nombre,$usuario,$password,$re){
  
    if( isset( $_COOKIE["$usuario"]) )
    {
       return false;
    }
    else
    {
       
        // Crea una Cookie 
        setcookie("$usuario","$nombre,$usuario,$password,$re",time()+8600);
        return true;
    }
   
   }

   
function iniciarSesion($usuario,$password,$re){
     
       if( isset( $_COOKIE["$usuario"]) )
       { 
             $cadena= $_COOKIE["$usuario"];
           list($name, $user, $pw) = (explode(",",$cadena));
           if($user==$usuario && $pw==$password){
            setcookie("$user","$name,$user,$pw,$re",time()+8600);
            echo '<script> window.location="carrito.html"; </script>';
              return true;
           }else {
               echo '<script>alert("usuario o contra incorrectos")</script>';
               echo '<script> window.location="index.php"; </script>';
               return true;
           }
       }
       else
       {   
       echo '<script>alert("usuario invalido")</script>';
       echo '<script> window.location="index.php"; </script>';
       }
      

}

?>
