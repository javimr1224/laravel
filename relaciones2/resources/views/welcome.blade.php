
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-4">

        <div class="row justify-content-center">
            <div class="col-auto">
                <h3>Alumno <span class="badge bg-secondary">{{$alumno->nombre}}</span> cursa las materias: </h3>

                <table class="table table-striped table-hover">
                    <thead>
                        <th class="bg-primary text-white">MATERIAS</th>
                    </thead>
                    <tbody>
                        @foreach ($alumno->materias as $registro)
                            <tr>
                                <td>{{$registro->nombre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3>Materia <span class="badge bg-secondary">{{$materia->nombre}}</span> es cursado por: </h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="bg-primary text-white">ALUMNOS</th>
                    </thead>
                    <tbody>
                        @foreach ($materia->alumnos as $registro)
                            <tr>
                                <td>{{$registro->nombre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>