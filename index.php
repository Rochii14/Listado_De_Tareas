<?php include("agregarTarea.php");?>

<!doctype html>
<html lang="en">
    <head>
        <title>Lista de tareas</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Madimi+One&display=swap" rel="stylesheet">
        <link rel="icon" href="imagenes\icons8-lista-de-tareas-16.png" type="image" sizes="32x32">
        <style> 
            .done{ text-decoration: line-through;}/* tacha lo que está hecho */
            .footer{background-color: #0065f9  ; 
                    position: absolute; 
                    bottom:0;width:100%;
                    text-align:center;
                    border-radius: 5px;
                    box-shadow: 2px 2px rgb(182, 179, 182);
                    font-family: "DM Sans", sans-serif;
                    font-weight: 400;
                    font-style: normal;
                    color: white;
                    }
            .titulo{text-align:center;}  
            .formulario {display: flex; 
                        flex-direction: column; 
                        align-items: center; 
                        text-align: left; 
                        gap: 10px;}  
            .formulario label {
                        width: 100%; 
                        text-align: left; 
                        } 
            .list-group-item {
                        display: flex; /* Activa Flexbox */
                        align-items: center; /* Alinea verticalmente todos los elementos */
                        justify-content: space-between; /* Espacia el botón a la derecha */
                        gap: 10px; /* Espacio entre checkbox, texto y botón */
                        } 
            .done {
                    text-decoration: line-through; /* Tachar texto si está completada */
                    color: gray; /* Opcional: cambiar el color */
                }

            button.btn a {
                text-decoration: none; /* Eliminar subrayado del enlace */
                color: white; /* Color del ícono X */
                        }           
        </style> 
        
    </head>

    <body>
        <header></header>
        <main class="container"> <!--Agregar  tarea -->
            <div class="card">
                <div class="card-header"><h1 class="titulo">Listar tareas</h1></div>
                <!-- ------------------------------CREAR LA TAREA------------------------------ -->
                <div class="mb-3">
                    <form action="" method="post" class="formulario">
                        <label for="TituloTarea" class="form-label">Titulo:</label> <!--///validar que lo que mande no sea vacio porque si posteo, crea un registro -->
                        <input type="text" class="form-control" name="TituloTarea" id="TituloTarea" aria-describedby="helpId" placeholder="Escriba el titulo"/>
                        
                        <label for="tarea" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="tarea" placeholder="Ingrese la descripción" />

                        <input name="agregar_tarea" id="agregar_tarea" class="btn btn-primary" type="submit" value="Agregar tarea" />
                    </form>
                </div>
                <!-- ------------------------------LISTAR TAREAS------------------------------ -->
                <ul class="list-group"> <!-- fijarme si puedo poner el list group color-->

                    <?php foreach($registros_tarea as $tarea){ ?>
                        <li class="list-group-item ">

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $tarea['idTarea'] ?>">
                                <input class="form-check-input" type="checkbox" name="Completada" onChange="this.form.submit()" <?php echo ($tarea['Completada']==1)?'checked':''; ?> />
                            </form>

                            <p><?php echo $tarea['TituloTarea']; ?></p>
                            <span class="<?php echo ($tarea['Completada']==1)?'done':''; ?>"><?php echo $tarea['nombreTarea']; ?></span>
                             <button class="btn" ><!-- ///BORRAR TAREAS LISTADAS -->
                                    <a href="?id=<?php echo $tarea['idTarea'];?>" onclick="return confirm('¿Seguro que deseas eliminar esta tarea?');">
                                            <span class="badge bg-danger">X</span>
                                    </a>
                            </button>
                        </li>                           
                    <?php } ?>    
                </ul>

            </div>
            
        </main>
         <footer>
             <p class="footer">Hecho por Valdevieso</p> 
        </footer> 
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" ></script>
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous" ></script>
    </body>
</html>
