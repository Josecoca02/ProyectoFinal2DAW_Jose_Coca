<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <title>Reservas</title>
</head>
<body id="index_reservas">
    <header>
        <div id="logo">
            <img src="/balon.jpg">
        </div>
        <nav class="navigation">
            <a href="/">Inicio</a>
            <a>Nosotros</a>
            <a href="/canchas">Canchas</a>
            <a href="/clientes">Clientes</a>
            <a href="/contacto">Contacto</a>
        </nav>
    </header><br><br><br><br>

    <div class="container">
        <p>{{ $mensaje }}</p>
        <div class="row">
            <div class="col-12">
                <h1>Lista de Reservas</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Cancha</th>
                            <th>Fecha</th>
                            <th>Hora de inicio</th>
                            <th>Hora de fin</th>
                            <th>Arbitro</th>
                            <th>Método de pago</th>
                            <th>Comprobante de pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->user ? $reserva->user->name : 'No disponible' }}</td>
                                <td>{{ $reserva->cancha ? $reserva->cancha->nombre : 'No disponible' }}</td>
                                <td>{{ $reserva->fecha_reserva }}</td>
                                <td>{{ $reserva->hora_inicio_reserva }}</td>
                                <td>{{ $reserva->hora_fin_reserva }}</td>
                                <td>{{ $reserva->arbitro ? 'Sí' : 'No' }}</td>
                                <td>{{ $reserva->metodo_pago }}</td>
                                <td>
                                    @if ($reserva->comprobante_pago)
                                        <a href="{{ asset('storage/users/comprobantes/' . $reserva->comprobante_pago) }}" target="_blank">Ver comprobante</a>
                                    @else
                                        Sin comprobante
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
    </div><br> 

    <button type="button" class="btn btn-success">
        <a style="color: white; text-decoration: none;" href="/reservas/create">Crear reserva</a>
    </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>