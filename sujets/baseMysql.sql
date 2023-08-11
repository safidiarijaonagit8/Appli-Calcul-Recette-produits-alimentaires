create table utilisateur(
    id integer not null auto_increment,
    nom varchar(50),
    username varchar(50),
    mdp varchar(100),
    primary key(id)
 )ENGINE=InnoDB;

insert into utilisateur values(null,"user1","user1",sha1('user1'));
insert into utilisateur values(null,"rakoto@kaly.com","rakoto@kaly.com",sha1('user'));

create table admin(
   id integer not null auto_increment,
    nom varchar(50),
    username varchar(50),
    mdp varchar(100),
    primary key(id)
)ENGINE=InnoDB;

insert into admin values(null,"admin1","admin1",sha1('admin1'));

create table typeproduit(
    id integer not null auto_increment,
    nom varchar(50),
    primary key(id)
)ENGINE=InnoDB;

create table demandeargent(
    id integer not null auto_increment,
    idutilisateur int,
    montant real,
    etat integer,
    primary key(id),
    foreign key(idutilisateur) references  utilisateur(id)
)ENGINE=InnoDB;

create table argentvirtuel(
    id integer not null auto_increment,
    idclient int,
    montantentree real,
    montantsortie real,
    primary key(id),
    foreign key(idclient) references utilisateur(id)
)ENGINE=InnoDB;

create table recette(
    id integer not null auto_increment,
    nom varchar(50),
    refrecette int,
    image varchar(50),
    primary key(id)
)ENGINE=InnoDB;

create table detailrecette(
    id integer not null auto_increment,
    refrecette int,
    nomproduit varchar(50),
    qteilaina real,
    primary key(id)
)ENGINE=InnoDB;

create table produit(
id integer not null auto_increment,
nom varchar(50),
idtype int,
prix real,
image varchar(50),
format varchar(50),
qte real,
primary key(id),
foreign key(idtype) references typeproduit(id) 
)ENGINE=InnoDB;


create table stockproduit(
    id integer not null auto_increment,
    idproduit int,
    qteentree real,
    qtesortie real,
    daty date,
    primary key(id),
    foreign key(idproduit) references produit(id)
)ENGINE=InnoDB;


insert into typeproduit values(null,"viandes");
insert into typeproduit values(null,"produits laitiers");
insert into typeproduit values(null,"legumes et fruits");
insert into typeproduit values(null,"boissons");


insert into produit values(null,"henomby",1,15000,"henomby.png","kg",1);
insert into produit values(null,"henakisoa",1,12000,"henakisoa.png","kg",1);
insert into produit values(null,"saucisse",1,20000,"saucisse.png","kg",1);

insert into produit values(null,"yaourt",2,1500,"yaourt.png","g",250);
insert into produit values(null,"creme fraiche",2,5000,"creme fraiche.png","g",100);
insert into produit values(null,"fromage",2,15000,"fromage.png","g",500);

insert into produit values(null,"banane",3,1500,"banana.png","kg",1);
insert into produit values(null,"mangue",3,1500,"mangue.png","kg",1);
insert into produit values(null,"fraise",3,5000,"fraise.png","kg",1);

insert into produit values(null,"coca",4,5000,"coca.png","litre",1);
insert into produit values(null,"fanta",4,5200,"fanta.png","litre",2);
insert into produit values(null,"thb",4,4000,"thb.png","litre",1);
insert into produit values(null,"menaka",4,4000,"menaka.png","litre",2);
insert into produit values(null,"menaka",4,400000,"menaka.png","litre",10);

insert into produit values(null,"henomby",1,150000,"henomby.png","kg",5);
insert into produit values(null,"henakisoa",1,120000,"henakisoa.png","kg",5);
insert into produit values(null,"saucisse",1,200000,"saucisse.png","kg",5);
insert into produit values(null,"creme fraiche",2,15000,"creme fraiche.png","g",500);

 

insert into stockproduit values(null,1,10,0,'2022-06-22');
insert into stockproduit values(null,2,10,0,'2022-06-22');
insert into stockproduit values(null,3,5,0,'2022-06-22');
insert into stockproduit values(null,4,1,0,'2022-06-22');
insert into stockproduit values(null,5,22,0,'2022-06-22');
insert into stockproduit values(null,6,4,0,'2022-06-22');
insert into stockproduit values(null,7,10,0,'2022-06-22');
insert into stockproduit values(null,8,10,0,'2022-06-22');
insert into stockproduit values(null,9,12,0,'2022-06-22');
insert into stockproduit values(null,10,11,0,'2022-06-22');
insert into stockproduit values(null,11,17,0,'2022-06-22');
insert into stockproduit values(null,12,7,0,'2022-06-22');

