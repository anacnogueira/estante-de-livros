<div class="col-md-12">
	 <div class="box box-danger">
	 	 <div class="box-body">
	 	 	 <div class="row">
	 	 	 	<div class="col-md-12">
	 	 	 		@php
            			$errors = $errors->messages();
            			if (isset($errors['message'])) {
              				foreach ($errors['message'] as $key => $value) {
                				if (strpos(trim($key),"messages") !== false) {
                  					$errors = $value;
                				}
              				}
            			}
          			@endphp
	 	 	 	</div>
	 	 	 </div>

	 	 	<div class="row">
         		<div class="col-md-12">
         			<p>Os campos com * são obrigatórios</p>
         			<x-adminlte-input name="name" label="Nome:*" placeholder="Informe o nome do autor" value="{{ isset($category) ? old('name', $category->name):'' }}"/>
                    
         		</div>
         	</div>
	 	 </div>
	 	 <div class="box-footer">
	 	 		<a href="{{ route('admin.category.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    			&nbsp;&nbsp;
    			<x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
	 	 </div>
	 </div>
</div>
