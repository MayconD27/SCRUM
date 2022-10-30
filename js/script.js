var conta= 1;
document.getElementById('addSprint').addEventListener('click',()=>{
    conta++
   var sprint = document.getElementById('sprints');
   sprint.innerHTML += ` <li class="li-sprint"><div class="newSprint"><h4>Sprint${conta}</h4> <p>Descrição...</p> <span>30/10/2022</span> <div id="num">3/4</div> </div><i class="bi bi-pencil-fill" id="att"></i> <i class="bi bi-archive-fill" id="delet"></i></li>`
})
