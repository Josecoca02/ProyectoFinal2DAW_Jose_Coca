<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Mostrar Cancha</h1>
        <p>Nombre: {{ $cancha -> nombre}}</p>
        <p>Localidad: {{ $cancha -> localidad}}</p>
        <p>Direccion: {{ $cancha -> direccion}}</p>
        <p>Precio: {{ $cancha -> precio}} €</p>
        <p>Foto<img src="{{ asset('storage/' . $cancha->foto) }}" alt="Imagen de la cancha" class="img-fluid"></p>
        <p>Disponibilidad: {{ $cancha -> disponibilidad}}</p>
        <form method="GET" action="{{ route('canchas.edit', ['cancha' => $cancha -> id])}}">
            <button class="btn btn-primary" type="submit">Editar</button>
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>