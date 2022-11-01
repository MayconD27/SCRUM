var conta= 1;


document.getElementById('addSprint').addEventListener('click',()=>{
    conta++
   var sprint = document.getElementById('sprints');
   sprint.innerHTML += `<tr class="li-sprint"><td><div class="newSprint"><h4>Sprint${conta}</h4> <p>Descrição...</p> <span>30/10/2022</span> <div id="num">3/4</div> </div></td> <td><i class="att bi bi-pencil-fill"></i></td> <td> <i class="delet bi bi-archive-fill"></i></td>`

   Swal.fire({
    title: 'CADASTRAR!',
    html:
    '<form action="login.html" method="post" id= "form">'+ 
    '<input type="text" id="nome" class="inputmodal" name="nome" placeholder="Nome da Sprint"><br>'+
    '<textarea name="desc" id="desc" cols="20" rows="10" placeholder="descrição" class="inputmodal"></textarea> <br>'+
    '<input type="number" id="nDemandC" name="nDemandC" placeholder="Demandas Concluídas" class="inputmodal"><br>'+
    '<input type="number" id="nDemand" name="nDemand" placeholder="Total de Demandas" class="inputmodal"><br>'+
    '<input type="date" id="data" name="data" placeholder="Total de Demandas" class="inputmodal"><br>'+

  '</form>',
  confirmButtonText: `CADASTRAR!`,
  })
  .then((result) => {
    if (result.isConfirmed) {
      var form = document.getElementById('form');
      form.submit()
    }
  })
  
   $( ".delet" ).click(function() {
    $(this).parent().parent().remove();
    });

})


$( ".delet" ).click(function() {
    $(this).parent().parent().remove();
});

$('.time').countTo();