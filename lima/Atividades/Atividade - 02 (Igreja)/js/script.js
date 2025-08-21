function getDaySeed() {
  const today = new Date();
  // Data no formato YYYYMMDD: ex. 20250820
  return today.getFullYear() * 10000 + (today.getMonth() + 1) * 100 + today.getDate();
}

async function getVersiculoDoDia() {
  try {
    const response = await fetch('./data/bibliaAveMaria.json');
    if (!response.ok) throw new Error('Erro na requisição');

    const biblia = await response.json();

    const seed = getDaySeed();

    // Escolhe se vai pegar do Antigo ou Novo Testamento (50/50)
    const testamentos = ['antigoTestamento', 'novoTestamento'];
    // Índice do testamento (0 ou 1) usando o seed para garantir fixo no dia
    const testamentoIndex = seed % testamentos.length;
    const testamentoEscolhido = testamentos[testamentoIndex];
    const livros = biblia[testamentoEscolhido];

    // Escolhe livro aleatório usando seed
    const livroIndex = seed % livros.length;
    const livro = livros[livroIndex];

    // Escolhe capítulo aleatório usando seed
    const capituloIndex = seed % livro.capitulos.length;
    const capitulo = livro.capitulos[capituloIndex];

    // Escolhe versículo aleatório usando seed
    const versiculoIndex = seed % capitulo.versiculos.length;
    const versiculo = capitulo.versiculos[versiculoIndex];

    // Monta referência
    const referencia = `${livro.nome} ${capitulo.capitulo}:${versiculo.versiculo}`;

    // Exibe no HTML
    document.getElementById('versiculo').innerHTML = `<strong>${referencia}</strong> - ${versiculo.texto}`;

  } catch (error) {
    console.error('Erro ao buscar dados:', error);
    document.getElementById('versiculo').innerText = 'Erro ao carregar versículo';
  }
}

getVersiculoDoDia();
