
CREATE TYPE typeaccount AS ENUM ('utilisateur', 'administrateur');

CREATE TYPE typelocomotion AS ENUM ('prive','public');

CREATE TYPE typehebergement AS ENUM ('hotel','camping','auberge de jeunesse', 'appartement', 'airbnb', 'maison','palace');

CREATE TYPE typeinteret AS ENUM ('police','hopital','gendarmerie','banque','station service','centre commercial');

CREATE TYPE typeactivite AS ENUM ('musee','parc d attraction', 'detente', 'bien-être','sport','reflexion');

CREATE TYPE typestuff AS ENUM ('hebergement','locomotion','pays');

CREATE TYPE typemeteo AS ENUM ('ensoleille', 'nuageux', 'pluvieux', 'vent violent', 'humide');


CREATE TABLE utilisateur
(
    login character varying(50) NOT NULL UNIQUE,
    password character varying(200) NOT NULL,
    type_account typeaccount NOT NULL,
    email character varying(100) NOT NULL UNIQUE,
    CONSTRAINT utilisateur_pkey PRIMARY KEY (login)



);

CREATE TABLE pays
(
    id_country serial,
    country_name character (50) NOT NULL,
    time_fly time,
    average_price integer NOT NULL,
    visa_required boolean,
    vaccin_required boolean,
    CONSTRAINT pays_pkey PRIMARY KEY (id_country),
    CONSTRAINT pays_key PRIMARY KEY (average_price)
);

CREATE TABLE locomotion
(
    id_locomotion serial,
    locomotion_name character (50) NOT NULL,
    type_locomotion typelocomotion NOT NULL,
    price_locomotion integer NOT NULL,
    horaire_locomotion character varying(200),
    CONSTRAINT locomotion_pkey PRIMARY KEY (id_locomotion),
    CONSTRAINT locomotion_pkey PRIMARY KEY (locomotion_name),
    CONSTRAINT locomotion_pkey PRIMARY KEY (price_locomotion)

);

CREATE TABLE hebergement
(
    id_hebergement serial,
    hebergement_name character (100) NOT NULL,
    type_hebergement typehebergement NOT NULL,
    city_hebergement character (50) NOT NULL,
    adress_hebergement character varying(200),
    average_price integer NOT NULL,
    h_login character varying(50),
    CONSTRAINT hebergement_pkey PRIMARY KEY (id_hebergement),
    CONSTRAINT hebergement_pkey PRIMARY KEY (hebergement_name),
    CONSTRAINT hebergement_pkey PRIMARY KEY (average_price),
    FOREIGN KEY (h_login) REFERENCES utilisateur (login)
);

CREATE TABLE meteo
(
    id_meteo serial,
    city_meteo character (50) NOT NULL,
    temps_meteo typemeteo,
    temperature integer NOT NULL,
    CONSTRAINT meteo_pkey PRIMARY KEY (id_meteo)
);

CREATE TABLE point_interet
(
    id_interet serial,
    name_interet character (200) NOT NULL,
    type_interet typeinteret NOT NULL,
    telephone character varying(100),
    adress_interet character varying(200),
    time_open character varying(200),
    city_interet character (200) NOT NULL,
    CONSTRAINT point_interet_pkey PRIMARY KEY (id_interet)
);

CREATE TABLE activite
(
    id_activite serial,
    name_activite character (50) NOT NULL,
    type_activite typeactivite NOT NULL,
    adress_activite character varying(200),
    city_activite character (50) NOT NULL,
    price_activite integer,
    a_login character varying(50),
    CONSTRAINT activite_pkey PRIMARY KEY (id_activite),
    CONSTRAINT activite_pkey PRIMARY KEY (name_activite),
    CONSTRAINT activite_pkey PRIMARY KEY (city_activite),
    FOREIGN KEY (a_login) REFERENCES utilisateur (login)
);

