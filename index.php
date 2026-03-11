<?php

# -----------------------------
# PASO 3: PROCESAR LOS DATOS
# -----------------------------
# isset verifica si el botón "guardar" fue presionado
# si se presiona, significa que ya se llenaron los datos de los alumnos
if(isset($_POST['guardar'])){

    # los nombres llegan como arreglo porque los inputs usan nombre[]
    $nombres = $_POST['nombre'];

    # las matriculas también llegan como arreglo
    $matriculas = $_POST['matricula'];

    # los sexos llegan como arreglo
    $sexos = $_POST['sexo'];

    # título que se mostrará en pantalla
    echo "<h2>Mujeres registradas</h2>";

    # inicio de tabla HTML
    echo "<table border='1'>";

    # encabezado de la tabla
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Matricula</th>";
    echo "<th>Sexo</th>";
    echo "</tr>";

    # ciclo for para recorrer todos los alumnos capturados
    # count($nombres) cuenta cuántos alumnos hay
    for($i = 0; $i < count($nombres); $i++){

        # condición para verificar si el sexo es femenino
        if($sexos[$i] == "F"){

            # si es mujer se imprime una fila en la tabla
            echo "<tr>";

            # se imprime el nombre
            echo "<td>".$nombres[$i]."</td>";

            # se imprime la matricula
            echo "<td>".$matriculas[$i]."</td>";

            # se imprime el sexo
            echo "<td>".$sexos[$i]."</td>";

            echo "</tr>";
        }
    }

    # cierre de la tabla
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

# -----------------------------
# PASO 2: GENERAR FORMULARIOS
# -----------------------------
# isset verifica si ya se envió la cantidad de alumnos
if(isset($_POST['cantidad'])){

    # guardamos la cantidad de alumnos
    $cantidad = $_POST['cantidad'];

?>

<h2>Captura de alumnos</h2>

<!-- formulario donde se capturan los alumnos -->
<form method="POST">

<?php

# ciclo for que genera los formularios según la cantidad
# si el usuario escribió 3, se crearán 3 formularios
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

# -----------------------------
# PASO 1: PEDIR CANTIDAD
# -----------------------------
# si todavía no se ha enviado la cantidad
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