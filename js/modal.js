
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
    confirmButtonColor: '#a5b958',
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
          'Deletado!',
          'Sua Sprint foi deletada',
          'success',
        ).then((result)=>{
          location.reload();
        })
        
      })
      
    }
    
  })
};

function atualizar(id,nome,desc, demandaC, demandaT,datasprint){

  Swal.fire({
    title: 'ATUALIZAR SPRINT',
    html:
    '<form action="./atualizarsprint.php" method="post" id= "form">'+ 
    '<input type=hidden name="id_sprint" id="id_input"> <br>'+
    '<input type="text" id="nome_input" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc_input" cols="50" rows="10" placeholder="Descrição"></textarea> <br>'+
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
  
  document.getElementById('desc_input').value= desc.replace(/\~~/g, ' ');;
  document.getElementById('nome_input').value = nome.replace(/\~~/g, ' ');
  document.getElementById('nDemandC_input').value = demandaC;
  document.getElementById('nDemand_input').value = demandaT;
  document.getElementById('data_input').value = datasprint;
  document.getElementById('id_input').value = id;
}