@extends('adminlte::page')

@section('title', 'Adicionar Categoria')

@section('content_header')
    <h1>Adicionar Categoria</h1>

@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.category.store') }}">
                  @csrf
                  @include('categories.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop
