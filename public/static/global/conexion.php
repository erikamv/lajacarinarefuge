<?php 

  // Nos conectamos a la Base de Datos MySQL
  $con = mysqli_connect("proyectohospitalariodiagnosticos.mysql.database.azure.com", "diagnosticoAdmin@proyectohospitalariodiagnosticos", "Diagnosticos123456", "veterinaria");
 
  // Verificamos la conexión a la Base de Datos MySQL 
  if (mysqli_connect_errno()) {
      echo "Error al Conectar a la base de Datos: " . mysqli_connect_error();
  }

?>

