# Inicializa a variável para somar as temperaturas
totaltemp = 0

# Solicita ao usuário a quantidade de pessoas a serem analisadas
while True:
    qnt = input("Quantas pessoas vão ser analisadas: ")  # Pergunta o número de pessoas
    try:
        qnt = int(qnt)  # Tenta converter para inteiro
    except:
        print("Número inválido")  # Se não for um número válido
        continue
    if qnt < 0:  # Verifica se o número é negativo
        print("Número inválido")
        continue
    break  # Sai do loop se o número for válido

# Se a quantidade de pessoas for maior que 0, continua o processo
if qnt > 0:
    c = 1  # Inicia o contador de pessoas
    while c <= qnt:
        try:
            # Solicita a temperatura de cada pessoa
            temp = float(input(f"Digite a temperatura da {c}ª pessoa: ")) 
        except ValueError:
            print("Temperatura inválida!")  # Se o valor inserido não for numérico
            continue
        # Classifica o estado da pessoa baseado na temperatura
        if temp <= 37.2:
            print("Estado: Normal")
        elif temp <= 38:
            print("Estado: Febril")
        elif temp <= 39:
            print("Estado: Febre")
        else:
            print("Estado: Febre Alta")
        
        totaltemp += temp  # Soma a temperatura para calcular a média
        c += 1  # Incrementa o contador
    
    # Calcula a média das temperaturas
    media = totaltemp / qnt  
    print(f"Média: {media}ºC")  # Exibe a média das temperaturas
    print(f"Pessoas analisadas: {qnt}")  # Exibe o número de pessoas analisadas
else:
    print("Nenhuma pessoa foi analisada")  # Se a quantidade de pessoas for 0 ou negativa
