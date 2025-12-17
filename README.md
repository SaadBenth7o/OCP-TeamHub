# OCP TeamHub

**Système de gestion des collaborateurs IT - Office Chérifien des Phosphates**

---

## 📋 Informations du projet

**Auteur :** BENDAHOU SAAD  
**Contexte :** Projet réalisé dans le cadre du stage PFA de 3ème année  
**Période :** Juillet-Août 2024 (stage de 2024)  
**École :** École Marocaine des Sciences et d'Ingénieurs (EMSI)  
**Entreprise :** Office Chérifien des Phosphates (OCP)  
**Lieu :** Khouribga, Maroc  
**Département :** Informatique et Réseau

---

## 🎯 Description

**OCP TeamHub** est une application web de gestion des collaborateurs du département IT de l'OCP. Le système permet de gérer les informations des membres du staff, leurs emplois, leurs spécialités, ainsi que la gestion des utilisateurs et des événements via un calendrier intégré.

### Fonctionnalités principales

- **Gestion des collaborateurs (Staff)** : Ajout, modification, suppression et consultation des membres du staff IT
- **Gestion des emplois** : Administration des postes et spécialités disponibles
- **Gestion des utilisateurs** : Système d'authentification avec rôles (ADMIN / VISITEUR) et activation/désactivation des comptes
- **Calendrier des événements** : Planification et suivi des événements du département
- **Interface moderne** : Design épuré aux couleurs OCP (vert/blanc/gris)

---

## 🏗️ Architecture du projet

### Structure des dossiers

```
OCP-TeamHub/
├── base de données/
│   └── ocp_teamhub.sql            # Script SQL de création de la base de données
├── calendrier/
│   ├── delete.php                 # Suppression d'événements
│   ├── index2.php                 # Interface calendrier
│   ├── insert.php                 # Ajout d'événements
│   ├── load.php                   # Chargement des événements
│   └── update.php                 # Modification d'événements
├── calendrier2/
│   ├── index.html                 # Interface calendrier alternative
│   ├── script.js
│   └── style.css
├── css/
│   ├── bootstrap.css              # Framework Bootstrap
│   ├── bootstrap.min.css
│   └── monstyle.css               # Styles personnalisés OCP
├── fonts/                         # Polices Glyphicons
├── images/                        # Images et logos OCP
├── les_fonctions/
│   └── fonctions.php              # Fonctions utilitaires PHP
└── pages/
    ├── connexiondb.php            # Configuration PDO de connexion à la BDD
    ├── identifier.php             # Vérification de session
    ├── role.php                   # Vérification des rôles utilisateur
    ├── login.php                  # Page de connexion
    ├── seConnecter.php           # Traitement de l'authentification
    ├── seDeconnecter.php         # Déconnexion
    ├── menu.php                   # Barre de navigation
    ├── gestionnaires.php          # Liste des collaborateurs
    ├── nouveauGestionnaire.php    # Formulaire d'ajout
    ├── editerGestionnaire.php     # Formulaire de modification
    ├── supprimerGestionnaire.php # Suppression
    ├── emploi.php                 # Liste des emplois
    ├── nouvelleEmploi.php         # Ajout d'emploi
    ├── editerEmploi.php           # Modification d'emploi
    ├── supprimerEmploi.php        # Suppression d'emploi
    ├── utilisateurs.php           # Liste des utilisateurs
    ├── nouvelUtilisateur.php      # Création de compte
    ├── editerUtilisateur.php      # Modification utilisateur
    ├── activerUtilisateur.php     # Activation/désactivation
    ├── supprimerUtilisateur.php   # Suppression utilisateur
    ├── editPwd.php                # Changement de mot de passe
    └── updatePwd.php              # Traitement changement MDP
```

### Base de données

Le système utilise une base de données MySQL avec les tables suivantes :

- **`gestionnaire`** : Informations des collaborateurs (nom, prénom, date de naissance, civilité, photo, emploi, spécialité, téléphone)
- **`emploi`** : Liste des postes disponibles (nomEmploi, specialite)
- **`utilisateur`** : Comptes utilisateurs (login, email, role, etat, pwd)
- **`events`** : Événements du calendrier (title, start_event, end_event)

