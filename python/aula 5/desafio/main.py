
num = input("Digite um número para praticar a tabuada: ")
acertos = 0
erros = 0
while True:
    try:
        num = int(num)
    except:
        num = input("Número invalido, digite um valor númerico válido: ")
        continue
    print("="*100)
    print(f"Tábuada do {num}".center(100))
    print("=" * 100)
    for n in range(1, 11):
        
        result = input(f"{n}X{num}: ")
        if result != str(n*num):
            print("Resultado incorreto")
            erros += 1
        else:
            print("Resultado correto")
            acertos += 1
    break

print(f"Erros: {erros}\nAcertos: {acertos}")
if(acertos == 10):
    print("Parabens você acertou todas, você é muito inteligente. :D")
elif(acertos > 8):
    print("Quase lá! Continue assim!")
elif(acertos >= 5):
    print("Você está indo bem! Continue praticando.")
elif(acertos < 5):
    print("Continue praticando!")
else:
    print("Ocorreu um erro.")