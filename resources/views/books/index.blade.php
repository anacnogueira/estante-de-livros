@extends('adminlte::page')

@section('title', 'Livros')

@section('content_header')
    <h1> Livros</h1>
    <a href="{{ route('admin.book.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
     <a href="{{ route('admin.book.to-be-read')}}" class="btn btn-secondary btn-xs"><i class="fa fa-dice" aria-hidden="true"></i> Sortear</a>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
	<section class="content">
        <table id="book" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar pelo título do livro">Título</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar pelo(s) autor(es) do livro">Autor(es)</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar pela categoria do livro">Categoria</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar por livro lido">Lido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr role="row" class="">
                    <td>
                        {{ $book['title'] }}<br>
                        <div style="float:left; margin-right: 10px">
                            <form method="POST"  id="form{{$book['id']}}" action="{{ route("admin.book.destroy",["id"=>  $book['id']]) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="deleteConfirm(event, {{$book['id']}})"><i class="fa fa-times"></i> Excluir</button>
                            </form>
                            &nbsp; &nbsp;
                        </div>
                        <a href="{{ route('admin.book.edit',['id' => $book['id']]) }}" class='btn btn-warning'><i class="fa fa-edit"></i> Editar</a>
                        &nbsp; &nbsp;
                        <a href="{{ route('admin.book.show',['id' => $book['id']]) }}" class ='btn btn-primary'><i class="fa fa-eye"></i> Visualizar</a>
                        &nbsp; &nbsp;
                    </td>
                     <td>
                        @foreach($book->authors as $author)
                            {{ $author->name  }}<br>
                        @endforeach
                    </td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->read == 1 ? 'Sim' : 'Não' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
	</section>
@stop


@section('css')

@stop

@section('js')
  <script src="{{ asset('/js/main.js') }}"></script>
  <script src="{{ asset('/js/booksList.js') }}"></script>
@stop
