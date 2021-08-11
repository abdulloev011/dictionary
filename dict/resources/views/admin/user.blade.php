@extends('layouts.admin')

@section('title') Пользователи  @endsection

@section('user')
    active
@endsection

@section('content')
@if(Auth::user()->id_role == 1)
	<!-- DataTables  -->
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
	<div class="row">
		<div class="col-12">  
			<div class="card mt-3">
				
				<h3 class="text-center mt-3">Все пользователи</h3>
				
				<div class="card-body">
					<div class="table-responsive text-center">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Имя</th>
									<th>Номер телефона</th>
									<th>Роль Пользователя</th>
									<td><b>Редактирование</b></td>
								</tr>
							</thead>
								@foreach($users as $u)
									<tr class="text-center">	
										<td>
											{{$u->id}}	
										</td>
										<td>
											{{$u->name}}
										</td>
										
										<td>
											{{$u->mobile}}
										</td>
										
										<td>
											{{$u->role}}
										</td>
										
										<td>
											<div class="text-center">
												<a role="button"  class="btn btn-primary user-edit" style="color: #111;" data-toggle="modal" data-target="#update" data-id="{{$u->id}}">
													<i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #fff"></i>
												</a>											
												
												<a role="button" href="{{route('delete',$u->id)}}" class="btn btn-danger " style="color: #111;">
													<i class="fa fa-trash" aria-hidden="true" style="color: #fff"></i>
												</a>
											
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!--Table-responsive -->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- Card-->
		</div>
		<!-- col - 12 -->
	</div>
	<!--row -->
	<div id="update" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Форма для изменения</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				
				<div class="modal-body">
					
					<div class="container"> 
						<form action="{{route('update')}}" method="POST" class="g-3 needs-validation" novalidate>
							@csrf
								<input type="hidden" name="user" id="user_id" >
								<div class="row text-center">
									<div class="form-group">
										<label for="role">Роль<sup><b>*</b></sup></label>
										<select name="role" class="form-control text-center"  required>
											<option selected disabled value="">Выберите роль </option>
											@foreach ($roles as $r)
												<option value={{$r->role_id}}>{{$r->role}}</option>
											@endforeach
										</select>
										<div class="invalid-feedback">
											Пожалуйста, выберите тариф
										</div>
									</div>
								</div>
								
								<div align = "right" class="form-group mt-3">
									<button type="submit" class="btn btn-success">Изменить</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>  
								</div>
						</form>
					</div>
			</div>
		</div>
	</div>

	@endif
@endsection
