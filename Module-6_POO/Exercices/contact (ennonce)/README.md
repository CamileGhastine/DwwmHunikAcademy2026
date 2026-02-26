# 📒 Carnet d'Adresse — Liste des Fonctionnalités

> Application CRUD en architecture **MVC / POO**  
> Stack : **PHP pur / MySQL**

---

## ✅ Fonctionnalités à implémenter

### 1. Gestion des contacts (CRUD)

| # | Fonctionnalité | Description |
|---|---------------|-------------|
| 1 | **READ** | Afficher la liste de tous les contacts (Nom et Prénom) sous forme de tableau |
| 2 | **READ** | Afficher le déatils d'un contact |
| 3 | **CREATE** | Ajouter un contact avec les champs : Nom, Prénom, Email, Téléphone, Adresse |
| 4 | **UPDATE** | Modifier un contact existant (pré-remplissage du formulaire au clic) |
| 5 | **DELETE** | Supprimer un contact avec une confirmation via un formulaire POST |


---

### 2. Formulaire

| # | Fonctionnalité | Description |
|---|---------------|-------------|
| 5 | Validation des champs obligatoires côté **front et back** | Nom et Prénom au minimum |
| 6 | Validation du format Email côté **front et back** | Vérifierle fomat email|
| 7 | Validation du format Téléphone côté **front et back** | Vérifier le format numérique |

---

### 3. Router central (`index.php`)

| # | Route | Description |
|---|-------|-------------|
| 8 | `?route=index` | Afficher tous les contacts |
| 9 | `?route=show&id=X` | Afficher le détail d'un contact |
| 10 | `?route=add` | Afficher le formulaire vide **et** traiter la soumission (POST) |
| 11 | `?route=update&id=X` | Afficher le formulaire pré-rempli **et** traiter la soumission (POST) |
| 12 | `?route=delete&id=X` | Supprimer un contact (POST) |

---

### 4. Modèle (`ContactModel.php`)

| # | Méthode | Description |
|---|---------|-------------|
| 13 | `findAll()` | Récupérer tous les contacts |
| 14 | `findById($id)` | Récupérer un contact par son id |
| 15 | `add($data)` | Insérer un nouveau contact |
| 16 | `update($id, $data)` | Modifier un contact existant |
| 17 | `delete($id)` | Supprimer un contact |

---

### 5. Sécurité

- Protection contre les **injections SQL** → requêtes préparées PDO (`prepare()` / `execute()`)
- Protection contre la faille **XSS** → `htmlspecialchars()` dans les vues

---

## 🗄️ Structure de la table MySQL

```sql
CREATE TABLE contact (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nom       VARCHAR(100) NOT NULL,
    prenom    VARCHAR(100) NOT NULL,
    email     VARCHAR(150),
    telephone VARCHAR(20),
    adresse   VARCHAR(255)
);
```

---

## 🔄 Flux de données MVC

```
Navigateur (HTTP Request)
    │
    ▼
[index.php] — Router (lit le paramètre ?route=)
    │
    ▼
[ContactController] — traite la logique métier
    │
    ├──── [ContactModel] — requête PDO → MySQL
    │
    ▼
[View PHP] — affiche le HTML (index.php / show.php / form.php)
    │
    ▼
Navigateur (HTTP Response)
```
