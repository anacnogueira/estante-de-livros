@extends('adminlte::page')

@section('title', 'Alterar Livro')

@section('content_header')
    <h1>Alterar Livro</h1>
@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.book.update',['id' => $book['id']]) }}" enctype="multipart/form-data">
                  @csrf
                    {{ method_field('PUT') }}
                  @include('books.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop

