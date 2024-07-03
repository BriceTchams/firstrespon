-- CREATION DES DIFFERENTES TABLES DE LA BASE DE DONNEES 

-- creation de la table restaurant 

CREATE TABLE Restaurant(id_restau int auto_increment primary key , email VARCHAR(30) NOT NULL, nom VARCHAR(40) NOT NULL ,mot_de_passe VARCHAR(20) NOT NULL , ville VARCHAR(50) , type VARCHAR(20) NOT NULL , pays VARCHAR(20) NOT NULL  ,telephone int NOT NULL , date_creation Date NOT NULL, longitude FLOAT NOT NULL , latitude FLOAT NULL);

-- creation de la table client 

CREATE TABLE Client(id_client int auto_increment PRIMARY KEY , email VARCHAR(30) NOT NULL,nom VARCHAR(20) NOT NULL ,prenom VARCHAR(20) NOT NULL , telephone int NOT NULL , mot_de_passe VARCHAR(20) NOT NULL , ville VARCHAR(50) NOT NULL, type VARCHAR(20) NOT NULL,pays VARCHAR(100) NOT NULL  );


-- creation de la table Plat
CREATE TABLE Plat (id_plat int auto_increment PRIMARY KEY , url_photo VARCHAR(80) NOT NULL , libelle VARCHAR(100) NOT NULL , pu INT NOT NULL , id_restau int, foreign key(id_restau) references Restaurant(id_restau) 
,date_post DATE NOT NULL);

--creation de la table commande 

CREATE TABLE Commande(id_com int auto_increment PRIMARY KEY , date_com DATE not null , id_client int NOT NULL ,
foreign key(id_client) REFERENCES Client(id_client) );

-- ceation de la table ligne de commande 

CREATE TABLE Ligne_commande(id_ligne int auto_increment PRIMARY KEY not null , quantite int NOT NULL , id_com int NOT NULL , id_plat int not null ,
foreign key (id_com) REFERENCES Commande(id_com),
foreign key (id_plat) REFERENCES Plat (id_plat)


);

ALTER TABLE client ADD COLUMN url VARCHAR(100) not null ;

ALTER TABLE Restaurant ADD COLUMN url VARCHAR(100) not null ;

ALTER TABLE Restaurant ADD COLUMN longitude FLOAT not null default 0;
ALTER TABLE Restaurant ADD COLUMN latitude FLOAT not null default 0;






-- creation de la table notification 

CREATE TABLE Notification(id_notif int not null PRIMARY KEY  auto_increment , objet VARCHAR(300) NOT NULL);

-- Creation de la table Enoyer qui est l'association entre notification , client et restaurant 

CREATE TABLE Envoyer(date_envoi  DATE NOT NULL , id_client int , id_restau int ,id_notif int,
FOREIGN KEY(id_client) REFERENCES Client(id_client) , FOREIGN KEY (id_restau) REFERENCES Restaurant(id_restau) , FOREIGN KEY (id_notif) REFERENCES notification(id_notif) 
,PRIMARY KEY(id_client ,  id_restau , id_notif));


-- creation de la table livraison 

CREATE TABLE Livraison (id_liv int auto_increment primary key ,  date_liv date not nulL ,Montant int not null ,id_restau int ,  id_com int not null,
FOREIGN KEY (id_restau) REFERENCES Restaurant(id_restau) , FOREIGN KEY (id_com) REFERENCES Commande(id_com) 

);


CREATE TABLE ADMIN (id_Admin int auto_increment primary key, login varchar(20)  not  null, password int not null);


-- creation de la table menu

CREATE TABLE Menu(id_menu int auto_increment primary key ,id_restau int , 
FOREIGN KEY (id_restau) REFERENCES Restaurant(id_restau));

-- creation de la table ligne menu pour chaque menu 
CREATE TABLE Ligne_menu(id_lignemenu int auto_increment primary key , libelle VARCHAR(20), description  text, pu int, image text , 
id_menu int , 
FOREIGN KEY (id_menu) REFERENCES Menu(id_menu) );















prenom, telephone , mot_de_passe , ville , type , pays, url)
values ('icecrame@gmail.com', 'TCHAMOU' , 'BRICE' ,'691231066', '1234', 'Bafoussam' ,'client' ,  'Cameroun' , 'puree.jpg' ) ;

INSERT INTO Restaurant(email ,nom , mot_de_passe , ville , type, pays ,telephone , date_creation, url ) values ('icecrame@gmail.com','ice crame' ,'123' , 'BAFOUSSAM' , 'RESTAURANT' , 'CAMEROUN' , '699435677' , '2020-03-05','eru.jpeg' );

INSERT INTO Plat (url_photo , libelle , pu ,id_restau) values('./image/Riz sauceTomate2.jpg' , 
'Riz sauce Tomate' , '3500' , '1');

INSERT INTO Plat (url_photo , libelle , pu ,id_restau) values('./image/sandiwdch.jpg' , 
'Sandiwch' , '1600' , '1');

INSERT INTO Plat (url_photo , libelle , pu ,id_restau) values('./image/PouletDj.jpg' , 
'Poulet D' , '4000' , '1');

