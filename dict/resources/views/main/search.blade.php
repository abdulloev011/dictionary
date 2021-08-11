<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Результат поиска</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <h5 class="navbar-brand" href="">Search</h5>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('index')}}">Домой</a>
          </li>
        </ul>
        <a class="btn btn-link text-light"  href="{{route('register')}}" role="button">Регистрация</a>
        <a class="btn btn-link text-light" href="{{route('login')}}"  role="button">Войти</a>
      </div>
    </div>
  </nav>

      <div class="container-xl mt-3">
        <table class="table table-bordered mt-5 text-center h5">
          <thead class="table-dark">
            <tr>
              <td>Таджикский</td>
              <td>Английский</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($search as $s)
                
                <tr>
                    <td>{{$s->tajik}}</td>
                    <td>{{$s->english}}</td>
                </tr>
            @endforeach
             
          </tbody>
        </table>
    </div>
</body>
</html>