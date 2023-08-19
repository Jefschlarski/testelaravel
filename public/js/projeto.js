function deleteRegistroPaginacao(rotaUrl, idDoRegistro){
    if(confirm('Clique em OK se deseja realmente deletar')){
       $.ajax({
        url: rotaUrl,
        method: 'DELETE',
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        data:{
            id: idDoRegistro,
        },
        beforeSend: function(){
            $.blockUI({
                message:'Carregando...',
                timeout:2000,
            });
        },
       }).done(function (data){
          $.unblockUI();
          alert('Excluido');
          window.location.reload(true);
       }).fail(function (data){
          $.unblockUI();
          alert('Não foi possivel buscar os dados');
       });
    }
}
