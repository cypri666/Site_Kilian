import subprocess

# Commande pour démarrer le serveur
command = ["node", "serveur.js"]

# Démarrer le serveur
process = subprocess.Popen(command, cwd="C:/Users/levas/Desktop/Site Kilian")

# Attendre que le processus se termine
process.wait()
