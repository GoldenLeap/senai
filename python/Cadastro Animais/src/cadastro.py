import tkinter as tk
from tkinter import ttk, filedialog, messagebox
from PIL import ImageTk, Image
import shutil
import os
import uuid
from utils import addAnimal

class JanelaCadastro(ttk.Frame):
    def __init__(self, parent):
        super().__init__(parent)

        # Configuração do grid
        self.grid(sticky="nsew")

        # Imagem
        self.imgPath = None
        self.imgLabel = tk.Label(self, text="Foto:\n(Clique para adicionar)", bg="white", relief="solid")
        self.imgLabel.bind("<Button-1>", self.selectImg)
        self.image = None
        self.imgLabel.grid(row=0, column=0, columnspan=2, pady=10)

        # Definir que a imagem ocupa 2 colunas e que os campos se centralizam no meio
        self.grid_columnconfigure(0, weight=1)
        self.grid_columnconfigure(1, weight=1)

        # Variáveis
        self.nomeVar = tk.StringVar()
        self.especieVar = tk.StringVar()
        self.racaVar = tk.StringVar()
        self.idadeVar = tk.StringVar()

        # Label de erro de idade (ajustado para linha separada)
        self.idadeErrorLabel = tk.Label(self, text="", fg="red", bg="white")
        self.idadeErrorLabel.grid(row=5, column=1, padx=5, pady=5, sticky="w")

        # Centralizar os campos (não expansíveis)
        self.grid_columnconfigure(0, weight=1, minsize=100)  # Coluna da etiqueta
        self.grid_columnconfigure(1, weight=1, minsize=250)  # Coluna da entrada

        # Nome
        tk.Label(self, text="Nome do Animal: ").grid(row=1, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.nomeVar).grid(row=1, column=1, padx=10, pady=5, sticky="ew")

        # Especie
        tk.Label(self, text="Espécie: ").grid(row=2, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.especieVar).grid(row=2, column=1, padx=10, pady=5, sticky="ew")

        # Raça
        tk.Label(self, text="Raça: ").grid(row=3, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.racaVar).grid(row=3, column=1, padx=10, pady=5, sticky="ew")

        # Idade
        tk.Label(self, text="Idade: ").grid(row=4, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.idadeVar).grid(row=4, column=1, padx=10, pady=5, sticky="ew")

        # Validar idade enquanto digita
        self.idadeVar.trace_add("write", self.validarIdade)

        # Descrição
        tk.Label(self, text="Descrição: ").grid(row=6, column=0, padx=10, pady=5, sticky="ne")
        self.descText = tk.Text(self, height=5, width=30)
        self.descText.grid(row=6, column=1, padx=10, pady=5, sticky="nsew")

        # Centralizar o botão e evitar que ele ocupe toda a largura
        ttk.Button(self, text="Cadastrar", command=self.cadastrarAnimal).grid(row=7, column=0, columnspan=2, pady=20, sticky="ew")

        # Ajuste para que a interface seja responsiva
        self.grid_rowconfigure(0, weight=0)
        self.grid_rowconfigure(1, weight=0)
        self.grid_rowconfigure(2, weight=0)
        self.grid_rowconfigure(3, weight=0)
        self.grid_rowconfigure(4, weight=0)
        self.grid_rowconfigure(5, weight=0)  # Linha do erro
        self.grid_rowconfigure(6, weight=1)  # O texto da descrição pode expandir
        self.grid_rowconfigure(7, weight=0)

        # Coluna de espaçamento no final (para ter o espacinho vazio no fim)
        self.grid_columnconfigure(2, weight=1)

    def selectImg(self, event=None):
        path = filedialog.askopenfilename(
            filetypes=[("Imagens", "*.png;*.jpg;*.jpeg;*.gif")]
        )

        if path:
            self.imgPath = path
            img = Image.open(path)
            img = img.resize((160, 120), Image.Resampling.LANCZOS)
            self.image = ImageTk.PhotoImage(img)
            self.imgLabel.config(image=self.image, text="")

    def validarIdade(self, *args):
        idade = self.idadeVar.get()

        if not idade.isdigit() or int(idade) <= 0:
            self.idadeErrorLabel.config(text="Idade inválida. Deve ser um número positivo.")
        else:
            self.idadeErrorLabel.config(text="")

    def cadastrarAnimal(self):
        nome = self.nomeVar.get()
        especie = self.especieVar.get()
        raca = self.racaVar.get()
        idade = self.idadeVar.get()
        desc = self.descText.get("1.0", "end-1c")

        if not nome or not especie or not raca or not idade or not desc:
            messagebox.showwarning("Alerta", "Insira todos os dados.")
            return

        try:
            idade = int(idade)
            if idade <= 0:
                raise ValueError("A idade deve ser um número positivo.")
        except ValueError as e:
            messagebox.showwarning("Alerta", f"Idade inválida {str(e)}")
            return

        # Copiar imagem para um caminho fixo
        animId = uuid.uuid4().hex
        imgDest = None
        if self.imgPath:
            baseDir = os.path.dirname(os.path.abspath(__file__)) 
            imgFolder = os.path.join(baseDir, "Imagens")
            os.makedirs(imgFolder, exist_ok=True)

            imgDest = os.path.join(imgFolder, f"{animId}.png")
            shutil.copy(self.imgPath, imgDest)

        animal = {
            "id": animId,
            "nome": nome,
            "especie": especie,
            "raca": raca,
            "idade": idade,
            "descricao": desc,
            "imagem": imgDest
        }

        addAnimal(animal)

        # Resetar campos
        self.nomeVar.set("")
        self.especieVar.set("")
        self.racaVar.set("")
        self.idadeVar.set("")
        self.descText.delete("1.0", "end")
        self.imgLabel.config(image="", text="Foto:\n(Clique aqui para adicionar)")
        self.imgPath = None

        messagebox.showinfo("Concluido", "Cadastro concluído com sucesso")
