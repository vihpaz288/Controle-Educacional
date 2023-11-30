<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de atividade</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <ul class="nav justify-content-center">
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
            <h2 class="fw-bold mb-5">LISTA DE ATIVIDADES</h2>
            <div class="row">
              @foreach ($tarefas as $tarefa)
              <div class="col-sm-3 mb-3 mb-sm-0 card mx-auto">
                <div class="card-body">

                  <h5 class="card-title">{{$tarefa->name}}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">ATIVIDADES</h6>
                  <p class="card-text">{!!$tarefa->description!!}</p>
                </div>
                
                <div class="card-footer">
                  <h6 class="card-subtitle mb-2 text-body-secondary">Nota: {{$tarefa->note}}</h6>
                </div>
                
                <div class="card-footer">
                  <a href="{{route('aluno.responde', $tarefa->id)}}" class="btn btn-primary btn-block mb-4" id="enviar">Responder</a>
                </div>

              </div>
              @endforeach
            </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>