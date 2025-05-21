function exibirDescricao(){
    const dispositivo = document.getElementById("dispositivo").value.toLowerCase()
    const descNode = document.getElementById("descricao")
    let descricao;

    switch(dispositivo){
        case "fita cassete":
            descricao = "A fita cassete, também conhecida como K7 ou compact cassette, é um padrão de fita magnética para gravação de áudio lançado em 1963."
            break;
        case "dvd":
            descricao = "DVD é a sigla para Digital Versatile Disc ou Digital Video Disc. Trata-se de uma mídia para armazenamento de dados que também é bastante utilizada para distribuição de filmes."
            break;
        case "cd":
            descricao = "O Compact Disc (CD ou 'Disco Compacto') é um disco óptico digital de armazenamento de dados. O formato foi originalmente desenvolvido com o propósito de armazenar e tocar apenas músicas, mas posteriormente foi adaptado para o armazenamento de dados, o CD-ROM."
            break;
        default:
            descricao = "Indisponivel"
            break;
        
    }
    descNode.innerHTML = `Descrição de ${dispositivo}: ${descricao}`;

}