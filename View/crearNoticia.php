<!DOCTYPE html>
<html>
<head>
    <?php include '../View/Includes/header.html'; ?>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


</head>
<body>
<div class="container">
    <?php include '../View/Includes/adminNav.html'; ?>
<!-- New Form -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <h3>Crea tu notícia</h3>
        <form name="sentMessage" id="contactForm" action="">
            <div class="control-group form-group">
                <div class="controls">
                    <label for="titulo">Título:</label>
                    <input name="titulo" type="text" class="form-control" id="titulo" required data-validation-required-message="Título">
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group form-group">
                <div class="controls">
                    <label for="subtitulo">Subtítulo:</label>
                    <input name="subtitulo" type="text" class="form-control" id="subtitulo" required data-validation-required-message="Subtítulo">
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group form-group">
                <div class="controls">
                    <label for="texto">Texto notícia</label>
                    <textarea  rows="10" cols="100" class="form-control" id="textoNoticia" required data-validation-required-message="Texto notícia"
                              name=" texto editor1">

                    </textarea>
                </div>
            </div>

            <div class="control-group form-group">
                <div class="controls">
                    <label>Fecha:</label>
                    <input type="date" class="form-control" id="fecha" required data-validation-required-message="Fecha">

                </div>
            </div>

            <div class="control-group form-group">
                <div class="form-group">
                    <label for="seleccionSeccion">Selecciona la sección</label>
                    <select class="form-control" id="seleccionSeccion">
                        <option label="actualidad">Actualidad</option>
                        <option label="politica">Política</option>
                        <option label="cultura">Cultura</option>
                        <option label="deportes">Deportes</option>

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
                    <label for="keywords">Palabras clave:</label>
                    <input  name="keywords" type="text" class="form-control" id="palabrasClave" data-validation-required-message="Palabras clave">
                </div>
            </div>

            <div class="control-group form-group">
                <div class="controls">
                    <label>Autor notícia:</label>
                    <input type="text" class="form-control" id="autorNoticia" required data-validation-required-message="Autor notícia" value="DNI, id Usuario???">
                </div>
            </div>

            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="guardarNoticia">Guardar notícia</button>

            <button type="submit" class="btn btn-primary" id="modificarNoticia">Modificar notícia</button>
        </form>
    </div>

</div>
</div>
<script>
    CKEDITOR.replace('editor1');
</script>
<!-- /.row -->
</body>
</html>

