<?php   if (isset ($contexto['mensaje'])) {
            echo $contexto['mensaje'];
        }
        
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/modern-business.css" rel="stylesheet">

    <!-- Mi css -->
    <link href="../../css/micss.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">

            <!-- Registro -->
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Registrar</h3>
                        <form method="post" action="" id="formularioRegistro" >
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Apellidos *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel1">
                                    <option selected disabled>Rol *</option>
                                    <option>Administrador</option>
                                    <option>Periodista</option>
                                    <option>Editor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Usuario *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Clave *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="cpassword" class="form-control" placeholder="Repetir clave *" value="" />
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Registrar" id="registrar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>

         $("#formularioRegistro").validate({

            rules:
            {
                password: {
                required: true,
                minlength: 8,
                maxlength: 20
                },
                cpassword: {
                required: true,
                equalTo: '#password'
                },
            },

            messages:
            {
                password:{
                required: "Porfavor introduzca una clave",
                minlength: "La clave debe tener un almenos 8 caracteres"
                },
                cpassword:{
                required: "Vuelva a introducir su clave",
                equalTo: "Las claves no coinciden !"
                },
            },
            
        })

        </script>
</body>



</html>
