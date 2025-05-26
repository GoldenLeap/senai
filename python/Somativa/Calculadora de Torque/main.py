import tkinter as tk
from tkinter import ttk
import math

class JanelaPrincipal(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title = ("Calculadora de Torque")
        self.geometry("400x225")
        JanelaCalc().grid()
        

class JanelaCalc(ttk.Frame):
    def __init__(self):
        super().__init__()
        
        self.grid(sticky="NSEW")
        
        # Variaveis
        self.raioVar = tk.DoubleVar()
        self.forcaVar = tk.DoubleVar()
        self.anguloVar = tk.DoubleVar()
        
        # Raio
        tk.Label(self, text="Braço da alavanca(r)").grid(row=1, column=0, padx=10, pady=10, sticky="e")
        tk.Entry(self, textvariable=self.raioVar).grid(row=1, column= 1, padx=10, pady=10, sticky="ew")
        
        # Força
        tk.Label(self, text="Força (N)").grid(row =2, column= 0, padx=10, pady=10, sticky="e")
        tk.Entry(self, textvariable=self.forcaVar).grid(row=2, column=1, padx=10, pady=10, sticky="eW")

        # Angulo
        tk.Label(self, text="Angulo(θ)").grid(row=3, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.anguloVar).grid(row=3, column=1, padx=10, pady=5, sticky="ew")

        # Torque
        tk.Label(self, text="Torque (Nm)").grid(row=4, column=0, padx=10, pady=10, sticky="w")
        self.torque = tk.Label(self, text="")
        self.torque.grid(row=4, column=1, padx=10, pady=10, sticky="w")
        
        
        ttk.Button(self, text="Calcular", command=self.calcularTorque).grid(row=5, column=0, padx=10, pady=5, sticky="e")
        
    def calcularTorque(self):
        
        # Pega os valores dos campos de entrada raio força e angulo
        raio = self.raioVar.get()
        forca = self.forcaVar.get()
        angulo = self.anguloVar.get()
        
        # Caso o angulo seja 0 então ele vai ser 90 graus
        if(angulo == 0):
            angulo = 90
            
        # Calcula o torque baseado na formula rFsen(θ)
        torque = raio * forca * math.sin(math.radians(angulo)) 
        self.torque["text"] = f"{torque:.2f}Nm"


if __name__ == "__main__":
    root = JanelaPrincipal()
    root.mainloop()
        