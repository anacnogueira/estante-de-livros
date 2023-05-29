<div class="col-md-12">
	 <div class="box box-danger">
	 	 <div class="box-body">
	 	 	<div class="row">
         		<div class="col-md-12">
         		     <p>Os campos com * são obrigatórios</p>
                    <x-adminlte-input name="title" label="Título:*" placeholder="Informe o título do livro" value="{{ isset($book) ? old('title', $book->title):'' }}"/>
                    <x-adminlte-select name="author_id[]" label="Autor(es):" multiple>                       
                        @foreach($authors as $id => $name)
                            @if (isset($book) && $book->authors->count()!== 0)
                                @foreach($book->authors as $bookAuthor)
                                <option value="{{$id}}" {{ $bookAuthor->id == $id ? "selected='selected'" : "" }}>{{$name}}</option>
                                @endforeach
                            @else
                                 <option value="{{$id}}">{{$name}}</option>  
                            @endif        
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-select name="category_id" label="Categoria:*">
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ isset($book) && $book->category_id == $id ? "selected='selected'" : "" }}>{{ $name }}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input name="pages" label="Páginas:" placeholder="Informe o número de páginas do livro" value="{{ isset($book) ? old('pages', $book->pages):'' }}"/>
                    <x-adminlte-input name="isbn" label="ISBN:" placeholder="Informe o número de páginas do livro" value="{{ isset($book) ? old('isbn', $book->isbn):'' }}"/>
                    <div>
                        Lido?
                        <label>
                            <input type="radio" name="read" value="1"  <?php echo (isset($book->read) && $book->read == 1 ? 'checked' : ''); ?>>
                            <span>Sim</span>
                        </label>
                        <label>
                            <input type="radio" name="read" value="0" <?php echo (isset($book->read) && $book->read == 0 ? 'checked' : ''); ?>>
                            <span>Não</span>
                        </label>
                    </div>
                    <div>
                        Tipo:
                        <label>
                            <input type="radio" name="type" value="paper" <?php echo (isset($book->type) && $book->type == 'paper' ? 'checked' : ''); ?>>
                            <span>Papel</span>
                        </label>
                        <label>
                            <input type="radio"  name="type" value="ebook" <?php echo (isset($book->type) && $book->type == 'ebook' ? 'checked' : ''); ?>>
                            <span>E-book</span>
                        </label>
                    </div>
                    <x-adminlte-textarea name="summary" label="Resumo:" placeholder="Informe o resumo do livro" rows="5" >{{  isset($book) ? old('summary', $book->summary) : '' }}</x-adminlte-textarea>
                    @if(isset($book->images))
                        <ul class="list-unstyled">
                            @foreach ($book->images as $bookImage)
                                <li><img src="{{ Storage::url($bookImage['image']) }}" alt="" style="width: 100px;"></li>
                            @endforeach
                        </ul>
                    @endif    
                    <x-adminlte-input-file name="image" label="Imagem"/>    
         		</div>
         	</div>
	 	 </div>
	 	 <div class="box-footer">
	 	 		<a href="{{ route('admin.book.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    			&nbsp;&nbsp;
    			<x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
	 	 </div>
	 </div>
</div>
