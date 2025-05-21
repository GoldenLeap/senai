numero = input("Digite um número: ")
fatorial = 1
tentativas = 5
for i in range(tentativas):
    try:
        numero = int(numero)
    except ValueError:
        numero = input("Digite um número válido: ")
        continue
    if(numero < 0):
        numero = input("O valor deve ser maior que 0: ")
        continue
    break
else:
    print("Numero de tentativas excedido.")
    numero = None

if numero != None:
    if numero > 0:
        for i in range(numero, 0, -1):
            fatorial *= i
    else:
        fatorial = 1
    print(fatorial)