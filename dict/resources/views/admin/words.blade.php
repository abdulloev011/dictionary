@extends('layouts.admin')

@section('title') Словарь  @endsection

@section('orders')
    active
@endsection
@section('header')
	Все слова
@endsection

@section('content')
<!-- DataTables  -->
<link rel="stylesheet" href="{{asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<div class="row">
	<div class="col-12">  
		<div class="card">
			<div class="card-header" >
				<div style="float: right">	
					<!--Кнопка модального окно -->
					<a href="{{route('view-update')}}" class="btn btn-primary btn-sm">
						Добавить
						<svg xmlns="http://www.w3.org/2000/svg" width="25" style="font-weight:100" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
						</svg>
					</a>
				</div>
				<div style="float: center">
					<h4></h4>
				</div>
			</div>
			<!-- /.card-header -->
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="card-body text-center">
				<div class="table-responsive">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th >Id</th>
								<th>Таджижский</th>
								<th>Английский</th>
								@if(Auth::user()->id_role == 1)	
									<th>Добавил</th>
									<th>Добавлено</th>
									<th>Редактирование</th>
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
											{{$w->created_at}}
										</td>
										<td>
											<div class="text-center">
												<a role="button"  class="btn btn-primary words-edit" style="color: #111;" data-toggle="modal" data-target="#update" data-id="{{$w->id_words}}">
													<i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #fff"></i>
												</a>											
												
												<a role="button" href="{{route('delete-word',$w->id_words)}}" class="btn btn-danger " style="color: #111;">
													<i class="fa fa-trash" aria-hidden="true" style="color: #fff"></i>
												</a>
											
											</div>
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
					Форма для изменения слово
				</h1>
				<h1><button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: red">&times;</span></button></h1>
			</nav>
			
			<div class="modal-body">
				
				<div class="container"> 
					<form action="{{route('update-word')}}" method="POST">
						@csrf
							<input type="hidden" name="words" id="words_id" >
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="tj_word"></label>
										<input type="text" name="tj_word" value="" placeholder="Введите таджикского слова" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="en_word"></label>
										<input type="text" name="en_word" value="" placeholder="Введите английского слова" class="form-control">
									</div>
								</div>
							</div>
							<div align = "right" class="form-group mt-3">
								<button type="submit" class="btn btn-success">Обновить</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
							</div>
					</form>
				</div>
			</div>
  		</div>
	</div>
</div>
@endsection
