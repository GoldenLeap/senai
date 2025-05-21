import tkinter as tk
from tkinter import Toplevel
from PIL import Image, ImageTk
import os

class JanelaDetalhesAnimal(Toplevel):
    def __init__(self, parent, animal):
        super().__init__(parent)
        self.title(f"Detalhes - {animal['nome']}")
        self.geometry("400x400")

        if animal["imagem"] and os.path.exists(animal["imagem"]):
            img_raw = Image.open(animal["imagem"]).resize((200, 150), Image.Resampling.LANCZOS)
            img = ImageTk.PhotoImage(img_raw)
            tk.Label(self, image=img).pack()
            self.img = img  # manter referência
        else:
            tk.Label(self, text="[Sem imagem]").pack()

        tk.Label(self, text=f"Nome: {animal['nome']}").pack(pady=5)
        tk.Label(self, text=f"Espécie: {animal['especie']}").pack(pady=5)
        tk.Label(self, text=f"Raça: {animal['raca']}").pack(pady=5)
        tk.Label(self, text=f"Idade: {animal['idade']} anos").pack(pady=5)
        tk.Label(self, text="Descrição:").pack(pady=5)

        desc = tk.Text(self, width=40, height=5)
        desc.insert("1.0", animal["descricao"])
        desc.config(state="disabled")
        desc.pack()
