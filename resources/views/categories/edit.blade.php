@extends('adminlte::page')

@section('title', 'Alterar Categoria')

@section('content_header')
    <h1>Alterar categoria</h1>
@stop

@section('content')
	<section class='content'>
		<div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('admin.category.update',['id' => $category['id']]) }}">
                  @csrf
                    {{ method_field('PUT') }}
                  @include('categories.form')
                </form>
              </div>
            </div>
         </div>
    </div>
	</section>
@stop

