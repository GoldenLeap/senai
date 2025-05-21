import tkinter as tk
from tkinter import ttk

from cadastro import JanelaCadastro
from lista import JanelaListaAnimais

class JanelaPrincipal(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Adoção de Animais")
        self.geometry("800x600")  # Tamanho inicial da janela

        # Tornando a janela responsiva
        self.grid_columnconfigure(0, weight=1)
        self.grid_rowconfigure(0, weight=1)

        # Criando o Notebook (guias)
        self.guias = ttk.Notebook(self)
        self.guias.grid(row=0, column=0, sticky="nsew")  # Usando grid para tornar o notebook responsivo

        # Guias para Cadastrar Animal e Lista de Animais
        self.guiaCadastro = JanelaCadastro(self.guias)
        self.guiaLista = JanelaListaAnimais(self.guias)

        self.guias.add(self.guiaCadastro, text="Cadastrar Animal")
        self.guias.add(self.guiaLista, text="Lista Animais")

        # Detectar mudança de aba
        self.guias.bind("<<NotebookTabChanged>>", self.atualizarLista)

    def atualizarLista(self, event):
        abaAtual = self.guias.index("current")
        if abaAtual == 1:
            self.guiaLista.reload()

if __name__ == "__main__":
    root = JanelaPrincipal()
    root.mainloop()
