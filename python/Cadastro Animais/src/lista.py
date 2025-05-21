import tkinter as tk
from tkinter import Toplevel, ttk
from PIL import Image, ImageTk
from utils import carregarDados
from detalhes import JanelaDetalhesAnimal
import os 


class JanelaListaAnimais(ttk.Frame):
    def __init__(self, parent):
        super().__init__(parent)

        self.canvas = tk.Canvas(self)
        scrollbar = ttk.Scrollbar(self, orient="vertical", command=self.canvas.yview)
        self.scrollableFrame = ttk.Frame(self.canvas)

        self.scrollableFrame.bind(
            "<Configure>",
            lambda e: self.canvas.configure(
                scrollregion=self.canvas.bbox("all")
            )
        )


        self.canvas.create_window((0, 0), window=self.scrollableFrame, anchor="nw")
        self.canvas.config(yscrollcommand=scrollbar.set)

        self.canvas.pack(side="left", fill="both", expand=True)
        scrollbar.pack(side="right", fill="y")

        self.cards = []
        self.carregarAnimais()

    def carregarAnimais(self):
        animais = carregarDados()
        for idx, animal in enumerate(animais):
            self.criarCard(animal, row=idx // 3, col=idx % 3)
        
    def criarCard(self, animal, row, col):
        frame = ttk.Frame(self.scrollableFrame, relief="raised", padding=10)
        frame.grid(row=row, column=col, padx=10, pady=10)

        # Carregar imagem
        img = None
        if animal["imagem"] and os.path.exists(animal["imagem"]):
            imgRaw = Image.open(animal["imagem"]).resize((100, 80), Image.Resampling.LANCZOS)
            img = ImageTk.PhotoImage(imgRaw)
        else:
            img = ImageTk.PhotoImage(Image.new("RGB", (100, 80), "gray")) # Placeholder
        
        imgLabel = tk.Label(frame, image=img)
        imgLabel.image = img # Evitar o garbage collector
        imgLabel.pack()

        tk.Label(frame, text=animal["nome"]).pack()

        # Detalhes
        frame.bind("<Button-1>", lambda e, a=animal: self.abrirDetalhes(a))
        imgLabel.bind("<Button-1>", lambda e, a=animal: self.abrirDetalhes(a))

    def abrirDetalhes(self, animal):
        JanelaDetalhesAnimal(self, animal)

    def reload(self):
        for widget in self.scrollableFrame.winfo_children():
            widget.destroy
        self.carregarAnimais()

