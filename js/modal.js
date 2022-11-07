
document.getElementById('addSprint').addEventListener('click',()=>{
   Swal.fire({
    title: 'CADASTRAR SPRINT',
    html:
    '<form action="./cadastrasprint.php" method="post" id= "form">'+ 
    '<input type="text" id="nome_input" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc_input" cols="20" rows="10" placeholder="descrição" class="inputmodal"></textarea> <br>'+
    '<input type="number" id="nDemandC_input" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"><br>'+
    '<input type="number" id="nDemand_input" name="nDemand" placeholder="Total de Demandas" class="inputmodal"><br>'+
    '<input type="date" id="data_input" name="data" placeholder="Total de Demandas" class="inputmodal"><br>'+

  '</form>',
  confirmButtonText: `CADASTRAR`,
  confirmButtonColor: "#592c0c",
  })
  .then((result) => {
    if (result.isConfirmed) {
      var form = document.getElementById('form');
      form.submit()
    }
  })
  
});


async  function deletar(id){
  Swal.fire({
    title: 'Deseja deletar a sprint',
    text: "Fazendo isso você não terá mais acesso a ela.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, Deletar!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        
        
      )
      console.log( 'sucesso '+  id);
      open('./deletsprint.php?id='+id);
      /*$(this).parent().parent().remove();*/
    }
  })
};

function atualizar(){
  Swal.fire({
    title: 'ATUALIZAR SPRINT',
    html:
    '<form action="login.html" method="post" id= "form">'+ 
    '<input type="text" id="nome_input" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc_input" cols="20" rows="10" placeholder="descrição" class="inputmodal"></textarea> <br>'+
    '<input type="number" id="nDemandC_input" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"><br>'+
    '<input type="number" id="nDemand_input" name="nDemand" placeholder="Total de Demandas" class="inputmodal"><br>'+
    '<input type="date" id="data" name="data_input" placeholder="Total de Demandas" class="inputmodal"><br>'+

  '</form>',
  confirmButtonText: `ATUALIZAR`,
  confirmButtonColor: "#592c0c",
  })
  .then((result) => {
    if (result.isConfirmed) {
      var form = document.getElementById('form');
      form.submit()
    }
  })
}