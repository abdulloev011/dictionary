@extends('layouts.admin')

@section('content')
<div class="container"> 
    <div style="margin: 5% 20% 5% 20%;">
        <form action="{{route('update-users', $users->id)}}" method="POST">
            @csrf
               <div class="form-group">
                    <label for="tell_send">Имя пользователя</label>
                    <input type="text" name="name" value="{{$users->name}}" class="form-control">
               </div>

            <div class="form-group">
                <label for="tell_rec">Телефон пользователя</label>
                <input type="text" name="mobile" value="{{$users->mobile}}" class="form-control">
            </div>
    
            <div class="form-group">
                <label for="fullname_send">Пароль пользователя</label>
                <input type="text" name="pass" value="{{$users->password}}" placeholder="ФИО отправителя" class="form-control">
            </div>
                 
                
        
                <div align ="right" class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Обновить</button>
                </div>
        </form>
    </div>
</div>
@endsection