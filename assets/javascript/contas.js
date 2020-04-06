var container = document.getElementById("id_div_container");  

container.addEventListener("click", function(e){
   
    if(e.target.value=="deletar"){
       if(confirm("Tem certeza que deseja deletar?")){}else{
          e.preventDefault();
       }
    }
    
 });