<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de atividade respondida</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route('index')}}">Inicio</a>
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
    <div class="card mx-1 mx-md-9 shadow-2-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      <div class="card-body py-2 px-md-8">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-9">
            <h2 class="fw-bold mb-5">LISTA DE ATIVIDADES RESPONDIDAS</h2>
            <div class="row">
            @foreach ($listas as $lista)
            <div class="col-sm-3 mb-3 mb-sm-0 card mx-auto">
              <div class="card-body">
                <h5 class="card-title">{{$lista->name}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Atividade: {{$lista->atividade->name}}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Aluno: {{$lista->estudante->name}}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Nota: {{$lista->note}}</h6>
                <p class="card-text">{!!$lista->description!!}</p>
                <a class="btn btn-primary btn-block mb-2" href="{{ asset('storage/' . $lista->filepath) }}" target="_blank">Arquivo</a>
                <a href="{{route('edit.nota', $lista->activity_id)}}" class="btn btn-primary btn-block mb-4">Adicionar nota</a>
              </div>
            </div>
            @endforeach
            </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>