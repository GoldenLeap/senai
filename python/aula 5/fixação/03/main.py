"""
    Um programa aonde recebe sucessivamente valores de temperatura de cliente e imprime
    o estado do cliente, no final imprime a média de temperatura e quantidade de clientes
    analisados
"""

c = 0
totalTemp = 0

while True:
    tempInput = input(f"Digite a temperatura em C do {c+1}º cliente (enter para sair): ")
    if tempInput == "":
        break
    
    # valida o tipo da entrada
    try:
        temp = float(tempInput)
        if temp <= 0 or temp >= 100:
            print("Valor inválido")
            continue  # pula para o próximo ciclo sem contar
        elif temp < 35:
            estado = "Hipotermia"
        elif temp <= 37.2:
            estado = "Normal"
        elif temp <= 38:
            estado = "Febril"
        else:
            estado = "Febre alta"

        totalTemp += temp
        c += 1
        print(f"Temperatura: {temp}ºC\nEstado: {estado}")

    # se não for um número
    except ValueError:
        print("Número inválido. Digite um número ou pressione Enter para sair.")
        continue

# Verifica se teve mais de uma pessoa analisada(dados validos)
if c > 0:
    media = totalTemp / c
    print(f"\nPessoas analisadas: {c}")
    print(f"Média de temperatura: {media:.2f}°C")
else:
    print("Nenhuma temperatura válida foi informada.")
