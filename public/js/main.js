function deleteConfirm(event, id){
	event.preventDefault();
	const form = document.getElementById("form"+id);
    Swal.fire({
        title: `Tem certeza que deseja excluir o registro ${id} ?`,
        text: `Você não poderá recuperar esse registro após esta ação`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        cancelButtonText: "Não"
    }).then((result) => {
      if (result.value) {
            form.submit();
      } else {
        event.returnValue = false;
        return false;
      }
    });
}
