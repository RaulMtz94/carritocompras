<html>
   <head>
      <title>Login</title>
     
      <script language="Javascript" type="text/javascript">
      document.getElementById('salir').addEventListener('click',function(e){
        e.preventDefault();
        alert ("Hola Mundo");
      });
      //FUNCION QUE BORRA LAS COOKIES
        function BorrarCookies(){if (document.cookie != "") {
            if (confirm("Eliminar todas las Cookies?")) {
                la_cookie = document.cookie.split("; ")
                fecha_fin = new Date
                fecha_fin.setDate(fecha_fin.getDate()-1)
            for (i=0; i<la_cookie.length; i++) {
                                mi_cookie = la_cookie[i].split("=")[0]
                                document.cookie = mi_cookie + "=;expires=" + fecha_fin.toGMTString()
                            }
                            alert("Se han eliminado: " + la_cookie.length + " Cookies ");
                        }
                    }
        }
        //FUNCION QUE LEE UNA COOKIE EN BASE A SU NOMBRE
        function leerCookie(nombre) {
         var lista = document.cookie.split(";");
         for (i in lista) {
             var busca = lista[i].search(nombre);
             if (busca > -1) {micookie=lista[i]}
             }
         var igual = micookie.indexOf("=");
         var valor = micookie.substring(igual+1);
         return valor;
         }
        //PARA QUE ESTAS FUNCIONES REALIZEN SU CORRECTO FUNCIONAMIENTO DEBE ESTAR ACTIVADO EL CHEKBOX
        function mostrarContraseñaCombo(usuario){
        if (document.getElementById('usuarios_logueados').selectedIndex>0) {
            document.getElementById('usuario').value=usuario;
            if (document.getElementById('recordar').checked==true){
                var cookie= leerCookie(usuario);
                var pw= cookie.split("%2C")[2];
                document.getElementById("password").value=pw;
            } else {
                document.getElementById("usuario").value="";
                document.getElementById("password").value="";
            }
        }
        
    }
    function mostrarContraseñaAutocompletado(usuario){ //FUNCION DE AUTOCOMPLETADO
        document.getElementById("password").value="";
        if (document.getElementById('recordar').checked==true){
            var cookie= leerCookie(usuario);
            if (cookie!=""){ //VERFICICAMOS QUE EXISTA UNA COOKIE CON EL NOMBRE DE USUARIO
                var estado = cookie.split("%2C")[3];
                if (estado=="lo") {//VERFICAMOS QUE EL USUARIO YA SE HAYA LOGUEADO
                    var pw = cookie.split("%2C")[2]; //EXTRAAEMOS LA CONTRASEÑA
                    document.getElementById("password").value=pw;
                }
            }
        }
    }
    </script>  
   </head>
   <body >
   <?php
   include ("usuario.php");
   $us=null;
   $pw=null;
   

    if(isset($_GET['opc'])){
        $opc=$_GET['opc'];
        //SECCIONES
        if($opc=="registrar"){ ?>
            <body>
                         <div id="login">
                        <form action= "usuario.php" method="GET">
                        <label>Ingresa tu nombre: </label>
                        <input type="text" name="nombre" required /><br><br>
                        <label>Ingresa un nombre de usuario: </label>
                        <input type="text" name="usuario" required /><br><br>
                        <label>Ingresa una contraseña: </label>
                        <input type="password" name="password" required /><br><br><br>
                        
                        </select>
                        <input type="submit" name="Registrar" value="Registrar"/>
                        <input type="hidden" name="re" value="re">
                         <p>
                        </p>
                        <a href="index.php">Regresar!</a>
                        </form>
                         </div>
            </body>
        <?php } ?>
            
            
        <?php } else {
        
    
      
            $valores = array_keys($_COOKIE); //guarda en un arreglo todas las cookies de la pagina
            $arreglo[]="";//crea un arreglo para guardar los usuarios logueados
            for ($x=0;$x<count($valores)-1;$x++){
            $valorCokie= @$_COOKIE[$valores[$x]];
            $subcadena  = ',';
            $comprobacion = strpos($valorCokie, $subcadena);
                if ($comprobacion === false) { //comrpueba las cookies
                // echo "es una cookie que ya viene por defecto";
                } else { //si la cookie no es por defecto debera comprobar que ya se haga logueado
                    list($name, $user, $pw,$estado) = (explode(",",@$_COOKIE[$valores[$x]])); //recorre el arreglo que contiene todas las cookies de la pagina
                    if ($estado=="lo"){ //comprueba si el usuario ya se logueo
                        $arreglo[$x]= $user; //guarda el usuario en un arreglo para mostrarlo en el select s
                        }else{
                        }
                }
            }
            ?>
            <body>
                
            <div id="login">
                            <form action= "usuario.php" method="GET">
                                <label>Usuario: </label> 
                                <input type="text" name="usuario" id="usuario" onkeyup="mostrarContraseñaAutocompletado(this.value);"value="<?php echo $us;?>" required />
                                
                                <select id="usuarios_logueados" onchange="mostrarContraseñaCombo(this.value)">
                                <option>USUARIOS</option>
                                <?php
                                if ($arreglo!=""){
                                 foreach($arreglo as $e)
                                {
                                echo "<option value='".$e."'>".$e."</option>";
                                }
                            }
                                ?>
                              
                                </select>
                                <label>Usuarios Logueados</label>
                                <br>
                                <label>Contraseña: </label>
                                <input type="password" name="password" id="password"value="<?php echo $pw;?>" required />
                                <input type="submit" name="Enviar" value="INICIAR SESION"/>
                                <input type="hidden" name="re" value="lo">
                                <br>
                                <input type="checkbox" id="recordar"name="recordar" value="recordar">Recordar contraseña<br>
                                <p>
                                </p>
                                <a href="#"onClick="BorrarCookies();">BorrarCookies</a>
                                <a href="index.php?opc=registrar">Registrate aqui!</a>
                            </form>
                        </div>
                        <input type="button" name="Enviar" onClick=" window.location.href='carrito.html' "value="regresar"/>
                               
            </body>

        <?php } ?>                   

   </body>
   <style>
       body{
           background-image: url("imagenes/fondo.jpg");
       }
       #login {
    background-color: rgb(63, 15, 15);
    border-radius: 8px;
    box-shadow: 3px 3px 10px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow: 3px 3px 10px 0px rgba(50, 50, 50, 0.75);
    -webkit-box-shadow: 3px 3px 10px 0px rgba(50, 50, 50, 0.75);
    margin-left: auto;
    margin-right: auto;
    margin-top: 10%;
    max-width: 500px;
    padding-bottom: 10px;
    padding-top: 10px;
 }
 
 /* Etiquetas del formulario */
 
 label {
    color: white;
    display: block;
    margin-bottom: 6px;
    margin-left: 1.2em;
 }
 
 /* Campos del formulario */
 select{
     float: left;
     margin-left: 20px;
     height:2em;
 }
 input[type="text"],
 input[type="password"] {
    border: none;
    border-radius: 6px;
    display: block;
    font-size: 1em;
    height: 2em;
    text-align: center;
    width: 200px;
    margin-left: 20px;
    float:left;
    
 }
 
 /* Botón */
 input[type="button"],
  input[type="submit"] {
    background-color: #000;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 1em;
    height: 3em;
   margin-left: 20px;
    margin-top: -10px;
    text-align: center;
    width: 150px;
 }
 input[type="button"]{
     background-color: red;
     margin-top:20px;
     margin-left:510px;
 }
 input[type="submit"]:hover {
    cursor: pointer;
    background-color: #A33D41;
    opacity: 0.8;
 }
 a{
     margin-left: 10px;
 }
       </style>
</html>