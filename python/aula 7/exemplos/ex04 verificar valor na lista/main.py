letras = ["a", 'b', 'c', 'd', 'e', 'f']
var = input("Informe uma letra: ")

if(var.lower() in letras):
    print(f"A letra '{var.lower()}' está na lista. Indíce: {letras.index(var)}")
else:
    print(f"A letra '{var.lower()}' não está na lista.")