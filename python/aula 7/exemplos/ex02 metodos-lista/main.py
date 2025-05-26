# Exemplo de metodos para lista
lista = [4,5,3,5]
print(lista) # [4,5,3,5]
lista.append(2)
print(lista) # [4,5,3,5,2]
lista.insert(2, 3) 
print(lista)# [4,5,3,3,5,2]
lista.remove(4)
print(lista) # [5,3,3,5,2]
lista.sort()
print(lista) # [2, 3, 3, 5, 5]
lista.reverse()
print(lista) # [5, 5, 3, 3, 2]
qnt = lista.count(5)
print(qnt) # 2
exc = lista.pop()
print(lista) # [5, 5, 3, 3]
print(exc) # 2
del lista[2] 
print(lista) # [5, 5, 3]
del lista[2:5] 
print(lista)# [5, 5]
lista.clear()
print(lista) # []