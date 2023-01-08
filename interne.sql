DROP TABLE IF EXISTS ListeVisites;
DROP TABLE IF EXISTS PatientsMedecins;
DROP TABLE IF EXISTS Patients;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS Medecins;
DROP TABLE IF EXISTS Visites;
DROP TABLE IF EXISTS Cabinet;
DROP TABLE IF EXISTS Ordonnances;


CREATE TABLE Patients (
	numSecu CHAR(13) PRIMARY KEY,
	LieuNaissance VARCHAR(100),
	nom VARCHAR(25),
	prenom VARCHAR(25),
	dateNaissance DATE,
	adresse VARCHAR(50),
	codePostal INT(5),
	medecinRef INT(11),
	numTel INT(9),
	email VARCHAR(50),
	notes TEXT,
	sexe bool
);

CREATE TABLE Medecins (

	numRPPS CHAR(11) PRIMARY KEY,
	nom VARCHAR(25),
	prenom VARCHAR(25),
	adresse VARCHAR(25),
	numTel INT(9),
	email VARCHAR(100),
	dateInscription DATE,
	dateDebutActivites DATE,
	activite VARCHAR(100),
	codePostal INT(5),
	ville VARCHAR(100),
	lieuAct VARCHAR(100)	
);
CREATE TABLE Visites (
	idVisite INT(6) AUTO_INCREMENT,
	motifVisite TEXT,
	dateVisite DATE,
	note TEXT,
	PRIMARY KEY (idVisite)
);

CREATE TABLE PatientsMedecins (
	numSecu CHAR(13),
	numRPPS CHAR(11),
	PRIMARY KEY (numRPPS,numSecu)
);

CREATE TABLE ListeVisites (
	numSecu CHAR(13),
	idVisite INT(6),
	PRIMARY KEY (idVisite,numSecu)
);

CREATE TABLE Cabinet (
	adresse VARCHAR(25),
	codePostal INT(5),
	dateOuverture DATE
);
CREATE TABLE Ordonnances (
	idOrdonnance INT(6),
	codeCIS INT(8),
	instruction TEXT,
	PRIMARY KEY (idOrdonnance,codeCIS)
);
CREATE TABLE users (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(11),
	`password` CHAR(32)

);
ALTER TABLE Ordonnances ADD CONSTRAINT FK_Ordonnances_Medicaments FOREIGN KEY (codeCIS) REFERENCES CIS_BDPM(codeCIS);
ALTER TABLE Patients ADD CONSTRAINT CK_Email_Patients CHECK (email LIKE '%@%.%');
ALTER TABLE PatientsMedecins ADD CONSTRAINT FK_PatientsMedecins_Patients FOREIGN KEY (numSecu) REFERENCES Patients(numSecu);
ALTER TABLE PatientsMedecins ADD CONSTRAINT FK_PatientsMedecins_Medecins FOREIGN KEY (numRPPS) REFERENCES Medecins(numRPPS);
ALTER TABLE ListeVisites ADD CONSTRAINT FK_ListeVisites_Visites FOREIGN KEY (idVisite) REFERENCES Visites(idVisite);
ALTER TABLE ListeVisites ADD CONSTRAINT FK_ListeVisites_Patients FOREIGN KEY (numSecu) REFERENCES Patients(numSecu);
ALTER TABLE Ordonnances ADD CONSTRAINT FK_Visites_Ordonnances FOREIGN KEY (idOrdonnance) REFERENCES Visites(idVisite);
ALTER TABLE Medecins ADD CONSTRAINT CK_Email_Medecins CHECK (email LIKE '%@%.%');