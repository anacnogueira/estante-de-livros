@extends('adminlte::page')

@section('title', 'Visualizar Livro')

@section('content_header')
    <h1>Visualizar Livro</h1>
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
                                    <div class="col-md-4">
                                        @if(isset($book->images))
                                            <ul class="list-unstyled">
                                            @foreach ($book->images as $bookImage)
                                            <li><img src="{{ Storage::url($bookImage['image']) }}" alt="" style="width: 300px;"></li>
                                            @endforeach
                                            </ul>
                                        @endif        
                                    </div>
                                    <div class="col-md-8">
                                        <dl>
                                            <dt>Título: </dt>
                                            <dd>{{ $book->title }}&nbsp;</dd>
                                            <dt>Autores: </dt>
                                            <dd>
                                                @foreach($book->authors as $author)
                                                    {{ $author->name  }}<br>
                                                @endforeach
                                            </dd>
                                             <dt>Categoria</dt>
                                            <dd>{{ $book->category->name }}&nbsp;</dd>
                                            <dt>Páginas</dt>
                                            <dd>{{ $book->pages }}&nbsp;</dd>
                                            <dt>ISBN</dt>
                                            <dd>{{ $book->isbn }}&nbsp;</dd>
                                            <dt>Lido?</dt>
                                            <dd>{{ $book->read == 1 ? 'Sim' : 'Não' }}&nbsp;</dd>
                                            <dt>Tipo</dt>
                                            <dd>{{ $book->type == 'paper' ? 'Papel' : 'E-book' }}&nbsp;</dd>
                                            <dt>Resumo</dt>
                                            <dd>{{ $book->summary }} &nbsp;</dd>
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
                                <li class="list-group-item"><a href="{{ route('admin.book.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
