<!-- crud -->
<?php
    try{
    $conn= new PDO('mysql:host=localhost;dbname=aplicacion_lista_de_tareas','root',''); 
}catch(PDOException $e){
        echo "Error de conexión:".$e->getMessage();
    }

//actualizar estado de tareas
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $completada=(isset($_POST['Completada']))?1:0;

    $sql="UPDATE tarea SET Completada=? WHERE idTarea=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$completada,$id]);
}

// agregar tareas
if(isset($_POST['agregar_tarea'])) //detecto lo que manda el  botón de submit "agregar tarea" y si se validó, con el isset, lo designo a los campos de la tupla
{
    $tareaTitulo=($_POST['TituloTarea']); //el titulo tarea proviene del input
    $descripcion=($_POST['tarea']);
    
    $sql = 'INSERT INTO tarea (TituloTarea, nombreTarea) VALUES (?, ?)';
    $sentencia= $conn->prepare($sql); //'prepare' prepara la insert para que entre la info en el campo donde está '?'
    $sentencia->execute([$tareaTitulo,$descripcion]);
}

//borrado de tareas
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM tarea WHERE idTarea=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$id]);
}
// consulta de tareas 
$sql = "SELECT * FROM tarea";
$registros_tarea=$conn->query($sql);
?>