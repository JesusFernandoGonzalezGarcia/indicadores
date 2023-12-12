<!doctype html>
<html lang="en">

<head>
    <title>Ejemplo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Tareas</a>

        <ul class="navbar-nav">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-lg-2" type="search" id="search" placeholder="Busca tu tarea...">
                <button class="btn btn-success my-2 my-sm-0" type="submit">
                    Buscar
                </button>
            </form>
        </ul>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="task-form">
                            <input type="hidden" id="tareaId">
                            <div class="form-group">
                                <input type="text" id="nombre" placeholder="Nombre de la tarea" class="form-control mb-4">
                            </div>
                            <div class="form-group">
                                <textarea id="descripcion" cols="30" rows="10" class="form-control mb-4" placeholder="Descripcion de la tarea"></textarea>
                            </div>
                            
                            <button id="btn_registrar" type="submit" class="btn btn-success btn-block text-center">
                                Registrar <i class="bi bi-save"></i>
                            </button>
                                <button id="btn_cancelar" type="reset" class="btn btn-secondary btn-block text-center">
                                Cancelar <i class="bi bi-x-octagon"></i>
                                </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card my-4" id="resultadoTarea">
                    <div class="card-body">
                        <ul id="container">

                        </ul>
                    </div>
                </div>
                <table class="table table-bordered table-hover tble-sm">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                        </tr>
                    </thead>
                    <tbody id="tareas">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>