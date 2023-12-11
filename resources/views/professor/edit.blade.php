<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar nota</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <i class="fa-solid fa-arrow-right"></i> Menu
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="fa-solid fa-user"></i>
                        {{ Auth::guard('web')->user()->name }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}"> <i
                                    class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-gear"></i> Opções professor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('create.disciplines') }}"><i
                                            class="fa-solid fa-plus"></i> Criar disciplinas</a></li>
                                <li><a class="dropdown-item" href="{{ route('create.students') }}"><i
                                            class="fa-solid fa-user-plus"></i> Cadastrar aluno</a></li>
                                <li><a class="dropdown-item" href="{{ route('listagem.alunos') }}"><i
                                            class="fa-solid fa-table-list"></i> Listagem alunos</a></li>
                            </ul>
                </div>
                <div>
                    <a class="navbar-brand position-absolute bottom-0 end-0"
                        href="{{ route('logout.teachers') }}">Logout <i class="fa-solid fa-arrow-right-from-bracket"
                            style="color: #d93039;"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <section class="text-center">
        <div class="p-5 bg-image"
            style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 300px;
            ">
        </div>
        <div class="card mx-4 mx-md-5 shadow-5-strong"
            style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
            <div class="card-body py-5 px-md-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <main>
                            <div>
                                <div class="row">
                                    @if (session('msg'))
                                        <p class="alert alert-success d-flex align-items-center" role="alert">
                                            {{ session('msg') }}</p>
                                    @endif
                                </div>
                            </div>
                        </main>
                        <h2 class="fw-bold mb-5">ENVIAR NOTA</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <li class="error">{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('update.nota', $nota->id) }}" method="post">

                            @csrf
                            @method('PUT')
                            <input type="hidden" name="check" value="visto">
                            <label for="">Adicionar nota:</label><br>
                            <input type="float" name="note"><br><br>
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Enviar nota
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