insert into stockproduit values(null,20,100,0,'2022-06-22');
insert into stockproduit values(null,21,100,0,'2022-06-22');
insert into stockproduit values(null,22,100,0,'2022-06-22');
insert into stockproduit values(null,23,100,0,'2022-06-22');
insert into stockproduit values(null,24,100,0,'2022-06-22');
insert into stockproduit values(null,25,100,0,'2022-06-22');

insert into demandeargent values(null,1,524000,0);

insert into recette values(null,"lasopy henomby creme",1,"henomby.png");
insert into recette values(null,"henakisoa ritra",2,"henakisoa.png");

insert into detailrecette values(null,1,"henomby",2);
insert into detailrecette values(null,1,"creme fraiche",200);
insert into detailrecette values(null,1,"henomby",2);

insert into detailrecette values(null,2,"henakisoa",2);
insert into detailrecette values(null,2,"menaka",1);




create view v_etatstock as select p.id,p.format,p.qte,
p.nom,tp.nom as categorie,p.prix,p.image,sum(s.qteentree)-sum(s.qtesortie) as reste 
from produit p join typeproduit tp on p.idtype=tp.id
join stockproduit s on p.id=s.idproduit group by s.idproduit; 
/*left join au cas ou tsy anaty stock le produit*/


create view v_listedemande as select d.id,d.etat,u.id as idutilisateur,
u.nom,d.montant from utilisateur u join demandeargent d
on d.idutilisateur=u.id


create table panier(
    id integer not null auto_increment,
    idproduit int,
    isa real,
    type varchar(50),
    primary key(id),
    foreign key(idproduit) references produit(id)
)ENGINE=InnoDB;

create table achatproduit(
    id integer not null auto_increment,
    idclient int,
    refachat int,
    prixtotal real,
    daty date,
    primary key(id),
    foreign key(idclient) references utilisateur(id)
)ENGINE=InnoDB;
insert into achatproduit values(null,1,1,120000,'2022-06-23');

create table detailachatproduit(
    id integer not null auto_increment,
    refachat int,
    idproduit int,
    isa real,
    primary key(id),
    foreign key(idproduit) references produit(id)
)ENGINE=InnoDB;

create view v_produitlafo as
select sum(isa) as isalafo,p.nom,p.qte,p.format from detailachatproduit d join produit p
on d.idproduit=p.id
 group by d.idproduit;  


 create table reste(
     id integer not null auto_increment,
     nomproduit varchar(50),
     entree real,
     sortie real,
     primary key(id)
 )ENGINE=InnoDB;




 delete from typeproduit
 delete from produit


un sachet 0.5kg de cote de porc 12000
insert into produit values(null,"cote de porc",1,12000,"","kg",0.5);
bouteille 0.25l d huile 3500
insert into produit values(null,"bouteille huile",4,3500,"","litre",0.25);
un sachet de 0.20 kg de sel 500
insert into produit values(null,"sel",4,500,"","kg",0.20);
pack de 1kg de pomme de terre 1650
insert into produit values(null,"pomme de terre",3,1650,"","kg",1);
pack de 0.5kg de carotte 1300
insert into produit values(null,"carotte",3,1300,"","kg",0.5);
pack de 0.33kg de poireau 1000
insert into produit values(null,"poireau",3,1000,"","kg",0.33);


une boite de 0.250kg haricot 2200
pack de 6 bouteille de cristalline 9000
fromage 250g 6600
sachet 750g viande de boeuf 17320
barquette glace vanille choco 21000
insert into produit values(null,"haricot",3,2200,"","kg",0.25);
insert into produit values(null,"pack de 6 bouteille de cristalline",4,9000,"","litre",6);
insert into produit values(null,"viande de boeuf",1,17320,"","kg",0.75);
insert into produit values(null,"glace vanille choco",2,21000,"","barquette",1);
insert into produit values(null,"fromage",2,6600,"","kg",0.25);





**Recette
cote de porc au petit legume pour 4 personnes
    750g cote de porc
    0.2l huile
    pomme de terre 1kg
    carotte 1kg
    poireau 500g

insert into recette values(null,)

Henomby sy tsaramaso 4 personnes
500g viande de boeuf
600g haricot
100g poireau

insert into detailrecette values(null,3,"cote de porc",0.75);
insert into detailrecette values(null,3,"bouteille huile",0.2);
insert into detailrecette values(null,3,"pomme de terre",1);
insert into detailrecette values(null,3,"carotte",1);
insert into detailrecette values(null,3,"poireau",0.5);

insert into detailrecette values(null,4,"viande de boeuf",0.5);
insert into detailrecette values(null,4,"haricot",0.6);
insert into detailrecette values(null,4,"poireau",0.1);



insert into recette values(null,"cote de porc au petit legume pour 4 personnes",3,"");
insert into recette values(null,"Henomby sy tsaramaso 4 personnes",4,"");