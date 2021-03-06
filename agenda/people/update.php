<?php
// Ejecutamos la lógica de arranque de la app, o lógica de bootstrap
require '../vendors/AgendaPHPGuay/People.php';
use \AgendaPHPGuay\People;
// Si es una petición POST...
if($_POST)
{    
    // Actualizamos los datos
    People::getInstance(__DIR__ . "/../data/people.csv")
        ->update($_POST)
        ->write();
    // Redireccionamos a la home
    header('Location: /agenda/people/list.php ');
    exit;
}
// Si no es una petición POST, atendemos a petición GET...
?>
<!DOCTYPE html>
<html lang="es">
    <?php include '../views/head.php'; ?>
    <body>
        <div class="container-narrow">
            <div class="masthead">
                <h3 class="muted">Agenda PHP guay</h3>
            </div>
            <div class="jumbotron">                
                <a class="btn btn-large btn-success" href="list.php">&lt;&lt; Volver atrás</a>
            </div>
            <hr/>
            <h3>Actualizar contacto</h3>
            <form role="form" method="post">                                 
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_GET['name']; ?>" placeholder="Escribe un nombre..." required>
                </div>
                <div class="form-group">
                    <label for="surname">Apellido:</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $_GET['surname']; ?>" placeholder="Escribe un apellido..." required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_GET['email']; ?>" placeholder="Escribe un email..." required readonly>
                </div>                
                <button type="submit" class="btn btn-default">Guardar cambios</button>
            </form>
            <hr/>
            <?php include '../views/footer.php'; ?>
        </div> <!-- /container -->
        <script src="../assets/bootsrap/js/bootsrap.min.js"></script>
    </body>
</html>