CREATE TABLE price
(
    id_stuff serial,
    name_stuff character varying(100) NOT NULL,
    type_stuff typestuff NOT NULL,
    price_stuff integer NOT NULL,
    CONSTRAINT price_pkey PRIMARY KEY (id_stuff),
    FOREIGN KEY (name_stuff) REFERENCES activite (name_activite),
    FOREIGN KEY (name_stuff) REFERENCES hebergement (hebergement_name),
    FOREIGN KEY (name_stuff) REFERENCES pays (country_name),
    FOREIGN KEY (name_stuff) REFERENCES locomotion (locomotion_name),
    FOREIGN KEY (price_stuff) REFERENCES activite (price_activite),
    FOREIGN KEY (price_stuff) REFERENCES hebergement (average_price),
    FOREIGN KEY (price_stuff) REFERENCES pays (average_price),
    FOREIGN KEY (price_stuff) REFERENCES locomotion (price_locomotion)
);




/* ENREGISTREMENTS DE LA TABLE PAYS */

INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('ALLEMAGNE', '01:40:00', 80, 'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('ANGLETERRE', '01:10:00', 69 , 'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('BELGIQUE', '00:55:00', 62,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('CROATIE', '01:50:00',107,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('ESPAGNE', '02:05:00',71,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('FRANCE','00:00:00',0,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('ITALIE','02:00:00',63,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('PAYS-BAS','01:15:00',31,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('PORTUGAL','02:30:00',51,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('REPUBLIQUE TCHEQUE','01:15:00',69,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('RUSSIE','03:35:00',135,'true', 'true');
INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('SUISSE','01:00:00',70,'true', 'true');

/* ENREGISTREMENTS DE LA TABLE UTILISATEUR */

INSERT INTO utilisateur VALUES ('user', 'user123','utilisateur','user@mail.fr');
INSERT INTO utilisateur VALUES ('admin', 'admin123', 'administrateur','admin@mail.fr');

/* ENREGISTREMENTS DE LA TABLE HEBERGEMENT */

/*PARIS*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Royal Monceau Raffles Paris', 'palace', 'Paris','35-37 avenue Hoche, 75008 Paris, Champs Elysées', 900,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hôtel de Crillon - A Rooswood Hôtel','palace','Paris','10 place de la concorde, 75008 Paris', 2000,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Auberge Internationale des Jeunes', 'auberge de jeunesse', 'Paris', '10 rue trousseau, 75011 Paris', 50,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping de Paris', 'camping', 'Paris', '2 allée du Bord de l Eau, 75016 Paris', 150,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Appartement de charme Paris Nation', 'airbnb', 'Paris', '75000 Paris', 90,'');

/*BERLIN*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('', 'hotel', 'Berlin', '', 50,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('', 'palace', 'Berlin', '', 50,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('', 'auberge de jeunesse', 'Berlin', '', 50,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('', 'camping', 'Berlin', '', 50,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('', 'hotel', 'Berlin', '', 50,'');

/*LONDRES*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Travelodge London Brent Cross Hotel', 'hotel', 'Londres', 'Edgware Road NW9 7BW', 77,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Central Park Hotel London', 'hotel', 'Londres', '49-67 Queensborough Terrace, Londres W2 3SY Angleterre', 113,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('45 Park Lane', 'palace', 'Londres', '45 Park Lane, Mayfair, Londres, Royaume-Uni', 753,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Mandarion Oriental Hyde Park London', 'palace', 'Londres', '66 KnightsBridge Londres, Royaume-Uni', 695,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Abbey Wood Caravan Club', 'camping', 'Londres', 'Federation Road Londres, Royaume-Uni', 70,'');

/*BRUXELLES*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Rocco Forte Hotel Amigo', 'hotel', 'Bruxelles', ' 1-3 Rue de l Amigo, 1000 Bruxelles', 320,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Ibis Hotel Brussels off Grand Place', 'hotel' , 'Bruxelles', 'Grasmarkt 100, Bruxelles', 113,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Easy Hotel Brussels City Centre', 'hotel', 'Bruxelles', '1 Rue d Argent, 1000 Bruxelles', 61,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Aris Grand Place Hotel', 'hotel', 'Bruxelles', 'Grasmarkt 78-80, 1000 Bruxelles', 70,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel Mozart', 'hotel', 'Bruxelles', 'Rue Marche aux Fromages, 1000 Bruxelles', 95,'');

/*ZAGREB*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Livris Hotel ', 'hotel', 'Zagreb', 'Rapska ulica 12, 10000 Zagreb, Croatie ', 80,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel 9', 'hotel', 'Zagreb', 'Avenija Marina Držića 9, 10000 Zagreb, Croatie ', 97,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Best Western Premier Hotel Astoria', 'hotel', 'Zagreb', 'Petrinjska 71, Lower Town, 10000 Zagreb, Croatie', 99,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Plitvice Campground', 'camping', 'Zagreb', 'Lucko BB, Zagreb Croatie', 70,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camp Zagreb', 'camping', 'Zagreb', 'Jezerska 6, 10437 Rakitje, Croatie', 80,'');

/*MADRID*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel Riu Plaza Espana', 'hotel', 'Madrid', 'Calle Gran Vía, 84, Centre de Madrid, 28013 Madrid, Espagne', 129,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Soho Boutique Opera', 'hotel', 'Madrid', 'Calle Veneras, 2, Centre de Madrid, 28013 Madrid, Espagne', 128,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Soho Boutique Congreso', 'hotel', 'Madrid', ' 7 Calle de Zorrilla, Centre de Madrid, 28014 Madrid, Espagne', 118,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Osuna', 'camping', 'Madrid', 'Calle Jardines de Aranjuez, s/n, 28042 Madrid, Espagne', 65,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Madrid Rainbow', 'camping', 'Madrid', 'Carretera Villaviciosa de Odón a Boadilla del Monte, 28670 Villaviciosa de Odón, Madrid, Espagne', 74,'');

/*ROME*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel Impero', 'hotel', 'Rome', 'Via del Viminale, 19, 00184 Roma RM, Italie', 53,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Atlante Star Hotel', 'hotel', 'Rome', 'Via Giovanni Vitelleschi, 34, 00193 Roma RM, Italie', 110,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Roma Camping in Town', 'camping', 'Rome', 'Via Aurelia, 831, 00165 Roma RM, Italie', 30,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Village Fabulous', 'camping', 'Rome', 'Via di Malafede, 205, 00125 Roma RM, Italie', 60,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Happy Village Roma', 'camping', 'Rome', 'Via del Prato della Corte, 1915, 00123 Roma RM, Italie', 50,'');

/*AMSTERDAM*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Zeeburg Amsterdam', 'camping', 'Amsterdam', 'Zuider IJdijk 20, 1095 KN Amsterdam, Pays-Bas', 65,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Vliegenbos Amsterdam', 'camping', 'Amsterdam', 'Meeuwenlaan 138, 1022 AM Amsterdam, Pays-Bas', 80,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Amsterdam Gaasper', 'camping', 'Amsterdam', 'Loosdrechtdreef 7, 1108 AZ Amsterdam, Pays-Bas', 70,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('easyHotel', 'camping', 'Amsterdam', 'Van Ostadestraat 97, 1072 ST Amsterdam, Pays-Bas', 56,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('The Alfred Hotel', 'camping', 'Amsterdam', 'Cornelis Schuytstraat 58-60, 1071 JL Amsterdam, Pays-Bas', 71,'');

/*LISBONNE*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('LX Boutique Hotel', 'hotel', 'Lisbonne', ' R. do Alecrim 12, 1200-017 Lisboa, Portugal', 119,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Lisbon City Hotel', 'hotel', 'Lisbonne', 'Av. Alm. Reis No 49, 1150-019 Lisboa, Portugal', 70,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Selina Secret Garden Lisbon', 'hotel', 'Lisbonne', 'Beco Carrasco nº1, 1200-096 Lisboa, Portugal', 70,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Divine House of Graça', 'hotel', 'Lisbonne', 'Rua da Senhora da Glória 27, 1170-335 Lisboa, Portugal', 40,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Vila Garden Guesthouse', 'hotel', 'Lisbonne', ' Av. Alm. Reis 98, 1150-022 Lisboa, Portugal', 56,'');

/*PRAGUE*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('River Camping Prague', 'camping', 'Prague', '171 00 Troja, Tchéquie', 56,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Prague Džbán', 'camping', 'Prague', 'Nad lávkou 672, 160 00 Praha 6-Vokovice, Tchéquie', 60,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Camping Praha Klánovice', 'camping', 'Prague', 'V Jehličině 1040, 190 14 Praha-Klánovice, Tchéquie', 52,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('MOSAIC HOUSE', 'hotel', 'Prague', ' Odborů 278/4, 120 00 Nové Město, Tchéquie', 63,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('NYX Hotel Prague', 'hotel', 'Prague', 'Panská 1308/9, 110 00 Nové Město, Tchéquie', 68,'');

/*MOSCOU*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hôtel Moskva', 'palace', 'Moscou', 'Ulitsa Okhotnyy Ryad, 2, Moscow, Russie, 109012', 604,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('The Ritz-Carlton, Moscow', 'palace', 'Moscou', 'Tverskaya St, 3, Moscow, Russie, 125009', 494,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel Baltschug Kempinski Moscow', 'hotel', 'Moscou', 'Balchug St, 1, Moscow, Russie, 115035', 256,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Kemping "Sokol niki', 'camping', 'Moscou', '5-Y Luchevoy Prosek, 16А, Moscow, Russie, 107014', 45,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel Metropol', 'hotel', 'Moscou', 'Teatral nyy Proyezd, 2, Moscow, Russie, 109012', 194,'');

/*BERNE*/
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Bern Backpackers Hotel Glocke', 'hotel', 'Berne', ' Rathausgasse 75, 3011 Bern, Suisse', 115,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('ibis Styles Hotel Bern City', 'hotel', 'Berne', 'Zieglerstrasse 66, 3007 Bern, Suisse', 120,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hotel ibis budget Bern Expo', 'hotel', 'Berne', 'Guisanpl. 2, 3014 Bern, Suisse', 99,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Hostel 77 Bern', 'hotel', 'Berne', ' Morillonstrasse 77, 3007 Bern, Suisse', 87,'');
INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price, h_login) VALUES ('Schweizerhof', 'hotel', 'Berne', 'Bahnhofpl. 11, 3001 Bern, Suisse', 400,'');

/* ENREGISTREMENTS DE LA TABLE LOCOMOTION */

/*PARIS*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');

/*BERLIN*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');

/*LONDRES*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*ZAGREB*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');

/*BRUXELLES*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*MADRID*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*ROME*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*AMSTERDAM*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');

/*LISBONNE*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*PRAGUE*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*MOSCOU*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');


/*BERNE*/
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Metro','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Velo','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('RER','public',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('UBER','prive',0,'');
INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('Taxi','prive',0,'');



/* ENREGISTREMENTS DE LA TABLE POINT D'INTERET */

/*PARIS*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES ('Commissariat de Police du 15e arrondissement Du Centre Communal De Paris','police','123','250 Rue de Vaugirard, 75015 Paris','Ouvert 24h/24','Paris');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Hôpital Tenon AP-HP','hopital','01 56 01 70 00','4 Rue de la Chine 75020 Paris','Ouvert 24 h/24','Paris');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Station Service TOTAL','station service','01 56 52 00 01','Pkg George V, 115 Av. des Champs-Élysées, 75008 Paris','Ouvert 24h/24 ','Paris');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('LCL Banque et assurance','banque','01 55 34 97 61','47 Boulevard de Sébastopol, 75001 Paris','','Paris');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Bercy Village','centre commercial',' 01 40 02 90 80','28 Rue François Truffaut, 75012 Paris','','Paris');

/*BERLIN*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Police Berlin Central Service Unit','police','+49 30 46640','Keibelstraße 36, 10178 Berlin, Allemagne','8h-20h','Berlin');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Potsdamer Platz Arkaden','centre commercial','+49 30 2559270','Alte Potsdamer Str. 7, 10785 Berlin, Allemagne','','Berlin');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Agip','station service','+49 30 3953618','Westhafenstraße 2-3, 13353 Berlin, Allemagne','','Berlin');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Bundeswehrkrankenhaus Berlin','hopital','+49 30 28412289','Scharnhorststraße 13, 10115 Berlin, Allemagne','Ouvert 24h/24','Berlin');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('DZ BANK AG','banque','+49 30 202410','Pariser Platz 3, 10117 Berlin, Allemagne','','Berlin');

/*LONDRES*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Credit Agricole','banque','+44 20 7214 5000','Broadwalk House, 5 Appold St, London EC2A 2DA, Royaume-Uni','9h - 18h','Londres');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('St Mary s Hospital','hopital','+44 20 3312 6666','Praed St, Paddington, London W2 1NY, Royaume-Uni','Ouvert 24h/24','Londres');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Westfield London','centre commercial','+44 20 3371 2300','Ariel Way, Shepherd s Bush, London W12 7GF, Royaume-Uni','Tous les jours 10h - 22h','Londres');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Texaco (Kennington Service Station)','station service','+44 20 7735 2191','212-214 Kennington Rd, Lambeth, London SE11 6PR, Royaume-Uni','Ouvert 24h/24','Londres');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('City of London Police','police','','182 Bishopsgate, London EC2M 4NP, Royaume-Uni','','Londres');

/*ZAGREB*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Police','police','385 1 4563 520','Trg Josipa Jurja Strossmayera 3, 10000, Zagreb, Croatie','Ouvert 24h/24','Zagreb');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Banque nationale de Croatie','banque','+385 1 4564 555','Trg hrvatskih velikana 3, 10000, Zagreb, Croatie','8h-16h du Lundi au Vendredi','Zagreb');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Clinical Hospital Center Zagreb','hopital','+385 20 431 777','Šalata ul. 2, 10000, Zagreb, Croatie','Ouvert 24h/24','Zagreb');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('AS24','station service','','Slavonska avenija Bb, Culinecka Cesta Interse, 10000, Zagreb, Croatie','Ouvert 24h/24','Zagreb');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Avenue Mall','centre commercial','','Avenija Dubrovnik 16, 10020, Zagreb, Croatie','Tous les jours 8h-22h','Zagreb');

/*BRUXELLES*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Anspach Centre commercial Bruxelles','centre commercial','+32 2 211 40 60','Anspach Shopping Center, Anspachlaan 24, 1000 Brussel, Belgique','10h-19 du Lundi au Samedi','Bruxelles');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Police Capitale Bruxelles - Division Centrale','police','+32 2 279 79 79','Rue du Marché au Charbon 30, 1000 Bruxelles, Belgique','','Bruxelles');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Total','station service','+32 69 85 99 81','Avenue du Port 142, 1000 Bruxelles, Belgique','Tous les jours 5h-19h30','Bruxelles');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('CHU Saint-Pierre de Bruxelles','hopital','+32 2 535 31 11',' Rue Haute 322, 1000 Bruxelles, Belgique','Ouvert 24h/24','Bruxelles');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Belfius Bruxelles Arenberg','banque','+32 2 250 05 60','Rue de l Ecuyer 46, 1000 Bruxelles, Belgique','8h - 20h du Lundi au Vendredi','Bruxelles');

/*MADRID*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Crédit Agricole CIB','banque','',' Paseo de la Castellana, 1, 28046 Madrid, Espagne','9h - 18h du Lundi au Vendredi','Madrid');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Hospital Universitario La Paz','hopital','+34 917 27 70 00','Paseo de la Castellana, 261, 28046 Madrid, Espagne','Ouvert 24h/24','Madrid');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('National Police district Madrid-Centro','police','+34 915 48 79 85','Calle de Leganitos, 19, 28004 Madrid, Espagne','Ouvert 24h/24','Madrid');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Cepsa service station','station service','+34 915 26 12 61','Av. de Portugal, 16, 28011 Madrid, Espagne','Ouvert 24h/24','Madrid');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Centre commercial La Vaguada','centre commercial','+34 917 30 10 00','Av. de Monforte de Lemos, 36, 28029 Madrid, Espagne','9h - 02h du Lundi au Samedi','Madrid');

/*ROME*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Shopping Mall Porta di Roma','centre commercial','+39 06 8707 0275','Via Alberto Lionello, 201, 00139 Roma RM, Italie','10h - 22h du Lundi au Dimanche','Rome');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Rome police headquarters','police','+39 06 46861','Via di S. Vitale, 15, 00184 Roma RM, Italie','','Rome');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Banque d Italie','banque','+39 06 47921','Via Nazionale, 91, 00184 Roma RM, Italie','Tous les jours : 08:30–13:30, 14:30–16:15','Rome');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Esso','station service','','Piazza Albania, 00153 Roma RM, Italie','Tous les jours : 7h - 19h30','Rome');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Hôpital Gemelli','hopital','+39 06 30151','Largo Agostino Gemelli, 8, 00168 Roma RM, Italie','Ouvert 24h/24','Rome');

/*AMSTERDAM*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Onze Lieve Vrouwe Gasthuis','hopital','+31 20 599 9111',' Oosterpark 9, 1091 AC Amsterdam, Pays-Bas','Ouvert 24h/24','Amsterdam');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Total','station service','+31 20 695 4515','Gooiseweg 51, 1103 BZ Amsterdam, Pays-Bas','Ouvert 24h/24','Amsterdam');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Politie Amsterdam Centrum Jordaan','police','+31 900 8844','Lijnbaansgracht 219, 1017 PH Amsterdam, Pays-Bas','Ouvert 24h/24','Amsterdam');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Magna Plaza','centre commercial','','Nieuwezijds Voorburgwal 182I, 1012 SJ Amsterdam, Pays-Bas','Tous les jours : 10h - 22h','Amsterdam');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('ING Bank','banque','+31 20 228 8888','Rokin 90, 1012 KX Amsterdam, Pays-Bas','9h - 19h du Lundi au Samedi','Amsterdam');

/*LISBONNE*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Santander Totta','banque','+351 21 392 0580','Av. Dom Carlos i 49, 1200-718 Lisboa, Portugal','8h30 - 15h du Lundi au Vendredi','Lisbonne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Centre Vasco de Gama','centre commercial','+351 21 893 0601','Av. Dom João II 40, 1990-094 Lisboa, Portugal','Tous les jours : 9h - 00h','Lisbonne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('PSP - Esquadra de Turismo / Cometlis','police','+351 21 342 1623','Praça dos Restauradores 22, 1250-144 Lisboa, Portugal','','Lisbonne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('BP','station service','+351 21 868 1245','Av. Infante Dom Henrique, 1900-439 Lisboa, Portugal','Tous les jours : 7h - 23h','Lisbonne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Centro Hospitalar Universitário de Lisboa Central / Hospital dos Capuchos','hopital','+351 21 313 6300','Alameda Santo António dos Capuchos, 1169-050 Lisboa, Portugal','Ouvert 24h/24','Lisbonne');

/*PRAGUE*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Na Homolce Hospital','hopital','+420 257 271 111','Roentgenova 37/2, 150 30 Praha 5, Tchéquie','Ouvert 24h/24','Prague');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('AS24','station service','','Brněnská E50/E65/D1 Right Side Praha-Újezd, 149 00 Praha-Újezd, Tchéquie','Ouvert 24h/24','Prague');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('City Police Prague 1 - Old Town Station','police','+420 224 234 860','Uhelný trh 415/10, 110 00 Staré Město, Tchéquie','','Prague');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('A|X Praha Palladium','centre commercial','+420 733 551 438','nám. Republiky 1, 110 00 Petrská čtvrť, Tchéquie','Tous les jours : 9h - 22h','Prague');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Credit Agricole Corporate','banque','+420 222 076 111','Ovocný trh 1096/8, 110 00 Staré Město, Tchéquie','','Prague');

/*MOSCOU*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('VTB Bank of Moscow','banque','+7 800 200-23-26','Voznesenskiy Pereulok, 22, Moscow, Russie, 125009','9h - 18h du Dimanche au Jeudi','Moscou');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Okhotny Ryad','centre commercial','+7 495 737-84-49','Manege Sq, 1, стр. 2, Moscow, Russie, 125009','Tous les jours : 10h - 22h','Moscou');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('The district police station','police','+7 985 837-21-20','Lefortovskiy Pereulok, 12/50, Moscow, Russie, 105005','','Moscou');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Lukoil','station service','+7 800 100-09-11','Koroviy Val Ulitsa, 9Б строение 1, Moscow, Russie, 119049','Ouvert 24h/24','Moscou');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('HSCT Centre Moscow','hopital','','Nizhnyaya Pervomayskaya Ulitsa, 70с2, Moscow, Russie, 105203','Ouvert 24h/24','Moscou');

/*BERNE*/
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Hopital Berne','hopital','+41 31 632 21 11','Freiburgstrasse 20, 3010 Bern, Suisse','Ouvert 24h/24','Berne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Avia','station service','','Papiermühlestrasse 11, 3013 Bern, Suisse','','Berne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Seepolizei Wohlensee','police','+41 31 368 75 41','Schulstrasse 2, 3032 Wohlen bei Bern, Suisse','','Berne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Westside','centre commercial','+41 31 556 91 11','Riedbachstrasse 100, 3027 Bern, Suisse','9h - 20h du Lundi au Samedi','Berne');
INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES  ('Banque nationale Suisse BNS','banque','+41 58 631 00 00','Bundesplatz 1, 3003 Bern, Suisse','8h30 - 12h du Lundi au Vendredi','Berne');



/*ENREGISTREMENT DE LA TABLE ACTIVITE*/


/*PARIS*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Disneyland Paris','parc d attraction','Boulevard de Parc, 77700 Coupvray','Paris',70,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musée d Orsay','musee','1 Rue de la Légion d Honneur, 75007 Paris','Paris',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Parc des princes','sport','24 Rue du Commandant Guilbaud, 75016 Paris','Paris',60,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Spa Villa Thalgo','detente','8 Avenue Raymond Poincaré, 75016 Paris','Paris',35,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Espace • Bien-Être • Beauté • Énergie','bien-être','13 Rue de la Collégiale, 75005 Paris','paris',26,'');

/*BERLIN*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Slim-Gym Club Mitte - EMS training','sport','Chausseestraße 51, 10115 Berlin, Allemagne','Berlin',45,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musée de Pergame','musee','Bodestraße 1-3, 10178 Berlin, Allemagne','Berlin',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Liquidrom','detente','Möckernstraße 10, 10963 Berlin, Allemagne','Berlin',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('tranxx - Floating floating bath & massage world','bien-être','Akazienstraße 27, 10823 Berlin, Allemagne','Berlin',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Monsterkabinett','parc d attraction','Rosenthaler Str. 39, 10178 Berlin, Allemagne','Berlin',26,'');

/*LONDRES*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Boating Lake Alexandra Palace','parc d attraction','','Londres',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Akasha Holistic Wellbeing','bien-être','Hotel Café Royal, 50 Regent St, Soho, London W1B 5AS, Royaume-Uni','Londres',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('St James s Park','detente','London SW1A 2BJ, Royaume-Uni','Londres',5,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Museum of London','musee','150 London Wall, Barbican, London EC2Y 5HN, Royaume-Uni','Londres',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Thorpe Park','parc d attraction','Staines Rd, Chertsey KT16 8PN, Royaume-Uni','Londres',30,'');

/*ZAGREB*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Parc zoologique de Zagreb','parc d attraction','Maksimirski perivoj, 10000, Zagreb, Croatie','Zagreb',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Thai Centar "Thalea"','detente','Bogovićeva ul. 7/3, 10000, Zagreb, Croatie','Zagreb',8,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('La Crème Wellness & Beauty Spa Center','bien-être','Bisacka ulica 14 (1. kat/1st floor), 10000, Zagreb, Croatie','Zagreb',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('musée d art contemporain, Croatie','musee','Avenija Dubrovnik 17, 10000, Zagreb, Croatie','Zagreb',20,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('MoFit fitness club Zagreb','sport','Selska 81, (Zorkovačka ulica 6), 10000, Zagreb, Croatie','Zagreb',40,'');

/*BRUXELLES*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Beauty Cool Gym','sport','Rue Guillaume Kennis 21, 1030 Bruxelles, Belgique','Bruxelles',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musées Royaux des Beaux-Arts de Belgique','musee','Rue de la Régence 3, 1000 Bruxelles, Belgique','Bruxelles',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Spa Spasiba Bruxelles','bien-être','Boulevard de Waterloo 47, 1000 Bruxelles, Belgique','Bruxelles',40,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Espérance','detente','Boulevard Adolphe Max 72, 1000 Bruxelles, Belgique','Bruxelles',25,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Foire du Midi','parc d attraction','Boulevard du Midi 90, 1000 Bruxelles, Belgique','Bruxelles',5,'');

/*MADRID*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Museo Nacional del Prado','musee','Calle de Ruiz de Alarcón, 23, 28014 Madrid, Spain','Madrid',22,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('El Tigre Sidra Bar','detente','Calle de las Infantas, 23, 28004 Madrid, Spain','Madrid',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Centro Nacional de Golf','sport','Calle del Arroyo del Monte, 5, 28035 Madrid, Spain','Madrid',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Auditorio Nacional de Música','detente','Calle del Príncipe de Vergara, 146, 28002 Madrid, Spain','Madrid',60,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Quinta de los Molinos park','reflexion','Calle de Alcalá, 527, 28027 Madrid, Spain','Madrid',60,'');

/*ROME*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Pantheon','musee','Piazza della Rotonda, 00186 Roma RM, Italy','Rome',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('MAXXI Museo nazionale delle arti del XXI secolo','musee','Via Guido Reni, 4A, 00196 Roma RM, Italy','Rome',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Hard Rock Cafe','detente','Via Vittorio Veneto, 62A/B, 00187 Roma RM, Italy','Rome',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Tempio di Esculapio','musee','Via Ulisse Aldrovandi, 6, 00197 Roma RM, Italy','Rome',50,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Museo e Galleria Borghese','musee','Piazzale Scipione Borghese, 5, 00197 Roma RM, Italy','Rome',23,'');

/*AMSTERDAM*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Anne Frank House','musee','Westermarkt 20, 1016 GV Amsterdam, Netherlands','Amsterdam',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Eye Film Museum','musee','IJpromenade 1, 1031 KT Amsterdam, Netherlands','Amsterdam',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Golfbaan Spaarnwoude','sport','Het Hoge Land 2, 1981 LT Velsen-Zuid, Netherlands','Amsterdam',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Bezoekerscentrum De Hoep','musee','⛉ Johannisweg 2, 1901 NX Castricum, Netherlands','Amsterdam',0,'');


/*LISBONNE*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Elohim Spa Lisbon','detente','Largo do Rato 3, 1250-012 Lisboa, Portugal','Lisbonne',20,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Stade de Luz','sport','Av. Eusébio da Silva Ferreira, 1500-313 Lisboa, Portugal','Lisbonne',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Bibliothèque nationale du Portugal','reflexion','Campo Grande 83, 1749-081 Lisboa, Portugal','Lisbonne',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Museu de Marinha','musee','Praça do Império, 1400-206 Lisboa, Portugal','Lisbonne',5,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Escape Hunt Lisbon','parc d attraction','R. dos Douradores 13, 1100-206 Lisboa, Portugal','Lisbonne',15,'');

/*PRAGUE*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musée national de Prague','musee','Václavské nám. 68, 110 00 Nové Město, Tchéquie','Prague',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('CrossFit Praha','sport','Malá Štěpánská 1929/9, 120 00 Nové Město, Tchéquie','Prague',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Prague Beer Spa Bernard','detente','Týn 644/10, 110 00 Staré Město, Tchéquie','Prague',10,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('bibliothèque de Prague','reflexion','Mariánské nám. 98/1, 110 00 Josefov, Tchéquie','Prague',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('SPA KINGS COURT - wellness, spa, relaxation','bien-être','U Obecního domu 3, 110 00 Staré Město, Tchéquie','Prague',0,'');

/*MOSCOU*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Family Park SKAZKA','parc d attraction','Krylatskaya Ulitsa, 18, Moscow, Russie, 121552','Moscou',35,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Fitness club [Republika]','sport','Серебряническая набережная, 29/БЦ Silver City, Moscow, Russie, 105064','Moscou',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Wai Thai','bien-être','Gogolevsky Blvd, 23, Moscow, Russie, 119019','Moscou',20,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Bibliothèque d État de Russie','reflexion','Vozdvizhenka St., 3/5, Moscow, Russie, 119019','Moscou',0,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musée des beaux-arts Pouchkine','musee','Ulitsa Volkhonka, 12, Moscow, Russie, 119019','Moscou',5,'');

/*BERNE*/
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('SKILLS PARK LITE','parc d attraction','Zentweg 11, 3006 Bern, Suisse','Berne', 20,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('EVO Fitness','sport','Effingerstrasse 16, 3008 Bern, Suisse','Berne',15,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('JENNI WELLBEING | Massage Bern ','bien-être','Waldhöheweg 30, 3013 Bern, Suisse','Berne',30,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Solbad Schönbühl Bern','detente','Mattenweg 30, 3322 Urtenen-Schönbühl, Suisse','Berne',45,'');
INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite, a_login) VALUES ('Musée Alpin Suisse','musee','Helvetiapl. 4, 3005 Bern, Suisse','Berne',20,'');




/*ENREGISTREMENT TABLE METEO*/
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Paris','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Londres','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Amsterdam','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Madrid','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Rome','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Zagreb','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Bruxelles','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Prague','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Berlin','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Berne','nuageux',15);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Moscou','nuageux',0);
INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('Lisbonne','nuageux',25);
