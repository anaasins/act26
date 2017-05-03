<?php
include 'seguridad.php';
$sesion=new Seguridad();
if (isset($_SESSION['usuario'])==false) {
  header('Location: index.php');
}else {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Mi perfil</title>
    </head>
    <style>
      body{
        background-color: <?php echo $color=$sesion->cookieColor(); ?>;
      }
    </style>
    <body>
      <form class="" action="actualizar.php" method="post">
        <?php
          include 'usuario.php';
          $perfil=new Usuario();

          $formperfil=$perfil->MiPerfil($_SESSION['usuario']);
          $rol=0;
          foreach ($formperfil as $fila) {
            echo "<input type='text' name='email' value='".$fila['email']."' readonly><br><br>";
            echo "<input type='text' name='nombre' value='".$fila['nombre']."'><br><br>";
            echo "<input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
            $rol=$fila['rol'];
          }
         ?>
         <select class="" name="roles">
           <?php
           $roles=$perfil->Roles();
           foreach ($roles as $fila) {
             if ($fila['rol']==$rol) {
               echo "<option value='".$fila['rol']."' name='".$fila['rol']."' selected='selected'>".$fila['rol']."</option>";
             }else {
               echo "<option value='".$fila['rol']."' name='".$fila['rol']."'>".$fila['rol']."</option>";
             }
           }
            ?>
         </select>
         <br><br>
         <select class="" name="color">
           <option value="red" name="red">Rojo</option>
           <option value="green" name="green">Verde</option>
           <option value="blue" name="blue">Azul</option>
           <option value="white" name="white">Blanco</option>
           <option value="pink" name="pink">Rosa</option>
           <option value="plum" name="plum">Lila</option>
         </select>
         <br><br>
         <input type="submit" name="actualizar" value="Actualizar">
      </form>

    </body>
  </html>
  <?php
}

 ?>
