totalM = 0
totalF = 0
quantF = 0
quantM = 0
tentativas = 5
for i in range(0, 10):

    
    for j in range(tentativas):
        sexo = input("Qual o seu sexo(F, M): ")
        if(sexo.upper() != "F" and sexo.upper() != "M"):
            print('Sexo invalido')
            continue
        break
    else: 
        sexo = 'N/A' 
        continue
    
    for k in range(tentativas):
        try:
            idade = int(input("Digite a sua idade: ")) 
            if idade <0:
                print("Idade invalida")
                continue
        except ValueError:
            print("Digite uma idade valida. ")
            continue
        break
    else:
        idade = 0
    
    if sexo.upper() == "M":
        quantM += 1
        totalM += idade
    else:
        quantF += 1
        totalF += idade

if quantF or quantM:
    
    if(quantF > 0):
        mediaF = totalF/quantF
    else:
        mediaF = 0
    if(quantM >0):
        mediaM = totalM/quantM
    else:
         mediaM = 0

    mediaT = (totalF + totalM) / (quantF + quantM)

    print(f"\
    Quantidade total Mulheres: {quantF}\n\
    Idade média mulheres: {mediaF}\n\
    Quantidade total homens: {quantM}\n\
    Idade média homens: {mediaM}\n\
    Idade média grupo: {mediaT}")
else:
    print('Nenhuma pessoa teve informações válidas')