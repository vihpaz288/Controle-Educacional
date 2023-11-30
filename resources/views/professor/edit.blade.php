<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lançar nota</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="{{route('index')}}">Inicio</a>
    </li>
    <li class="nav-item">
      <a style="color:red" class="nav-link" href="{{route('logout.teachers')}}">Sair</a>
    </li>
  </ul>
  <section class="text-center">
    <div class="p-5 bg-image" style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 300px;
            "></div>
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
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
                  @if(session('msg'))
                  <p class="alert alert-success d-flex align-items-center" role="alert">{{ session('msg')}}</p>
                  @endif
                </div>
              </div>
            </main>
            <h2 class="fw-bold mb-5">ENVIAR NOTA</h2>
            @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <div>
                @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
                @endforeach
              </div>
            </div>
            @endif
            <form action="{{route('update.nota', $nota->activity_id)}}" method="post">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>