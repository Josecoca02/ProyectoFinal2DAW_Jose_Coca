<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset('estilos.css')}}">    
    <title>Arbitros</title>
</head>
<body id="index_arbitros">
    
    @extends('layout')
    <div class="head">

    <div class="logo">
      <img src="{{ asset('Fotos/Logo_empresa.png') }}" width="80">
    </div>

    <nav class="navbar">
        @auth
    @if(Auth::user()->type === 'user' || Auth::user()->type === 'admin')
        <a href="{{ route('dashboard') }}">Inicio</a>
    @else
        <a href="/">Inicio</a>
    @endif
@else
    <a href="/">Inicio</a>
@endauth
        <a href="/nosotros">Nosotros</a>
        
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="canchasDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Canchas
            </a>
            <ul class="dropdown-menu" aria-labelledby="canchasDropdown">
                <li style="background-color: black"><a class="dropdown-item" href="canchas">Canchas</a></li>
                @auth
                    @if(Auth::user()->type === 'user')
                        <li style="background-color: black"><a class="dropdown-item" href="partidos">Mis Partidos</a></li>
                        <li style="background-color: black"><a class="dropdown-item" href="reservas">Mis Reservas</a></li>
                    @elseif(Auth::user()->type === 'admin')
                        <li style="background-color: black"><a class="dropdown-item" href="partidos">Partidos</a></li>
                        <li style="background-color: black"><a class="dropdown-item" href="reservas">Reservas</a></li>
                    @endif
                @endauth
            </ul>
        </div>
        
        <a href="/servicios">Servicios</a>
        <a href="contacto">Contacto</a>
        
        <div class="user-info">
            @auth
                @if(Auth::user()->type === 'admin')
                    <p>Soy el admin: {{ Auth::user()->name }}</p>
                @else
                    <p>Soy el usuario, {{ Auth::user()->name }}</p>
                @endif
            @endauth
        </div>
        
        <a href="{{ route('logout') }}"><button type="button" class="btn btn-outline-primary me-2">Salir</button></a>
    </nav>

    </div>
    <header class="content header">
        <h2 class="title">Arbitro</h2>
        </div>
    </header>

    {{-- <div class="container">
        <h1>Index de árbitros</h1>
        <p>{{ $mensaje }}</p>

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido_1</th>
                            <th>Apellido_2</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Experiencia</th>
                            <th>Disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arbitros as $arbitro)
                        <tr>
                            <td>{{ $arbitro->nombre }}</td>
                            <td>{{ $arbitro->apellido_1 }}</td>
                            <td>{{ $arbitro->apellido_2 }}</td>
                            <td>{{ $arbitro->email }}</td>
                            <td>{{ $arbitro->telefono }}</td>
                            <td>{{ $arbitro->experiencia }}</td>
                            <td>{{ $arbitro->disponibilidad }}</td>
                            <td>
                                <form method="get" action="{{ route('arbitros.show', ['arbitro' => $arbitro->id]) }}">
                                    <button type="submit" class="btn btn-primary">Ver</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('arbitros.destroy', ['arbitro' => $arbitro->id]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>     
    </div> <br>  --}}

    <div class="container">
        <h1>Lista de árbitros</h1>
    
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido 1</th>
                            <th>Apellido 2</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Experiencia</th>
                            <th>Disponibilidad</th>
                            @auth
                            @if(Auth::user()->type === 'admin')
                            <th>Acciones</th>
                            @endif
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arbitros as $arbitro)
                        <tr>
                            <td>{{ $arbitro->nombre }}</td>
                            <td>{{ $arbitro->apellido_1 }}</td>
                            <td>{{ $arbitro->apellido_2 }}</td>
                            <td>{{ $arbitro->email }}</td>
                            <td>{{ $arbitro->telefono }}</td>
                            <td>{{ $arbitro->experiencia }}</td>
                            <td>{{ $arbitro->disponibilidad }}</td>
                            @auth
                            @if(Auth::user()->type === 'admin')
                            <td>
                                <form method="get" action="{{ route('arbitros.show', ['arbitro' => $arbitro->id]) }}">
                                    <button type="submit" class="btn btn-primary">Ver</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('arbitros.destroy', ['arbitro' => $arbitro->id]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                </form>
                            </td>
                            @endif
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
        @auth
        @if(Auth::user()->type === 'admin')
        <div class="row">
            <div class="col-12">
                <a href="{{ route('arbitros.create') }}" class="btn btn-success">Crear Árbitro</a>
            </div>
        </div>
        @endif
        @endauth
    </div>
    

    
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>