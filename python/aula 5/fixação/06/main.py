userStr = input("Digite uma string: ")
stringInvertida = ''

for p in range(len(userStr) -1, -1, -1):
    stringInvertida+=userStr[p]

print(stringInvertida)