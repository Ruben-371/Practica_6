<?php

if(isset($_POST['guardar'])){

    $nombres = $_POST['nombre'];

    $matriculas = $_POST['matricula'];

    $sexos = $_POST['sexo'];

    echo "<h2>Mujeres registradas</h2>";

    echo "<table border='1'>";

    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Matricula</th>";
    echo "<th>Sexo</th>";
    echo "</tr>";

    for($i = 0; $i < count($nombres); $i++){

        if($sexos[$i] == "F"){

            echo "<tr>";

            echo "<td>".$nombres[$i]."</td>";

            echo "<td>".$matriculas[$i]."</td>";

            echo "<td>".$sexos[$i]."</td>";

            echo "</tr>";
        }
    }

    echo "</table>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Registro de alumnos</title>
</head>
<body>

<?php

if(isset($_POST['cantidad'])){

    $cantidad = $_POST['cantidad'];

?>

<h2>Captura de alumnos</h2>

<!-- formulario donde se capturan los alumnos -->
<form method="POST">

<?php

for($i = 0; $i < $cantidad; $i++){

?>

<!-- título que indica el número de alumno -->
<h3>Alumno <?php echo $i + 1; ?></h3>

Nombre:<br>

<!-- input para capturar el nombre -->
<!-- nombre[] indica que los datos se guardarán en un arreglo -->
<input type="text" name="nombre[]" required><br><br>

Matricula:<br>

<!-- input para capturar la matricula -->
<input type="text" name="matricula[]" required><br><br>

Sexo:<br>

<!-- radio button para seleccionar masculino -->
<!-- sexo[0], sexo[1], sexo[2] etc dependiendo del alumno -->
<input type="radio" name="sexo[<?php echo $i; ?>]" value="M" required> Masculino

<!-- radio button para seleccionar femenino -->
<input type="radio" name="sexo[<?php echo $i; ?>]" value="F" required> Femenino

<br><br>

<?php
}
?>

<!-- botón para enviar los datos -->
<button type="submit" name="guardar">Guardar</button>

</form>

<?php

}else{

?>

<h2>¿Cuántos alumnos desea capturar?</h2>

<!-- primer formulario para pedir la cantidad -->
<form method="POST">

<!-- input para escribir la cantidad -->
<input type="number" name="cantidad" required>

<br><br>

<!-- botón para enviar la cantidad -->
<button type="submit">Continuar</button>

</form>

<?php
}

?>

</body>
</html>
