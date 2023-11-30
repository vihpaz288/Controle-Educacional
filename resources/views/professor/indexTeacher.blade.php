<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index professores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route('create.disciplines')}}">Cadastrar disciplina</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('create.students')}}">Cadastrar aluno</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('listagem.alunos')}}">Listagem alunos</a>
    </li>
    <li class="nav-item">
      <a style="color:red" class="nav-link" href="{{route('logout.teachers')}}">Sair</a>
    </li>
  </ul>
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
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th style="color: navy;" scope="col">DISCIPLINA</th>
            <th style="color: navy;" scope="col">LANÇAR ATIVIDADES</th>
            <th style="color: navy;" scope="col">VER ATIVIDADES RESPONDIDAS</th>
            <th style="color: navy;" scope="col">VER ATIVIDADES</th>
          </tr>
        </thead>
        <main>
          <div>
            <div class="row">
              @if(session('msg'))
              <p class="alert alert-success d-flex align-items-center" role="alert">{{ session('msg')}}</p>
              @endif
            </div>
          </div>
        </main>
        <tbody>
          @foreach ($disciplinas as $disciplina)
          <tr>
            <th scope="row">{{ $disciplina->id }}</th>
            <td>{{$disciplina->name}}</td>
            <td>
              <a class="btn btn-primary" href="{{route('create.activities', $disciplina->id)}}">LANÇAR ATIVIDADE</a>
            </td>
            <td>
              <a class="btn btn-primary" href="{{route('lista.activities', $disciplina->id)}}">VER ATIVIDADES RESPONDIDAS</a>
            </td>
            <td>
              <a class="btn btn-primary" href="{{route('ativi.atividade', $disciplina->id)}}">VER ATIVIDADES </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>