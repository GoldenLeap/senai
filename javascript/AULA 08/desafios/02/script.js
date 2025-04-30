/*
Uma empresa possui alguns produtos e precisa organizar o seu estoque, mas precisa
toda vez checar seu estoque de forma manual. Para deixar mais prático iremos realizar a criação
de um sistema prático para essa conferência.
Quando a quantidade do estoque estiver abaixo de 30 unidades, ele deverá aparecer a
mensagem “Estoque Baixo”, se a unidade estiver acima de 100 aparecer “Estoque Bom”.
*/

const estoque = document.querySelector(".estoque");
const produtos = document.querySelectorAll(".produto");


function mostrarEstoque() {
  if (estoque.style.visibility == "hidden") {
    estoque.style.visibility = "visible";
  } else {
    estoque.style.visibility = "hidden";
  }
  produtos.forEach((produto, i) => {
    console.log(produto);
    const quant = produto.dataset.quantidade;
    const statusElem = document.getElementById(`status${i + 1}`);
    if (quant === 0) {
        statusElem.textContent = "ESGOTADO";
        statusElem.style.color = "black";
        statusElem.style.fontWeight = "bold";
      } else if (quant < 30) {
        statusElem.textContent = "ESTOQUE BAIXO";
        statusElem.style.color = "orange";
      } else if (quant >= 100) {
        statusElem.textContent = "ESTOQUE ALTO";
        statusElem.style.color = "green";
      } else {
        statusElem.textContent = "DISPONÍVEL";
        statusElem.style.color = "blue";
      }
  });
} 
