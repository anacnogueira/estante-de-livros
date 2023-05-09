@extends('adminlte::page')

@section('title', 'Adicionar Livro')

@section('content_header')
    <h1>Adicionar Livro</h1>

@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
                  @csrf
                  @include('books.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop
