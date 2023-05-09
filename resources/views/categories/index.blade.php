@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1> Categorias</h1>
    <a href="{{ route('admin.category.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
	<section class="content">
        <table id="category" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar pelo nome do autor">Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr role="row" class="">
                    <td>
                        {{ $category['name'] }}<br>
                        <div style="float:left; margin-right: 10px">
                            <form method="POST"  id="form{{$category['id']}}" action="{{ route("admin.category.destroy",["id"=>  $category['id']]) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="deleteConfirm(event, {{$category['id']}})"><i class="fa fa-times"></i> Excluir</button>
                            </form>
                            &nbsp; &nbsp;
                        </div>
                        <a href="{{ route('admin.category.edit',['id' => $category['id']]) }}" class='btn btn-warning'><i class="fa fa-edit"></i> Editar</a>
                        &nbsp; &nbsp;
                        <a href="{{ route('admin.category.show',['id' => $category['id']]) }}" class ='btn btn-primary'><i class="fa fa-eye"></i> Visualizar</a>
                        &nbsp; &nbsp;
                    </td>

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
  <script src="{{ asset('/js/categoriesList.js') }}"></script>
@stop
