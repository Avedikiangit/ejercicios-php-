<?php

session_start();

if (isset($_SESSION["listadoclientes"])) {

    $aclientes = $_SESSION["listadoclientes"];
} else {

    $aclientes = array();
}

if (isset($_POST["enviar"])) {

    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];

    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    $aclientes[] = array("nombre" => $nombre, "dni" => $dni, "telefono" => $telefono, "edad" => $edad);
    $_SESSION["listadoclientes"] = $aclientes;
}

if(isset($_GET["pos"])){

    $pos=$_GET["pos"];

    unset($aclientes[$pos]);

   $_SESSION["listadoclientes"]=$aclientes;

   header("Location: tabladeclientes.php");
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="py-3 container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tabala de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1 me-5">
                <form action="" method="POST" class="form">
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control my-2">

                        <label for="txtDni">DNI</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control my-2">

                        <label for="txtTelefono">Telefono</label>
                        <input type="text" id="txtTelefono" name="txtTelefono" class="form-control my-2">

                        <label for="txtEdad">Edad</label>
                        <input type="text" id="txtEdad" name="txtEdad" class="form-control my-2">

                        <div class="py-3">
                            <button type="submit" name="enviar" class="btn bg-primary px-4 text-white  ">Enviar</button>
                            <button type="submit" name="eliminar" class="btn bg-danger px-4  text-white">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-6 ms-5">
                <table class="table table-hover shadow border ">
                    <thead>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($aclientes as $pos => $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?> </td>
                                <td><?php echo $cliente["dni"]; ?> </td>
                                <td><?php echo $cliente["telefono"]; ?> </td>
                                <td><?php echo $cliente["edad"]; ?> </td>
                                <td> <a href="tabladeclientes.php?pos=<?= $pos ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>

    </main>
</body>

</html>