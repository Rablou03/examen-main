CREATE DATABASE Examen;
USE Examen;

CREATE TABLE Examen_membre(
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(500),
    date_de_naissane DATE,
    genre VARCHAR(10),
    email VARCHAR(500),
    ville VARCHAR(500),
    mdp VARCHAR(500),
    image_profil VARCHAR(500)
);

CREATE TABLE Examen_categorie_objet(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(500)
);

CREATE TABLE Examen_objet(
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(500),
    id_categorie INT, 
    id_membre INT,
    FOREIGN KEY (id_membre) REFERENCES Examen_membre(id_membre),
    FOREIGN KEY (id_categorie) REFERENCES Examen_categorie_objet(id_categorie)
);

CREATE TABLE Examen_images_objet(
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT, 
    nom_image VARCHAR(500),
    FOREIGN KEY (id_objet) REFERENCES Examen_objet(id_objet)
);

CREATE TABLE Examen_emprunt(
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT, 
    id_membre INT, 
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES Examen_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES Examen_membre(id_membre)
);




INSERT INTO Examen_membre(nom, date_de_naissane, genre, email, ville, mdp, image_profil) VALUES
('Tafita', '2006-04-21', 'F', 'tafite@gmail.com', 'Antsirabe', '1215', 'lol'),
('SandAina', '2007-02-19', 'F', 'sandy@gmail.com', 'Antsirabe', '1929', 'lol'),
('Windy', '2008-01-30', 'F', 'windy@gmail.com', 'Antsirabe', '0608', 'lol'),
('Miaro', '2006-09-29', 'M', 'miaro@gmail.com', 'Antsirabe', '1929', 'lol');


INSERT INTO Examen_categorie_objet(nom_categorie) VALUES 
('esthetique'),
('bricolage'),
('mecanique'),
('cuisine');

INSERT INTO Examen_images_objet(id_objet,nom_image) VALUES
(1,"IMG_5247.JPG"),
(2,"IMG_5248.JPG"),
(3,null),
(4,"IMG_5246.JPG"),
(5,null),
(6,"IMG_5257.JPG"),
(7,null),
(8,null),
(9,null),
(10,"IMG_5251.JPG"),
(11,null),
(12,null),
(13,null),
(14,null),
(15,null),
(16,"IMG_5256.JPG"),
(17,null),
(18,"IMG_5259.JPG"),
(19,null),
(20,null),
(21,null),
(22,null),
(23,null),
(24,"IMG_5249.JPG"),
(25,"IMG_5246.JPG"),
(26,"img85259.JPG"),   
(27,null),
(28,null),
(29,null),
(31,null),
(32,null),
(33,null),
(34,null),
(35,null),
(36,null),
(37,null),
(38,null),
(39,null),
(40,null);

-- Membre 1
INSERT INTO Examen_objet(nom_objet, id_categorie, id_membre) VALUES
('Rouge à levres', 1, 1),
('Gloss', 1, 1),
('Vernis à ongles', 1, 1),
('Ciseaux', 2, 1),
('Marteau', 2, 1),
('Tourne vis', 2, 1),
('Huile à moteur', 3, 1),
('Bouilloire', 4, 1),
('Poele', 4, 1),
('Autocuiseur', 4, 1);

-- Membre 2
INSERT INTO Examen_objet(nom_objet, id_categorie, id_membre) VALUES
('Brosse', 1, 2),
('Faux cils', 1, 2),
('Eyeliner', 1, 2),
('Colle', 2, 2),
('Bois', 2, 2),
('Scie', 2, 2),
('Clé', 3, 2),
('Clou', 3, 2),
('Planche', 4, 2),
('Assiettes de table', 4, 2);

-- Membre 3
INSERT INTO Examen_objet(nom_objet, id_categorie, id_membre) VALUES
('Parfum', 1, 3),
('Déodorant', 1, 3),
('Dentifrice', 1, 3),
('Papier', 2, 3),
('Ciseaux', 2, 3),
('Tournevis', 2, 3),
('Clé à molette', 3, 3),
('Huile moteur', 3, 3),
('Couteaux', 4, 3),
('Râpe à fromage', 4, 3);

-- Membre 4
INSERT INTO Examen_objet(nom_objet, id_categorie, id_membre) VALUES
('Crème visage', 1, 4),
('Baume à lèvres', 1, 4),
('Fond de teint', 1, 4),
('Pinceau', 2, 4),
('Scotch', 2, 4),
('Vis', 2, 4),
('Pompe', 3, 4),
('Jauge de pression', 3, 4),
('Couverts', 4, 4),
('Verres', 4, 4);




INSERT INTO Examen_emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),  
(2, 3, '2025-07-02', '2025-07-11'),   --
(3, 4, '2025-07-03', '2025-07-12'),
(4, 1, '2025-07-04', '2025-07-13'),  
(5, 2, '2025-07-05', '2025-07-14'),  
(6, 3, '2025-07-06', '2025-07-15'),  
(7, 4, '2025-07-07', '2025-07-16'),   
(8, 1, '2025-07-08', '2025-07-17'),   
(9, 2, '2025-07-09', '2025-07-18'),
(10, 3, '2025-07-10', '2025-07-19');  


CREATE VIEW v_empr_objet AS
SELECT 
    E.id_objet, 
    E.date_emprunt, 
    E.date_retour, 
    O.nom_objet,
    C.id_categorie 
FROM Examen_emprunt AS E
JOIN Examen_objet AS O ON O.id_objet = E.id_objet
JOIN Examen_categorie_objet AS C ON C.id_categorie = O.id_categorie;

CREATE  or replace VIEW v_empr_objet AS
SELECT 
    E.id_objet, 
    E.date_emprunt, 
    E.date_retour, 
    O.nom_objet,
    C.id_categorie,
    C.nom_categorie,
    M.id_membre,
    M.nom
FROM Examen_emprunt AS E
JOIN Examen_objet AS O ON O.id_objet = E.id_objet
JOIN Examen_categorie_objet AS C ON C.id_categorie = O.id_categorie
JOIN Examen_membre as M ON M.id_membre=E.id_membre;
