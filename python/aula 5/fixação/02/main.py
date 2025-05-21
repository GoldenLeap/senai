maior = 0
menor = 0
media = 0
count = 0

for i in range(1, 10):
    numero = int(input(f"Digite o {i}º número inteiro: "))
    if i == 1:
        maior = menor = numero
    
    if numero > maior:
        maior = numero
    if numero < menor:
        menor = numero
    media += numero
    count += 1

print(f"Maior: {maior}\nMenor: {menor}\nMedia: {media//count}")