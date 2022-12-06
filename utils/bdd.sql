create database ;
use ;

create table droit (
id_droit int auto_increment primary key not null,
nom_droit varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table utilisateur(
id_util int auto_increment primary key not null,
mdp_util varchar(100),
pseudo_util varchar(50),
nom_util varchar(50),
prenom_util varchar(50),
email_util varchar(50),
id_droit int not null,
valide_util tinyint (1),
token_util varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table operation (
id_operation int auto_increment primary key not null,
date_operation date,
montant_operation float,
nom_operation varchar(50),
id_categorie_global int not null,
id_categorie_utilisateur int null,
id_util int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table categorie_utilisateur(
id_categorie_utilisateur int auto_increment primary key not null,
nom_categorie_utilisateur varchar(50),
id_categorie_global int not null,
id_util int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table categorie_global(
id_categorie_global int auto_increment primary key not null,
nom_categorie_global varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table prevision(
id_prevision int auto_increment primary key not null,
nom_prevision varchar(50),
budget_prevision float,
id_util int not null,
id_frequence int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table frequence(
id_frequence int auto_increment primary key not null,
liste_frequence varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table avoir(
id_prevision int not null,
id_categorie_global int not null,
budget float null,
primary key (id_prevision,id_categorie_global)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


---------------------------------------- ajout des contraintes ---------------------

-------------------------- contrainte pour la table d'association //////////avoir
-- id_prevision
alter table avoir
add constraint fk_avoir_prevision
foreign key (id_prevision)
references prevision(id_prevision);
-- id_categorie_utilisateur
alter table avoir
add constraint fk_avoir_categorie_utilisateur
foreign key (id_categorie_global)
references categorie_global(id_categorie_global);

---------------------------------------- contrainte pour la table ///////////categorie utilisateur

-- id  categorie_global
alter table categorie_utilisateur
add constraint fk_ranger_categorie_global
foreign key (id_categorie_global)
references categorie_global(id_categorie_global);

-- id  util
alter table categorie_utilisateur
add constraint fk_creer_utilisateur
foreign key (id_util)
references utilisateur(id_util);

---------------------------------------- contrainte pour la table /////////// prevision
-- id  frequence
alter table prevision
add constraint fk_repeter_frequence
foreign key (id_frequence)
references frequence(id_frequence);

-- id  utilisateur
alter table prevision
add constraint fk_concevoir_utilisateur
foreign key (id_util)
references utilisateur(id_util);


---------------------------------------- contrainte pour la table /////////// utilisateur
-- id  droit
alter table utilisateur
add constraint fk_posseder_droit
foreign key (id_droit)
references droit(id_droit);

--------------------------------------------- contrainte de la table operation

-- id_categorie_global
alter table operation 
add constraint fk_operer_categorie_global
foreign key(id_categorie_global)
references categorie_global(id_categorie_global);

-- id_categorie_utilisateur
alter table operation 
add constraint fk_associer_categorie_utilisateur
foreign key(id_categorie_utilisateur)
references categorie_utilisateur(id_categorie_utilisateur);

-- id_util
alter table operation 
add constraint fk_depenser_utilisateur
foreign key(id_util)
references utilisateur (id_util);


insert into droit (nom_droit) values 
("Utilisateur"),
("Admin");

insert into frequence (liste_frequence) values 
("jour"),
("mois"),
("bimestriel"),
("trimestriel"),
("quadrimestriel"),
("semestriel "),
("annuel");

insert into categorie_global (nom_categorie_global) values 
("Loisir"),
("banque"),
("salaire"),
("travail"),
("loyer"),
("transport"),
("restaurant"),
("frais fixe"),
("energie");


create table type_demande(
    id_type_demande int auto_increment primary key not null,
    nom_type_demande varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table formulaire (
id_formulaire int auto_increment primary key not null,
date_formulaire date,
nom_formulaire varchar(50),
email_formulaire varchar(50),
sujet_formulaire varchar(50),
objet_formulaire varchar(50),
isLu tinyint(1),
id_type_demande int null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


alter table formulaire 
add constraint fk_typer_type_demande
foreign key(id_type_demande)
references type_demande(id_type_demande);

insert into type_demande (nom_type_demande) values 
("contact"),
("devis"),
("suggestions");


