<!DOCTYPE html>
<html>
<head>
  <title>Tela de Vendas</title>
  <style>
    /* Estilos CSS para a página */
    .item {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <h1>Tela de Vendas</h1>

  <div id="itens">
    <!-- Os itens adicionados serão exibidos aqui -->
  </div>

  <form id="formVenda">
    <input type="text" id="itemInput" placeholder="Item">
    <input type="number" id="valorInput" placeholder="Valor">
    <button type="submit">Adicionar Item</button>
  </form>

  <h2>Total: <span id="total">R$ 0.00</span></h2>

  <script>
    document.getElementById("formVenda").addEventListener("submit", function(event) {
      event.preventDefault();

      var itemInput = document.getElementById("itemInput");
      var valorInput = document.getElementById("valorInput");

      var item = itemInput.value;
      var valor = parseFloat(valorInput.value);

      if (item && !isNaN(valor)) {
        // Criar um novo elemento para exibir o item adicionado
        var newItem = document.createElement("div");
        newItem.className = "item";
        newItem.textContent = item + " - R$ " + valor.toFixed(2);

        // Adicionar o novo item à lista
        document.getElementById("itens").appendChild(newItem);

        // Atualizar o valor total
        var total = parseFloat(document.getElementById("total").textContent.substr(3));
        total += valor;
        document.getElementById("total").textContent = "R$ " + total.toFixed(2);

        // Limpar os campos de entrada
        itemInput.value = "";
        valorInput.value = "";
      }
    });
  </script>
</body>
</html>