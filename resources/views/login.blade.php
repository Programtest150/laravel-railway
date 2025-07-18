<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="d-flex justify-content-center align-items-center bg-dark" style="height: 100vh;">
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="card custom-card w-100" id="prueba" style="max-width: 900px;">
            <div class="card-body">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnhoVwuJmtF1Lu4t9WcsZ7fESV9KdIQ7pVHw&s"
                        alt="Logo" class="logo-img">
                </div>

                <div class="row">
                    <!-- Login -->
                    <div class="col-md-6 d-flex flex-column justify-content-between border-right pr-md-4 mb-3 mb-md-0">
                        <h4 class="text-center mb-4">Iniciar Sesión</h4>
                        <form method="POST" action="{{ route('login') }}"
                            class="d-flex flex-column flex-grow-1 justify-content-between">
                            @csrf
                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                        required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember">
                                        <label class="custom-control-label" for="remember">Recordarme</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-light btn-block">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>

                    <!-- Register -->
                    <div class="col-md-6 d-flex flex-column justify-content-between pl-md-4">
                        <h4 class="text-center mb-4">Registrarse</h4>
                        <form method="POST" action="{{ route('register') }}"
                            class="d-flex flex-column flex-grow-1 justify-content-between">
                            @csrf
                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                        required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-light btn-block">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>