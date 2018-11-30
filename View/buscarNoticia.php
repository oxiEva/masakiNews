<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../View/Includes/header.html'; ?>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


</head>
<body>
<div class="container">
    <?php include '../View/Includes/adminNav.html'; ?>
    <div class="row">
        <div class="col-lg-8 mb-4">

            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Buscador de noticias</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" name="busqueda" type="button" onclick="buscar()">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <?php /*
            function buscar()
            {
                $conexion = new Conexion();
                $query = "SELECT * FROM noticias WHERE titulo LIKE '%$busqueda%' OR autor LIKE '%$busqueda% ";
                $result= $conexion->query($query);
                return $result;
        
                while ($fila = $result->fetch_assoc()) {
                    echo "ID: " . $fila['idnoticia'] . ", Nombre: " . $fila['autor'] . ", Título: " . $fila['titulo'] . "<br>";
                }
            }*/
            ?> 

            <h3>Modifica notícia</h3>
            <form name="sentMessage" id="contactForm" action="">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Título:</label>
                        <input type="text" class="form-control" id="titulo" required data-validation-required-message="Título">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label>Subtítulo:</label>
                        <input type="text" class="form-control" id="subtitulo" required data-validation-required-message="Subtítulo">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label>Texto notícia</label>
                        <textarea rows="10" cols="100" class="form-control" id="textoNoticia" required data-validation-required-message="Texto notícia"
                                  name="editor1">

                    </textarea>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label for="Fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" required data-validation-required-message="Fecha">

                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="form-group">
                        <label for="seleccionSeccion">Selecciona la sección</label>
                        <select class="form-control" id="seleccionSeccion">
                            <option>Actualidad</option>
                            <option>Política</option>
                            <option>Cultura</option>
                            <option>Deportes</option>

                        </select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls form-control-file">
                        <label for="imagen">Selecciona una imagen</label>
                        <input type="file" name="imagen" id="imagen"  data-validation-required-message="Adjunta una imagen">
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label>Palabras clave:</label>
                        <input type="text" class="form-control" id="palabrasClave" required data-validation-required-message="Palabras clave">
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label>Autor notícia:</label>
                        <input type="text" class="form-control" id="autorNoticia" required data-validation-required-message="Autor notícia">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" aria-label="Publicada" value="Publicada">
                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Publicada" value="Publicada">
                </div>


                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-info" id="guardarNoticia">Guardar notícia</button>
            </form>
        </div>



    </div>
    <!-- /.row -->


</div>

<script>
    CKEDITOR.replace('editor1');
</script>
<!-- /.row -->
</body>
</html>


