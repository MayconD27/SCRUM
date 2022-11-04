var conta= 1;


document.getElementById('addSprint').addEventListener('click',()=>{
    conta++
   var sprint = document.getElementById('sprints');
   sprint.innerHTML += `<tr class="li-sprint"><td><div class="newSprint"><h4>Sprint${conta}</h4> <p>Descrição...</p> <span>30/10/2022</span> <div id="num">3/4</div> </div></td> <td><i class="att bi bi-pencil-fill"onclick='atualizar()'></i></td> <td> <i onclick='deletar()' class="bi bi-archive-fill"></i></td>`



})
