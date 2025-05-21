notas = 0

qntNotas = 0

while True:
    nota = float(input("Informe a nota (-1 para finalizar): "))
    if(nota == -1):
        break
    notas += nota 
    qntNotas += 1
if qntNotas > 0:
    media = notas / qntNotas
    print(f"Quantidade de ntoas informadas: {qntNotas}")
    print(F"Média: {media:.2f}")
    
else:
    print("Nenhuma nota informada")