@extends('adminlte::page')

@section('title', 'Alterar Autor')

@section('content_header')
    <h1>Alterarr Autor</h1>
@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.author.update',['id' => $author['id']]) }}">
                  @csrf
                    {{ method_field('PUT') }}
                  @include('authors.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop

