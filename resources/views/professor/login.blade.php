<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login de professor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <section class="text-center">
    <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
    <div class="card mx-1 mx-md-9 shadow-2-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      <div class="card-body py-2 px-md-8">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-9">
            <h2 class="fw-bold mb-5">LOGIN PROFESSOR</h2>
            @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <div>
                @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
                @endforeach
              </div>
            </div>
            @endif
            <form action="{{route('logar.teachers')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-4">
                  <label class="form-label" for="form3Example3">Email:</label>
                  <input type="email" id="form3Example3" class="form-control" name="email" />
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label" for="form3Example4">Senha:</label>
                  <input type="password" id="form3Example4" class="form-control" name="password" />
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Entrar
              </button>
              <a class="btn btn-primary btn-block mb-4" href="{{route('create.teachers')}}"> Cadastrar-se</a>
            </form>

  </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>