### Technologies utilisées

- **Backend** : PHP 7.4+ (PDO pour la base de données)
- **Frontend** : HTML5, CSS3, Bootstrap, JavaScript
- **Base de données** : MySQL
- **Serveur** : Apache (XAMPP)

---

## 🚀 Installation et lancement

### Prérequis

- **XAMPP** (ou équivalent : WAMP, MAMP) avec :
  - Apache activé
  - MySQL activé
  - PHP 7.4 ou supérieur

### Étapes d'installation

1. **Cloner le projet depuis GitHub**
   ```bash
   git clone https://github.com/votre-username/OCP-TeamHub.git
   # Ou télécharger le ZIP et extraire dans le répertoire htdocs de XAMPP
   C:\xampp\htdocs\OCP-TeamHub\
   ```

2. **Créer la base de données**
   - Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
   - Importer le fichier `base de données/ocp_teamhub.sql`
   - Ou exécuter manuellement le script SQL pour créer la base `ocp_teamhub` et les tables

3. **Configurer la connexion à la base de données**
   - Copier le fichier `pages/connexiondb.php.example` vers `pages/connexiondb.php`
   - Modifier les paramètres dans `pages/connexiondb.php` selon votre configuration :
     ```php
     $pdo = new PDO(
         "mysql:host=localhost;dbname=ocp_teamhub;charset=utf8mb4",
         "root",  // Utilisateur MySQL
         ""      // Mot de passe MySQL (vide par défaut dans XAMPP)
     );
     ```
   - ⚠️ **Important** : Le fichier `connexiondb.php` n'est pas versionné pour des raisons de sécurité. Vous devez le créer à partir du fichier `.example`.

4. **Démarrer les services XAMPP**
   - Lancer **Apache** et **MySQL** depuis le panneau de contrôle XAMPP

5. **Accéder à l'application**
   - Ouvrir un navigateur et aller à :
     ```
     http://localhost/OCP-TeamHub/OCP-TeamHub/pages/login.php
     ```

### Comptes par défaut

Après l'import de la base de données, vous pouvez vous connecter avec :

- **Admin** :
  - Login : `admin`
  - Mot de passe : `123`
  - Rôle : ADMIN (accès complet)

- **Utilisateur test** :
  - Login : `user1`
  - Mot de passe : `123`
  - Rôle : VISITEUR (accès limité)

---

## 👥 Rôles et permissions

### ADMIN
- Accès complet à toutes les fonctionnalités
- Gestion des utilisateurs (création, modification, activation/désactivation)
- Gestion des emplois
- Gestion des collaborateurs (CRUD complet)
- Consultation du calendrier

### VISITEUR
- Consultation des collaborateurs
- Consultation du calendrier
- Modification de son propre profil
- Changement de son mot de passe

**Note** : Les nouveaux comptes créés via `nouvelUtilisateur.php` sont désactivés par défaut et nécessitent une activation par un administrateur.

---

## 🎨 Thème et design

L'interface utilise le thème officiel OCP :
- **Couleurs principales** : Vert (#16a34a) et blanc
- **Mode clair** : Fond blanc/gris avec accents verts
- **Design moderne** : Interface épurée avec cartes et formulaires compacts

---

## 📝 Notes importantes

- Les mots de passe sont stockés en MD5 (à considérer pour la production)
- Les photos des collaborateurs sont stockées dans le dossier `images/`
- Le système utilise des sessions PHP pour la gestion de l'authentification
- Les fichiers de configuration sensibles doivent être protégés en production

---

## 🔒 Sécurité

- Utilisation de PDO avec requêtes préparées pour éviter les injections SQL
- Vérification des sessions et des rôles sur chaque page protégée
- Validation côté serveur des données utilisateur
- Protection contre les accès non autorisés via `identifier.php` et `role.php`



**© 2023-2024 OCP - Office Chérifien des Phosphates**

