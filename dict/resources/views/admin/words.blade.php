@extends('layouts.admin')

@section('title') Словарь  @endsection

@section('orders')
    active
@endsection

@section('content')
<!-- DataTables  -->
<link rel="stylesheet" href="{{asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<div class="row">
	<div class="col-12">  
		<div class="card">
			<div class="card-header" >
				<div style="float: right">	
					<!--Кнопка модального окно -->
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal">
						Добавить
						<svg xmlns="http://www.w3.org/2000/svg" width="25" style="font-weight:100" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
						</svg>
					</button>
					<!-- Модальное окно -->
					<div id="gridSystemModal" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								
									<nav class="navbar navbar-dark bg-dark">
										<h1></h1>
										<h1 style="color: #ffffff">     
											Форма для добавления слов
										</h1>
										<h1><button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: red">&times;</span></button></h1>
									</nav>
								
								<div class="modal-body">
									
									<div class="container"> 
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
								
						  </div>
						</div>
					  </div>
					</div>
				</div>
				<div style="float: center">
					<h4>Все слова</h4>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th >Id</th>
								<th>Таджижский</th>
								<th>Английский</th>
								@if(Auth::user()->id_role == 1)	
									<th>Добавил пользователь</th>
									<th>Добавлено</th>
								@endif
							</tr>
						</thead>
							@foreach($words as $w)
								<tr>	
									<td>
										{{$w->id_words}}
									</td>
									<td>
										{{$w->tajik}}
									</td>
									
									<td>
										{{$w->english}}
										
									</td>
									@if(Auth::user()->id_role == 1)
										<td>
											{{$w->name}}
										</td>
										
										<td>
											<a role="button"  class="btn btn-link order-edit" style="color: #111;" data-toggle="modal" data-target="#update">
												{{$w->created_at}}
											</a>	
										</td>
									@endif
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
<div id="update" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			
			<nav class="navbar navbar-dark bg-dark">
				<h1></h1>
				<h1 style="color: #ffffff">     
					Форма для изменения заказа
				</h1>
				<h1><button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: red">&times;</span></button></h1>
			</nav>
			
			<div class="modal-body">
				
				<div class="container"> 
					<form action="" method="POST">
						@csrf
							<input type="hidden" name="orders" id="order_id" >
							<div class="row">
								<!-- Отправитель -->
							
							<div align = "right" class="form-group mt-3">
								<button type="submit" class="btn btn-success">Обновить</button>
							</div>
					</form>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>  
				</div>
	</div>
  </div>
</div>
@endsection
