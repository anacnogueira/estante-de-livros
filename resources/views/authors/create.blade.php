@extends('adminlte::page')

@section('title', 'Adicionar Autor')

@section('content_header')
    <h1>Adicionar Autor</h1>

@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.author.store') }}">
                  @csrf
                  @include('authors.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop
