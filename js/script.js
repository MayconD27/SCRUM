var conta= 1;


document.getElementById('addSprint').addEventListener('click',()=>{
    conta++
   var sprint = document.getElementById('sprints');
   sprint.innerHTML += `<tr class="li-sprint"><td><div class="newSprint"><h4>Sprint${conta}</h4> <p>Descrição...</p> <span>30/10/2022</span> <div id="num">3/4</div> </div></td> <td><i class="att bi bi-pencil-fill"></i></td> <td> <i class="delet bi bi-archive-fill"></i></td>`

   $( ".delet" ).click(function() {
    $(this).parent().parent().remove();
    });

})


$( ".delet" ).click(function() {
    $(this).parent().parent().remove();
});

$('.time').countTo();