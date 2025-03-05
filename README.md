# GrandTaxiGo - Plateforme de gestion de transport

## Contexte du projet

GrandTaxiGo est une plateforme de transport qui permet aux passagers de réserver des trajets avec des chauffeurs via une interface conviviale. Après une première version fonctionnelle, cette nouvelle phase de développement vise à ajouter des fonctionnalités avancées pour améliorer l'expérience utilisateur et la gestion du service.

Les nouvelles fonctionnalités incluent une gestion administrative avancée, un système d'avis et d'évaluations, une authentification flexible, un paiement sécurisé, ainsi que des outils pour automatiser la gestion des disponibilités des chauffeurs.

## Fonctionnalités

### 1. Authentification améliorée
- **Connexion via Google et Facebook** grâce à **Laravel Socialite** pour faciliter l'authentification des utilisateurs.

### 2. Gestion administrative
- Un **tableau de bord pour les administrateurs** permettant de :
  - Gérer les utilisateurs (chauffeurs et passagers).
  - Suivre les trajets avec des statistiques détaillées (nombre de trajets effectués, trajets annulés, revenus générés, etc.).
  - Superviser les réservations et la disponibilité des chauffeurs.

### 3. Avis et évaluations
- Les passagers peuvent **laisser une note et un commentaire** après chaque trajet pour évaluer leur expérience.
- Les chauffeurs peuvent également **noter et commenter les passagers**.
- **Affichage des avis** sur les profils des utilisateurs pour une meilleure transparence.

### 4. Paiement sécurisé
- **Intégration du paiement en ligne via Stripe** pour permettre aux passagers de régler leurs trajets directement sur la plateforme.

### 5. Automatisation des disponibilités des chauffeurs
- Mise en place d'un système intelligent pour **mettre à jour les disponibilités des chauffeurs** en fonction des trajets en cours et à venir.

### 6. Notifications et gestion des réservations
- **Envoi d’un email au passager** lors de l'acceptation de sa réservation, contenant un QR Code avec les informations de la demande.
- **Notifications en temps réel** pour informer les utilisateurs des mises à jour concernant leurs réservations.

### 7. Sécurité et Performance
- Utilisation de **PostgreSQL** comme base de données principale pour une robustesse et une évolutivité optimales.
- **Mise en cache** pour améliorer les performances et réduire les temps de chargement.
- **Validation des données** des utilisateurs via des Requests pour garantir l'intégrité des informations.
- **Création de slugs** pour des URLs conviviales et optimisées pour le référencement.
- **Messages flash** pour des interactions utilisateur plus conviviales.

### 8. Bonus

#### Intégration d'une carte interactive
- Utilisation de **Leaflet.js** pour permettre la visualisation des trajets en temps réel.
  - Affichage des chauffeurs disponibles sur la carte selon leur localisation.
  - Suivi en direct du trajet après l'acceptation de la réservation.

#### WebSockets pour la communication en temps réel
- Mise en place de **Laravel WebSockets** ou **Pusher** pour gérer les mises à jour instantanées.
  - Notification en temps réel lorsqu'un chauffeur accepte une réservation.
  - Suivi en temps réel du statut de la réservation (en attente, acceptée, en cours, terminée).
  - Mise à jour automatique de la liste des disponibilités des chauffeurs sans rechargement de page.
  - **Messages instantanés** entre chauffeurs et passagers pour améliorer la communication.

## Installation

### Prérequis
- PHP 8.0 ou supérieur
- Composer
- Laravel 8.x ou supérieur
- PostgreSQL
- Node.js et npm

### Étapes d'installation

1. **Cloner le repository**

   ```bash
   git clone https://github.com/lakrounehamza/GrandTaxiGo-V2.03.git
   cd grandtaxigo
2. **Installer les dépendances PHP avec Composer**

    ```bash
    composer install

3. **Configurer le fichier .env**

    ```bash
    cp .env.example .env

4. **Exécuter les migrations de la base de données**

    ```bash 
    php  artisan migrate

5. **Démarrer le serveur**
    ```bash 
    php artisan serve
