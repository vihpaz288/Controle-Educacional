<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de aluno</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <th style="color: navy;" scope="col">Aluno</th>
            <th style="color: navy;" scope="col">Email</th>
            <th style="color: navy;" scope="col">Situação</th>
            <th style="color: navy;" scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          <input type="hidden" id="_token" value="{{csrf_token()}}">
          @foreach ($alunos as $aluno)
          <tr>
            <th scope="row" id='valor_id{{$aluno->id}}'>{{ $aluno->id }}</th>
            <td id='valor_nome{{$aluno->id}}'>{{$aluno->name}}</td>
            <td id='valor_email{{$aluno->id}}'>{{$aluno->email}}</td>
            <td id='valor_situacao{{$aluno->id}}'>{{$aluno->active}}</td>
            <td>
              <button type='button' id='botao_editar{{$aluno->id}}' class="btn btn-primary" onclick='editar_registro({{$aluno->id}})'>EDITAR</button>
              <button type='button' id='botao_salvar{{$aluno->id}}' class="btn btn-primary" onclick='salvar_registro({{$aluno->id}})' style="display: none;">SALVAR</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function editar_registro(id) {
    $(`#botao_salvar${id}`).show();
    $(`#botao_editar${id}`).hide();

    var nome = document.getElementById("valor_nome" + id);
    var email = document.getElementById("valor_email" + id);
    var situacao = document.getElementById("valor_situacao" + id);

    nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='" + nome.innerHTML + "'>";
    email.innerHTML = "<input type='text' id='email_text" + id + "' value='" + email.innerHTML + "'>";
    situacao.innerHTML = "<input type='text' id='situacao_text" + id + "' value='" + situacao.innerHTML + "'>";
  }

  function salvar_registro(id) {
    const nome = $(`#nome_text${id}`).val();
    const email = $(`#email_text${id}`).val();
    const situacao = $(`#situacao_text${id}`).val();
    const _token = $('#_token').val();

    document.getElementById("valor_nome" + id).innerHTML = nome;
    document.getElementById("valor_email" + id).innerHTML = email;
    document.getElementById("valor_situacao" + id).innerHTML = situacao;

    $.ajax({
      type: "put",
      url: `/aluno/update/${id}`,
      data: {
        name: nome,
        email,
        active: situacao,
        _token,
      },

      success: function(response) {
        $(`#botao_salvar${id}`).hide();
        $(`#botao_editar${id}`).show();
        iziToast.success({
          title: 'Atualizado',
          message: response.msg,
        });
      }
    });
  }
</script>
</html>