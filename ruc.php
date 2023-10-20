<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de RUC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <br>
                <h3>Consulta de RUC</h3>
                <br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" id="ruc" name="ruc" aria-describedby="button-addon">
                    <div class="input-group-append mx-4">
                        <button class="btn btn-outline-primary" type="button" id="pruebaruc">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-9">
            <div class="col-md-9 offset-md-3">                
                <table class="table mt-4">
                    <tbody>
                        <tr>
                            <td><strong>RUC:</strong></td>
                            <td><span id="rucNumero"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Condición:</strong></td>
                            <td><span id="condicion" style="color: green;"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Nombre o Razón Social:</strong></td>
                            <td><span id="razonsocial"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Estado:</strong></td>
                            <td><span id="estado" style="color: green;"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Dirección:</strong></td>
                            <td><span id="direccion"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Departamento:</strong></td>
                            <td><span id="departamento"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Provincia:</strong></td>
                            <td><span id="provincia"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Distrito:</strong></td>
                            <td><span id="distrito"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Ubigeo:</strong></td>
                            <td><span id="ubigeo"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Vía Tipo:</strong></td>
                            <td><span id="viaTipo"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Vía Nombre:</strong></td>
                            <td><span id="viaNombre"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Número:</strong></td>
                            <td><span id="numero"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de Documento:</strong></td>
                            <td><span id="tipoDocumento"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="index.php" class="btn btn-primary mt-2">Consulta DNI</a>
   
</div>


    <script>
        $("#pruebaruc").click(function() {
            var ruc = $("#ruc").val();
            $.ajax({
                type: "POST",
                url: "controller/consultaRuc.php",
                data: 'ruc=' + ruc,
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        alert('El RUC debe tener 11 dígitos');
                    } else {
                        console.log(data);
                        $("#rucNumero").html(data.numeroDocumento);
                        $("#condicion").html(data.condicion);
                        $("#razonsocial").html(data.nombre);
                        $("#estado").html(data.estado);
                        $("#direccion").html(data.direccion);
                        $("#departamento").html(data.departamento);
                        $("#provincia").html(data.provincia);
                        $("#distrito").html(data.distrito);
                        $("#viaNombre").html(data.viaNombre);
                        $("#ubigeo").html(data.ubigeo);
                        $("#viaTipo").html(data.viaTipo);
                        $("#numero").html(data.numero);
                        $("#tipoDocumento").html(data.tipoDocumento);
                    }
                }
            });
        });
    </script>
</body>

</html>
