import tkinter as tk
from tkinter import ttk, messagebox
import math

class JanelaPrincipal(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title = ("Calculadora de Torque")
        self.geometry("400x200")
        JanelaCalc().grid()
        

class JanelaCalc(ttk.Frame):
    def __init__(self):
        super().__init__()
        
        self.grid(sticky="NSEW")
        
        # Variaveis
        self.raioVar = tk.DoubleVar()
        self.forcaVar = tk.DoubleVar()
        self.anguloVar = tk.DoubleVar()
        
        self.columnconfigure(0, weight=1, minsize=100)
        self.columnconfigure(1, weight=1, minsize=250)
        
        # Raio
        tk.Label(self, text="Braço da alavanca(r)").grid(row=1, column=0, padx=10, pady=10, sticky="e")
        tk.Entry(self, textvariable=self.raioVar).grid(row=1, column= 1, padx=10, pady=10, sticky="ew")
        
        # Força
        tk.Label(self, text="Força (N)").grid(row =2, column= 0, padx=10, pady=10, sticky="e")
        tk.Entry(self, textvariable=self.forcaVar).grid(row=2, column=1, padx=10, pady=10, sticky="eW")

        # Angulo
        tk.Label(self, text="Angulo(θ)").grid(row=3, column=0, padx=10, pady=5, sticky="e")
        tk.Entry(self, textvariable=self.anguloVar).grid(row=3, column=1, padx=10, pady=5, sticky="ew")

        tk.Label(self, text="Torque (Nm)").grid(row=4, column=0, padx=10, pady=10, sticky="w")
        self.torque = tk.Label(self, text="")
        self.torque.grid(row=4, column=1, padx=10, pady=10, sticky="w")
        ttk.Button(self, text="Calcular", command=self.calcularTorque).grid(row=5, column=0, padx=10, pady=5, sticky="e")
        
    def calcularTorque(self):
        raio = self.raioVar.get()
        forca = self.forcaVar.get()
        angulo = self.anguloVar.get()
        if(angulo == 0):
            angulo = 90
        torque = raio * forca * math.sin(math.radians(angulo)) 
        self.torque["text"] = f"{torque:.2f}Nm"


if __name__ == "__main__":
    root = JanelaPrincipal()
    root.mainloop()
        