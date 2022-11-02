
document.getElementById('addSprint').addEventListener('click',()=>{
   Swal.fire({
    title: 'CADASTRAR SPRINT',
    html:
    '<form action="login.html" method="post" id= "form">'+ 
    '<input type="text" id="nome" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc" cols="20" rows="10" placeholder="descrição" class="inputmodal"></textarea> <br>'+
    '<input type="number" id="nDemandC" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"><br>'+
    '<input type="number" id="nDemand" name="nDemand" placeholder="Total de Demandas" class="inputmodal"><br>'+
    '<input type="date" id="data" name="data" placeholder="Total de Demandas" class="inputmodal"><br>'+

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