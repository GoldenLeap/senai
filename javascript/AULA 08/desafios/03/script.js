const resultado = document.getElementById("resultado");
function mostrarPreco(){
  let valorProduto = parseInt(document.getElementById("valor").value);
  let codigoProduto = parseInt(document.getElementById("codigo").value);
  let total;
  if(codigoProduto < 11 && codigoProduto > 0){
    total = valorProduto + (valorProduto * .10);
  } 
  resultado.innerHTML = `Total a ser pago: R$${total.toFixed(2)}`;
}