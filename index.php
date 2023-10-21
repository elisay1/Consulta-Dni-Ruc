<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumir API DE RENIEC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- agregamos jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-3">
                    <br>
                    <h3>CONSULTA DNI</h3>
                    <br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" id="documento" aria-describedby="button-addon">
                        <div class="input-group-append mx-3">
                            <button class="btn btn-outline-primary" type="button" id="buscar">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Aca se muestra los datos -->
        <div class="container">
            <div class="center">
                <div class="col-md-4 offset-md-3">
                    <div class="form-group mx-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-1 mx-1"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI">
                        </div>
                    </div>
                    <br>
    
                    <div class="form-group mx-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-1 mx-1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="nombre"  name="nombre"  placeholder="Nombre">
                        </div>
                    </div>
                    <br>
    
                    <div class="form-group mx-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-1 mx-1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="apellidopaterno" name="apellidoPaterno" placeholder="Apellido paterno">
                        </div>
                    </div>
                    <br>
    
                    <div class="form-group mx-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-1 mx-1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="apellidomaterno" name="apellidoMaterno" placeholder="Apellido materno">
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="ruc.php" class="btn btn-primary mt-4">Consulta RUC</a>
                </div>
            </div>
        </div>

    </form>





    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>

<script>
    $('#buscar1').click(function() { //traemos al dar click en buscar con jquery #buscar
        //para saber que nos esta mandando el buscar hacemos de la siguiete manera
        //data=$('#documento').val();
        //console.log(data);
        dni = $('#documento').val(); //interceptamos el dni
        $.ajax({
            url: 'controller/consultaDNI.php',
            type: 'post',
            data: 'dni=' + dni, //traemos los datos del input con jquery #documento
            dataType: 'json', //el tipo de dato es json  
            success: function(r) { //creamos una variable
                if (r.numeroDocumento == dni) {
                    $('#dni').val(r.numeroDocumento);
                    $('#nombre').val(r.nombres);
                    $('#apellidopaterno').val(r.apellidoPaterno);
                    $('#apellidomaterno').val(r.apellidoMaterno);
                } else {
                    alert(r.error);
                }
            }
        });
    });
</script>

<script>
    $('#buscar').click(function() {
        dni = $('#documento').val();
        $.ajax({
            url: 'controller/consultaDNI.php',
            type: 'post',
            data: 'dni=' + dni,
            dataType: 'json',
            success: function(r) {
                if (r.numeroDocumento == dni) {
                    $('#dni').val(r.numeroDocumento);
                    $('#nombre').val(r.nombres);
                    $('#apellidopaterno').val(r.apellidoPaterno);
                    $('#apellidomaterno').val(r.apellidoMaterno);

                    // Ahora, guardemos los datos en el servidor
                    $.ajax({
                        url: 'guardarDatos.php',
                        type: 'post',
                        data: {
                            dni: r.numeroDocumento,
                            nombre: r.nombres,
                            apellidoPaterno: r.apellidoPaterno,
                            apellidoMaterno: r.apellidoMaterno
                        },
                        success: function(response) {
                            alert(response); // Muestra un mensaje con la respuesta del servidor
                        }
                    });
                } else {
                    alert(r.error);
                }
            }
        });
    });
</script>


</html>