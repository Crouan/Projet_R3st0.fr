# Projet R3st0.fr - 2024/2025

## I - Présentation

Le site **r3st0.fr** est un site web de critique de restaurants, à l’image de sites existants comme La Fourchette ou TripAdvisor. L’objectif principal est de créer une base de données de restaurants, de stocker leurs caractéristiques et d’inclure des avis de consommateurs, afin de diffuser ces informations pour aider les visiteurs à faire un choix de restaurant.

## II - Fonctionnalités

### **Visiteur (Non authentifié) :**
- Recherche de restaurants par nom, adresse et critères multiples.
- Inscription sur le site.
- Consultation des caractéristiques et évaluations des restaurants.

### **Utilisateur authentifié :**
- Personnalisation du profil.
- Possibilité de « liker » des restaurants.
- Ajouter des critiques et noter (de 1 à 5) les restaurants.

## III - Types de missions

### **III.1 Traiter les tickets de maintenance**
- Analyse de l'ébauche initiale et création d'une documentation à partir de celle-ci.
- Résolution d’incidents ou de petites demandes d’évolution sur la version existante.

### **III.2 Déployer l’application sur le serveur**
- Ajout d'un type de cuisine pour les restaurants.
- Installation de l’application web et de sa base de données sur le serveur de la section SIO.

### **III.3 Ajout d'une recherche avec un filtre avancé + ajout de menu**
- Ajout d’une carte interactive pour tout les utilisateurs (authentifié ou pas).

## IV - Méthode de gestion de projet

Le projet suit une méthodologie itérative, inspirée de principes agiles. Chaque mission est réalisée au cours d’itérations de 1 à 2 séances.

### **IV.1 Les équipes**
- L’équipe se compose de 2 à 3 membres.
- Un animateur d’équipe (scrum master) est désigné pour animer les réunions et faire le lien avec les maîtres d’œuvre.

### **IV.2 Les itérations**
- Chaque itération produit un livrable (nouvelle version de l’application, rapports d’itération).
- L’équipe effectue une réunion quotidienne (daily scrum) pour faire le point et planifier la tâche suivante.

### **IV.3 La planification**
- Les tâches sont définies en réunion et affectées à des membres de l’équipe.
- Le statut des tâches évolue de « A faire » à « En cours » puis « Terminé ».
- Les tâches sont priorisées selon leur importance.

## V - Outils

### **V.1 E.D.I.**
- NetBeans v.17 ou supérieur.

### **V.2 Dépôts de code**
- Utilisation de **GitLab** pour la gestion du code source et la synchronisation avec les dépôts locaux des membres de l’équipe.

### **V.3 Planification des tâches**
- L’équipe utilise un tableau Kanban partagé avec les colonnes : 
  - « A faire » (Open), 
  - « En cours », 
  - « Terminé » (Closed).
- Les tickets sont étiquetés avec des labels de complexité et de priorité.
  
**GitLab permet de gérer les tickets et leur avancement via les "Issue boards" :**
- **Issue** : Chaque ticket représente une tâche (maintenance ou évolution).
- **Label** : Étiquette qui caractérise un ticket par sa complexité ou sa priorité.

---

## VI - Mode opératoire de test

#### **Étapes de préparation pour tester :**

1. **Se connecter à la machine virtuel**
   - Ouvrir https://10.15.11.4/ui/webconsole.html et se connecter avec vos login
   - Ouvrir la machine virtuelle nomme "CROUAN_FEDORA_40_DEV_2024"
   - se logger avec les identifiant (login :btssio - mdp : btssio)

2. **Ouverture du site Resto**
   - Ouvrir Mozilla Firefox
   - indiquer l'adresse du site resto "https://10.15.253.248/tgrimaud/public/Projet_SiteRestoPHP/?action=accueil"

---

### **Scénarios de test**

#### 1. **Test de la recherche de restaurants**

**Objectif :** Vérifier que la recherche fonctionne correctement avec les critères spécifiés (nom, adresse, note, prix, ...).

