<?php 

$iva=21;

$Preciosiniva=0;    

$Precioconiva=0;

$precioivacantidad=0;
if($_POST){
  
    $iva=$_POST["lstIva"];
   
    $Preciosiniva=($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"]:0;
   
    $Precioconiva=($_POST["txtPrecioConIva"])> 0? $_POST["txtPrecioConIva"]:0;

    if($Preciosiniva > 0 ){
        $Precioconiva = $Preciosiniva * ($iva/100 + 1);
    }
    if($Precioconiva > 0){

        $Preciosiniva = $Precioconiva / ($iva / 100 + 1);


    }
    
    $precioivacantidad = $Precioconiva - $Preciosiniva;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-2 ">
                <form method="POST">
                    <div>
                        <label for="">IVA</label>
                        <SELECt name="lstIva" id="lstIva" class="form-control">
                            <option value="10.5">10.5</option>
                            <option value="19">19</option>
                            <option value="21" selected >21</option>
                            <option value="27">27</option>
                        </SELECt>
                    
                    </div>
                     
                    <div>
                        <label for="">Precio sin IVA</label>
                        <input type="text" id="txtPrecioSinIva" name="txtPrecioSinIva" class="form-control">
                    </div>
                   <div>
                        <label for="">Precio con IVA</label>
                        <input type="text" id="txtPrecioConIva" name="txtPrecioConIva" class="form-control">
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary px-4  ">Enviar</button>
                    </div>

                </form>
            </div>
            <div class="col-5 pt-4">
                <table class="table table-hover border ">
                    <tr>
                        <th>IVA</th>
                        <td> <?php echo $iva?> % </td>
                    </tr>
                    
                    <tr>
                        <th>Precios sin IVA</th>
                        <td><?php echo number_format($Preciosiniva,2,",","." );  ?></td>
                    </tr>
                    
                    <tr>
                        <th>PRECIO CON IVA</th>
                        <td><?php echo  number_format($Precioconiva,2,",","." );?></td>
                    </tr>
                    
                    <tr>
                        <th>IVA</th>
                        <td><?php echo  number_format($precioivacantidad ,2,",","." );?></td>
                    </tr>
                    
                    
                    
                </table>
                
            </div>
            
        </div>

    </main>    
</body>
</html>