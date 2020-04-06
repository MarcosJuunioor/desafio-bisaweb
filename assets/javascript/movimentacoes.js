var container = document.getElementById("id_div_container");  
var form_cadastro = document.getElementById("id_cadastro_movimentacao");

container.addEventListener("click", function(e){
   
   if(e.target.value=="deletar"){
        if(confirm("Tem certeza que deseja deletar?")){}else{
         e.preventDefault();
      }
   }
   
});

form_cadastro.addEventListener("submit", function(e){
   
   var data = document.getElementById("id_data_da_movimentacao");
   var data = data.value;
   var partes_data = data.split("-");
   nova_data = new Date(partes_data[0], partes_data[1]-1, partes_data[2]);//é necessário subtrair o mês pois ele é indexado a partir de zero.
   
   var dia = nova_data.getDate();
   var mes = nova_data.getMonth() + 1;
   var ano = nova_data.getFullYear();
   
   if(ano==1992 && (mes==1 && dia<3) || ano<1992){
      e.preventDefault();
      alert("O ano não pode ser menor que 03/01/1992!");
   }
});