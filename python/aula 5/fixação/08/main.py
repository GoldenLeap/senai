tentativas = 5
for i in range(tentativas):
    usuario = input("Digite um nome de usuario: ")
    # Checa se o usuario contem espaço
    if(" " in usuario or usuario == ''):
        print("O usuario não deve ser vazio ou conter espaços: ")
        continue
    for i in range(tentativas):
        senha = input("Digite uma senha: ")
        # Checa se a senha contem espaços
        if (" " in senha or senha == ''):
            print("A senha não pode ser vazia ou conter espaços")
            continue
        if(senha == usuario):
            print("A senha não pode ser igual ao nome de usuario") # Exibe erro caso a senha seja igual
            continue
        else:
            break
    else:
         print('Número maximo de tentativas atingido')
         senha = ''
         break
    break
else:
    print('Número maximo de tentativas atingido')
    senha = ''
    usuario = ''


# Testar o funcionamento
print(f"Usuario: {usuario}\nSenha: {senha}")