**Étapes :**
1. Accédez à la page d’accueil de l’application.
2. Dérouler le menu burger à gauche et cliquer sur recherche multicritère.
3. Entrez un certain nombre de critère souhaitez, 1 comme 5 (par exemple : note = 4,  prix max = 30)

**Critères de réussite :**
- Une liste de restaurant s'affiche, dans notre cas 2 exemple s'affiche (Ciderie du fronton et le Bistrot Sainte Cluque)

---
#### **2. Affichage des détails d’un restaurant**

- **Objectif :** Vérifier l’affichage des informations détaillées d’un restaurant.

- **Étapes :**
  1. Cliquez sur un restaurant dans la liste.
  2. Vérifiez que les informations détaillées (nom, photo, description, ...) s’affichent.

- **Critères de réussite :** 
Les détails du restaurant sont affichés correctement.

#### 3. **Test de la connexion d'un utilisateur**

**Objectif :** Vérifier que la connexion fonctionne correctement.

**Étapes :**
1. Accédez à la page de connexion en haut à droite.
2. Entrez un email valide et un mot de passe (login : test@bts.sio, mdp : sio).
3. Cliquez sur "Envoyer".
4. Vérifier que le profil de l'utilisateur est affiché

**Critères de réussite :**
- Le profil de l'utilisateur s'affiche correctement

#### 4. **Test de la fonctionnalité de critique d'un restaurant**

**Objectif :** Vérifier que l'utilisateur authentifié peut ajouter une critique pour un restaurant.

**Étapes :**
1. En tant qu'utilisateur authentifié, choisissez un restaurant et accédez à sa fiche.
2. Ajouter une note en cliquant sur le nombre d'étoile souhaité en haut à droite (1 à 5)
3. Ecrire une critique en bas de la page et la soumettre.

**Critères de réussite :**
- La critique et la note doivent être visibles sur la fiche du restaurant, avec les autres avis.

## VII - Suivi du projet

#### **Planification prévisionnelle**

| Itération   | Objectif                                        | Durée    |
|-------------|-------------------------------------------------|----------|
| Itération 1 | Résolution des incidents de la version initiale | 2 semaines |
| Itération 2 | Ajout de l’accès administrateur                 | 1 semaine |
| Itération 3 | Déploiement sur le serveur                      | 1 semaine |

#### **Dépôt de code**
- **URL du dépôt GitLab** : `https://gitlab.com/Crouan/sitewebrestaurants`

#### **Rapports**
- Les rapports des itérations sont accessibles dans le dossier `https://lajoliverie-my.sharepoint.com/my?id=%2Fpersonal%2Ftcrouan%5Fla%2Djoliverie%5Fcom%2FDocuments%2FDocumentationIt%C3%A9rationsSiteResto&ga=1`

---

### **Projet réalisé par :**
- **CROUAN Thomas**
- **DUDOUIT NOE**
- **DOUCET-CHARDRON Maywenn**


## VIII - Mode opératoire pour lancer le projet

### **Lancement en local à l'aide de la VM**

1. **Mettre sous tension la VM**  
   - Accédez à l’interface de gestion via :  
     `https://10.15.11.4/ui/webconsole.html`.  
   - Démarrez la machine virtuelle nommée `CROUAN_FEDORA_40_DEV_2024`.

2. **Connexion à la VM**  
   - Connectez-vous au compte **btssio** avec le mot de passe **btssio**.

3. **Lancer les services nécessaires**  
   - Ouvrez un terminal de contrôle dans la VM.  
   - Exécutez la commande suivante pour démarrer **MariaDB** et **Httpd** :  
     ```bash
     sudo lampstart
     ```
   - Entrez le mot de passe utilisateur **btssio** lorsque cela est demandé.

4. **Ouvrir le projet avec NetBeans**  
   - Lancez l’application **NetBeans** depuis la VM.  
   - Ouvrez le fichier du projet situé dans :  
     `home/btssio/NetBeansProjects/CROUAN_2SLAM_SiteResto2_V2`.

5. **Exécuter le projet**  
   - Dans NetBeans, cliquez sur la flèche verte pour lancer le programme.  
