bancos = ["Banco do Brasil", "Caixa", "Santander"]
print(bancos)
# Resultado: ['Banco do Brasil', 'Caixa', 'Santander']


bancos[1] = "Itaú"
print(bancos)
# Resultado: ['Banco do Brasil', 'Itaú', 'Santander']

bancos[-1] = "CS6"
print(bancos)
# Resultado: ['Banco do Brasil', 'Itaú', 'CS6']

bancos = bancos + ["Bradesco", "Nubank"]
print(bancos)
# Resultado: ['Banco do Brasil', 'Itaú', 'CS6', 'Bradesco', 'Nubank']
bancos += ["Safra", "Caixa", "Santander"]
print(bancos)
# Resultado ['Banco do Brasil', 'Itaú', 'CS6', 'Bradesco', 'Nubank', 'Safra', 'Caixa', 'Santander']