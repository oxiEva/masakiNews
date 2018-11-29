<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";

//*Inicialitzem variables
$resultat = true;
$errores = array();

/*Reanudem la sessió*/
session_start();

///*Guardem els valors introduits en el formulari
if(isset($_POST["submit"]) && $_POST(['submit'] == 'guardar')){
    $novaNew = new Noticias();
    $novaNew->crearNew();

    echo 'Hola, dades insertades';


    $autorNoticia =$_POST['autorNoticia'];
    $editorNoticia = $_POST['editorNoticia'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $texto= $_POST['texto'];
    $imagen = $_POST['imagen'];
    $idSeccion = $_POST['idSeccion'];

}


///*Filtres php
///



if(isset($_POST['titulo'])) {

    $novaNew = new Noticias();

    $novaNew->crearNew();
    echo 'Nueva noticia subida en la base de datos con éxito . <br>';

    echo "<a href='../View/accionesNoticia.php'  class='register'>" . "Volver atrás" . "</a>";


    $autorNoticia = $_SESSION['username'];

    $editorNoticia = $_POST['editorNoticia'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $texto = $_POST['texto'];
    $imagen = $_POST['imagen'];
    $idSeccion = $_POST['idSeccion'];
    $fechaCreacion = date('today');
    $fechaModificacion = date('d-m-Y');
    $fechaPublicacion = date('d-m-Y');

    /*if (empty($_POST['autorNoticia'])) {
        $errores[] = "Falta autor";
    }
    if (empty($_POST['editorNoticia'])) {
        $errores[] = "editorNoticiaes requerida";
    }*/

    if (empty($_POST['titulo'])) {
        $errores[] = "titulo es requerida";
    }
    if (empty($_POST['subtitulo'])) {
        $errores[] = "Subtitulo es requerida";
    }
    if (empty($_POST['texto'])) {
        $errores[] = "El texto es requerido";
    }
    if (empty($_POST['idSeccion'])) {
        $errores[] = "La id seccion es requerida";
    }




}




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
<!-- New Form -->
<div class="row">
    <ul>
        <?php
        if(isset($errores)){
            foreach ($errores as $error){
                print "<h4>". $error . "</h4>";
            }
        }
        ?>
    </ul>
    <div class="col-lg-8 mb-4">
        <h3>Crea tu noticia <?php echo $_SESSION['username']?></h3>
        <form name="sentMessage" method="post" id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
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
                    <label for="texto">Texto noticia:</label>
                    <textarea  rows="10" cols="100" class="form-control" id="textoNoticia" required data-validation-required-message="Texto notícia"
                              name="texto">

                    </textarea>
                </div>
            </div>

            <!-- Trec el camp fecha de creación pq el guardem amb $avui q és $avui = date("Y-m-d")
            <div class="control-group form-group">
                <div class="controls">
                    <label>Fecha:</label>
                    <input type="date" class="form-control" id="fecha" required data-validation-required-message="Fecha">

                </div>
            </div>-->

            <div class="control-group form-group">
                <div class="form-group">
                    <label for="seleccionSeccion">Selecciona la sección</label>
                    <select name="idSeccion" class="form-control" id="idSeccion">
                        <option value="1" label="1 actualidad">Actualidad</option>
                        <option value="2" label="2 politica">Política</option>
                        <option value="3" label="3 cultura">Cultura</option>
                        <option value="4" label="4 deportes">Deportes</option>

                    </select>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls form-control-file">
                    <label for="imagen">Selecciona una imagen</label>
                    <input type="file" name="imagen" id="imagen"  data-validation-required-message="Adjunta una imagen">
               </div>
            </div>

            <!--<div class="control-group form-group">
                <div class="controls">
                    <label for="keywords">Palabras clave:</label>
                    <input  name="keywords" type="text" class="form-control" id="palabrasClave" data-validation-required-message="Palabras clave">
                </div>
            </div>-->

            <!--<div class="control-group form-group">
                <div class="controls">
                    <label>Autor notícia:</label>
                    <input type="text" class="form-control" id="autorNoticia" required data-validation-required-message="Autor notícia" value="">
                </div>
            </div>-->

            <!--<div class="control-group form-group">
                <div class="controls">
                    <label>Editor notícia:</label>
                    <input type="text" class="form-control" id="editorNoticia" required data-validation-required-message="Editor notícia" value="">
                </div>
            </div>-->

            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="guardarNoticia" value="guardar">Guardar notícia</button>

            <!--<button type="submit" class="btn btn-primary" id="modificarNoticia">Modificar notícia</button>-->
        </form>
    </div>

</div>
</div>
<script>
    CKEDITOR.replace('texto');
</script>
<!-- /.row -->
</body>
</html>

