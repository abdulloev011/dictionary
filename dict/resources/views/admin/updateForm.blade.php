@extends('layouts.admin')
@section('title')
    Update
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<nav class="navbar navbar-dark bg-primary mt-5">
    <div class="container-fluid">
      <a class="navbar-brand">Navbar</a>    
    </div>
  </nav>
<div class="container mt-5"> 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('add-word')}}" class="g-3 needs-validation" method="POST" novalidate>
        @csrf
        <div class="row">
            <!--Таджикская слова -->
            <div class="col col-md-6 col-12">
                <div class="form-group">
                    <label for="tj_word">Слова на таджикском<sup><b>*</b></sup></label>
                    <input type="text" name="tj_word" placeholder="Введите слова на таджиксом" class="form-control" >
                    <div class="invalid-feedback">
                        Пожалуйста, введите слова на таджидском.
                    </div>
                </div>
            </div>

            <div class="col col-md-6 col-12">
                <!-- ФИО отправителя -->
                <div class="form-group">
                    <label for="en_word">Перевод таджикского слова на английском<sup><b>*</b></sup></label>
                    <input type="text" name="en_word" placeholder="Введите перевод таджикского слова на английском" class="form-control" >
                    <div class="invalid-feedback">
                        Пожалуйста, введите перевод таджидского слова
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="id_users" value="{{Auth::user()->id}}"  class="form-control" >
                    
        </div>
    
        <div align = "right" class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>									
        </div>
    
    </form>


<h6><b>*</b> - обязательное поле</h6>

</div>
@endsection