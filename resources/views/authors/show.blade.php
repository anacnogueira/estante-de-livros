@extends('adminlte::page')

@section('title', 'Visualizar Autor')

@section('content_header')
    <h1>Visualizar Autor</h1>
@stop

@section('content')
    <section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <dl>
                                            <dt>Nome: </dt>
                                            <dd>{{ $author->name }}&nbsp;</dd>
                                            <dt>Descrição: </dt>
                                            <dd>{{ $author->description }}&nbsp;</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="actions">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('admin.author.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
