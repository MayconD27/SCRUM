
document.getElementById('addSprint').addEventListener('click',()=>{
   Swal.fire({
    title: 'CADASTRAR SPRINT',
    html:
    '<form action="./cadastrasprint.php" method="post" id= "form">'+ 
    '<input type="text" id="nome_input" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc_input" cols="50" rows="10" placeholder="Descrição"></textarea> <br>'+
    '<div class="numbers"> <input type="number" id="nDemand_input" name="nDemand" placeholder="Total de Demandas" class="inputmodal">'+
    '<input type="number" id="nDemandC_input" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"> </div><br>'+
    '<input type="date" id="data_input" name="data" placeholder="Total de Demandas" class="inputmodal"><br>'+

  '</form>',
  width: 600,
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


function deletar(id){
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
      

      var configuracao = { 
        method: 'POST',
        body: new URLSearchParams({ 'id': id, }),
     };

      fetch('./deletsprint.php', configuracao)
      .then(function(response) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        ).then((result)=>{
          location.reload();
        })
        
      })
      
    }
    
  })
};

function atualizar(id){
  Swal.fire({
    title: 'ATUALIZAR SPRINT',
    html:
    '<form action="./atualizarsprint.php" method="post" id= "form">'+ 
    '<input type="text" id="nome_input" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc_input" cols="50" rows="10" placeholder="Descrição" ></textarea> <br>'+
    '<div class="numbers"> <input type="number" id="nDemand_input" name="nDemand" placeholder="Total de Demandas" class="inputmodal">'+
    '<input type="number" id="nDemandC_input" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"> </div><br>'+
    '<input type="date" id="data_input" name="data" placeholder="Total de Demandas" class="inputmodal"><br>'+

  '</form>',
  width: 600,
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