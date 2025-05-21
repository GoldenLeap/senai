import json
import os

DATA_DIR = os.path.join(os.path.dirname(__file__), "dados", "animais.json")

def carregarDados():
    if not os.path.exists(DATA_DIR):
        return []
    try:
        with open(DATA_DIR, "r", encoding="utf-8") as f:
            return json.load(f)
    except:
        return []

def salvarAnimal(lista):
    os.makedirs(os.path.dirname(DATA_DIR), exist_ok=True)
    with open(DATA_DIR, 'w', encoding="utf-8") as f:
        json.dump(lista, f, ensure_ascii=False, indent=4)

def addAnimal(animal):
    animais = carregarDados()
    animais.append(animal)
    salvarAnimal(animais)
