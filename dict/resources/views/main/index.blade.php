<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Dictionary</title>
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  -->
  <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <h5 class="navbar-brand" href="#">Main page</h5>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Домой</a>
          </li>
        </ul>
        <a class="btn btn-link text-light"  href="{{route('register')}}" role="button">Регистрация</a>
        <a class="btn btn-link text-light" href="{{route('login')}}"  role="button">Войти</a>
      </div>
    </div>
  </nav>
  <div class="container-xl">
    
    <form action="{{url('search')}}" method="get">
      @csrf
      <div class="row mt-5">
        <div class="col-md-10"> 
          <input type="search" class="form-control" name="search">
        </div>
        <div class="col-md-2">  
          <button type="submit"  class="btn btn-primary">Поиск</button>
        </div>
      </div>
    </form>
    
      <table class="table table-bordered mt-5 text-center h5">
        <thead class="table-dark">
          <tr>
            <td>Таджикский</td>
            <td>Английский</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($words as $w)
              <tr>
                <td>{{$w->tajik}}</td>
                <td>{{$w->english}}</td>
              </tr>
          @endforeach 
        </tbody>
      </table>
  </div>
</body>

</html>
