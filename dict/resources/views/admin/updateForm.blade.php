@extends('layouts.admin')
@section('title')
    Update
@endsection
@section('content')


        <div class="container" style="background-image:url(/img/fon-row.jpg)"> 
            <div style="margin: 5% 20% 5% 20%;">
                <form action="{{route('update-orders', $orders->id)}}" method="POST">
                    @csrf
                        <div class="row">
                            <!-- Отправитель -->
                            <div class="col">
                                <h4 style="text-align: center">Отправитель</h4>
                                <!-- Телефон отправителя -->
                                <div class="form-group">
                                    <label for="tell_send">Телефон отправителя</label>
                                    <input type="text" name="tell_send" value="{{$orders->tel_send}}" class="form-control">
                                </div>
                            </div>

                            <!-- Получитель -->
                            <div class="col">
                                <h4 style="text-align: center">Получитель</h4>
                                <!-- Телефон  получителя-->
                                <div class="form-group">
                                    <label for="tell_rec">Телефон получителя</label>
                                    <input type="text" name="tell_rec" value="{{$orders->tel_rec}}" class="form-control">
                                </div>

                            </div>
                        </div>
                        <br>

                        <!-- О клиенте -->
                        <div class="row">
                            <div class="col">
                                <!-- ФИО отправителя -->
                                <div class="form-group">
                                    <label for="fullname_send">ФИО отправителя</label>
                                    <input type="text" name="fullname_send" value="{{$orders->fullname_send}}" placeholder="ФИО отправителя" class="form-control">
                                </div>
                            </div>
                            
                            <!-- ФИО получителя -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="fullname_rec">ФИО получителя</label>
                                    <input type="text" name="fullname_rec" value="{{$orders->fullname_rec}}" placeholder="ФИО отправителя" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Описания груза -->
                        <div class="form-group">
                            <label>Описания груза</label>
                                <textarea name="desc_cargo"  class="form-control" >{{$orders->desc_cargo}}</textarea>
                        </div> 
                        
                        
                
                        <div align = "right" class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Обновить</button>
                        </div>
                </form>
            </div>
        </div>
@endsection