# Inicializa as variáveis
maior = 0
menor = 0
soma = 0
qnt = 0

# Inicia um loop infinito para capturar os números
while True:
    num = input("Digite um número inteiro: ")  # Solicita um número ao usuário
    try:
        num = int(num)  # Tenta converter o input para inteiro
    except:  # Caso o input não seja um número válido
        print("Número inválido")  # Informa que o número é inválido
        continue  # Volta para o início do loop 
    
    soma += num  # Adiciona o número à soma total
    
    if qnt == 0:  # Se for o primeiro número, então ele é o menor e o maior número atual
        maior = num
        menor = num
    
    if num > maior:  # Se o número for maior que o maior atual então ele é o maior
        maior = num
    
    if num < menor:  # Se o número for menor que o menor atual então ele é o menor
        menor = num
    
    qnt += 1  # Aumenta a quantidade de números digitados
    
    if qnt >= 10:  # Quando 10 números forem digitados, encerra o loop
        break

# Calcula a média dos números digitados
media = soma / qnt

# Exibe o maior, o menor número e a média
print(f"Maior número: {maior}\nMenor número: {menor}\nMédia: {media}")
