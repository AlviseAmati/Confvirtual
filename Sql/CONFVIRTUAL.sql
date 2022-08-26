DROP database confvirtual;# droppare solo per test
CREATE DATABASE confvirtual;
#SHOW VARIABLES LIKE "secure_file_priv";
SET SQL_SAFE_UPDATES=0;
SET AUTOCOMMIT=0;
USE confvirtual;


CREATE TABLE IF NOT EXISTS confvirtual.Conferenza(
	IdConferenza INT auto_increment PRIMARY KEY, #non puoi usare una foreign key se non e unique o primary key e anno piu acronimo sono composte e singolaarmente no e non gli piace
    AnnoEdizione int(11) NOT NULL,
    Acronimo varchar(45) NOT NULL,
    Nome varchar(45) DEFAULT NULL,
    SponsorizzazioniTotali int(11) NOT NULL,
    DataSvolgimento date NOT NULL,
    Logo varchar(45) NOT NULL,
    CampoSvolgimento ENUM ('Attiva','Completata') NOT NULL,
     unique (AnnoEdizione,Acronimo) #insieme sono univoci
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Sponsor(
    IdSponsor INT auto_increment, 
	Nome varchar(45) NOT NULL,
	ImmagineLogo varchar(45) NOT NULL,
    PRIMARY KEY (IdSponsor)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Dispone(
	IdConferenza INT NOT NULL,
    IdSponsor int NOT NULL,
    ImportoSponsorizzazione decimal(2,0) NOT NULL,
    PRIMARY KEY (IdConferenza,IdSponsor),
    FOREIGN KEY (IdConferenza) REFERENCES Conferenza(IdConferenza),
    FOREIGN KEY (IdSponsor) REFERENCES Sponsor(IdSponsor)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.ProgrammaGiornaliero(
	IdProgrammaGiornaliero int auto_increment PRIMARY KEY,
    Giorno date NOT NULL,
    IdConferenza INT NOT NULL,
    FOREIGN KEY (IdConferenza) REFERENCES Conferenza(IdConferenza)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Sessione(
    IdSessione INT auto_increment PRIMARY KEY,
    NumeroPresentazioni varchar(45) NOT NULL,
    LinkTeams varchar(45) NOT NULL,
	OraFine time NOT NULL,
    OraInizio time NOT NULL,
    Titolo varchar(100) NOT NULL,
    IdProgrammaGiornaliero int(11),
	FOREIGN KEY (IdProgrammaGiornaliero) REFERENCES ProgrammaGiornaliero(IdProgrammaGiornaliero)
   
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.ListaParoleChiave(
    IdParola int auto_increment PRIMARY KEY,
    ParolaChiave varchar(20) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.AffiliazioneUniversita(
    IdUniversita INT auto_increment  PRIMARY KEY,
    NomeUniversita varchar(45) NOT NULL,
    NomeDipartimento varchar(45) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Utente(
    Username varchar(45) NOT NULL PRIMARY KEY,
    Nome varchar(45) NOT NULL,
    Password varchar(200) NOT NULL,
    DataNascita date NOT NULL,
    Cognome varchar(45) NOT NULL,
    LuogoNascita varchar(45) NOT NULL,
    Tipo ENUM ('Amministratore','Utente','Presenter','Speaker') NOT NULL,
    FotoPresenter varchar(45) ,
    CurriculumPresenter varchar(30),
    CurriculumSpeaker varchar(30),
    FotoSpeaker varchar(45),
    IdUniversita INT,
    FOREIGN KEY (IdUniversita) REFERENCES AffiliazioneUniversita(IdUniversita)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Presentazione(
    IdPresentazione int auto_increment PRIMARY KEY,
    NumSequenze varchar(45) NOT NULL,
    OrarioFine time NOT NULL,
    OrarioInizio time NOT NULL,
    Titolo varchar(45),
    Pdf varchar(45),
    NumeroPagine int,
    StatoSvolgimento ENUM ('Coperto','Non Coperto') DEFAULT 'Non Coperto',
    Abstract varchar(500),
    IdSessione INT,
    Tipo ENUM ('Articolo','Tutorial'),
     Username varchar(45),
	FOREIGN KEY (Username) REFERENCES Utente(Username),
	FOREIGN KEY (IdSessione) REFERENCES Sessione(IdSessione)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.RisorsaAggiuntiva(
	IdRisorsa int auto_increment PRIMARY KEY,
    LinkWeb varchar(45) NOT NULL,
    Descrizione varchar(45) NOT NULL,
    IdPresentazione int NOT NULL,
    Username varchar(45),
	FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione),
    FOREIGN KEY (Username) REFERENCES Utente(Username)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS confvirtual.Possiede(
    IdParola int NOT NULL ,
	IdPresentazione int NOT NULL,
    PRIMARY KEY (IdParola,IdPresentazione),
	FOREIGN KEY (IdParola) REFERENCES ListaParoleChiave(IdParola),
	FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Autore(
     IdPresentazione int,
     Username varchar(45),
	 FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione),
     FOREIGN KEY (Username) REFERENCES Utente(Username)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS confvirtual.Preferenza(
     IdPresentazione int,
     Username varchar(45),
	 FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione),
     FOREIGN KEY (Username) REFERENCES Utente(Username)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS confvirtual.SvolgeSpeaker(
    Username varchar(45) NOT NULL,
    IdPresentazione int NOT NULL,
    PRIMARY KEY (Username,IdPresentazione),
    FOREIGN KEY (Username) REFERENCES Utente(Username),
    FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Valuta(
   Username varchar(45) NOT NULL,
   IdPresentazione INT NOT NULL,
   Voto INT check (voto between 0 and 10),
   Note varchar(50) NOT NULL,
   PRIMARY KEY (Username,IdPresentazione),
   FOREIGN KEY (Username) REFERENCES Utente(Username),
   FOREIGN KEY (IdPresentazione) REFERENCES Presentazione(IdPresentazione)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Realizza(
   Username varchar(45) NOT NULL,
   IdConferenza INT NOT NULL,
   PRIMARY KEY (Username,IdConferenza),
   FOREIGN KEY (Username) REFERENCES Utente(Username),
   FOREIGN KEY (IdConferenza) REFERENCES Conferenza(IdConferenza)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS confvirtual.Messaggio(
   IdMessaggio INT auto_increment NOT NULL,
   IdSessione INT,
   Testo varchar(45) NOT NULL,
   Data datetime NOT NULL,
   Username varchar(45) NOT NULL,
   PRIMARY KEY (IdMessaggio,IdSessione),
   FOREIGN KEY (IdSessione) REFERENCES Sessione(IdSessione),
   FOREIGN KEY (Username) REFERENCES Utente(Username)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS confvirtual.Registra(
   IdConferenza INT  NOT NULL,
   Username varchar(45) NOT NULL,
   PRIMARY KEY (Username,IdConferenza),
   FOREIGN KEY (Username) REFERENCES Utente(Username),
   FOREIGN KEY (IdConferenza) REFERENCES Conferenza(IdConferenza)
)
ENGINE = InnoDB;



# -- INPUT DATA --

#Inserimento Conferenza
INSERT INTO `Conferenza` (IdConferenza, AnnoEdizione, Acronimo, Nome, SponsorizzazioniTotali, DataSvolgimento, Logo, CampoSvolgimento) VALUES
('1','2022','C1','Conferenza1','10','2022/04/08','http','Attiva'),
('2','2022','C2','Conferenza2','15','2022/02/09','http','Completata'),
('3','2022','C3','Conferenza3','12','2022/03/07','http','Completata'),
('4','2022','C4','Conferenza4','12','2022/03/07','http','Completata');

#Inserimento Sponsor
INSERT INTO `Sponsor` (IdSponsor, Nome, ImmagineLogo) VALUES
('1','Bialetti','http'),
('2','Apple','http'),
('3','Samsung','http');

#Inserimento Programma Giornaliero
INSERT INTO `ProgrammaGiornaliero` (IdProgrammaGiornaliero, Giorno, IdConferenza) VALUES
('1','2022/04/08','1'),
('2','2022/03/07','2'),
('3','2022/02/09','3'),
('4','2022/02/09','4');

#Inserimento Sessione
INSERT INTO `Sessione` (IdSessione, NumeroPresentazioni, LinkTeams, OraFine, OraInizio, Titolo, IdProgrammaGiornaliero) VALUES
('1','10','http','12:0:00','9:00:00','Sessione1','1'),
('2','20','http','16:0:00','14:00:00','Sessione2','2'),
('3','30','http','19:0:00','17:00:00','Sessione3','3'),
('4','30','http','19:0:00','17:00:00','Sessione4','4');

#Inserimento Affiliazione Universita
INSERT INTO `AffiliazioneUniversita` (IdUniversita, NomeUniversita, NomeDipartimento) VALUES
('1','Unibo','Scienze'),
('2','Unimore','Giurisprudenza');

#Inserimento Utenti Amministratori
INSERT INTO `Utente` (Username, Nome, Password, DataNascita, Cognome, LuogoNascita, Tipo) VALUES
('Aspi','Andrea','Aspi','1998/03/13','Asperti','Monza','Amministratore'),
('Alvi','Amati','Alvi','1999/03/30','Amati','Rimini','Amministratore'),
('Fabio','Fabio','Fabio','1998/09/01','Cejka','Vienna','Amministratore');

#Inserimento Utenti Generali
INSERT INTO `Utente` (Username, Nome, Password, DataNascita, Cognome, LuogoNascita, Tipo) VALUES
('Utente','Alessandro','123','1995/02/12','Neri','Torino','Utente');

#Inserimento Utenti Speaker
INSERT INTO `Utente` (Username, Nome, Password, DataNascita, Cognome, LuogoNascita, Tipo, CurriculumSpeaker, FotoSpeaker, IdUniversita) VALUES
('Speaker','Marco','123','1997/04/14','Rossi','Roma','Speaker','Buongiorno, Speaker 1','https://Speaker','1');

#Inserimento Utenti Presenter
INSERT INTO `Utente` (Username, Nome, Password, DataNascita, Cognome, LuogoNascita, Tipo, CurriculumPresenter, FotoPresenter, IdUniversita) VALUES
('Presenter','Giulio','123','1996/05/15','Bianchi','Milano','Presenter','Buongiorno, Presenter 1','https://Presenter','2');

#Inserimento Presentazione Articoli
INSERT INTO `Presentazione` (IdPresentazione, NumSequenze, OrarioFine, OrarioInizio, IdSessione,Titolo,Pdf,NumeroPagine,StatoSvolgimento,Tipo,Username) VALUES
('1','3','12:00:00','9:00:00','1','Articolo1','pdf1','22','Coperto','Articolo','Alvi'),
('2','5','16:00:00','14:00:00','2','Articolo2','pdf2','22','Non Coperto','Articolo','Alvi');

#Inserimento Presentazione Tutorial
INSERT INTO `Presentazione` (IdPresentazione, NumSequenze, OrarioFine, OrarioInizio, IdSessione,Titolo,Abstract,Tipo) VALUES
('3','3','12:00:00','9:00:00','3','Tutorial1','tutorial 1 abstract','Tutorial'),
('4','5','16:00:00','14:00:00','4','Tutorial2','tutorial 2 abstract','Tutorial'),
('5','5','16:00:00','14:00:00','4','Tutorial3','tutorial 3 abstract','Tutorial');


#Inserimento Risorsa Aggiuntiva
INSERT INTO `RisorsaAggiuntiva` (IdRisorsa, LinkWeb, Descrizione, IdPresentazione,Username) VALUES
('1','http','risorsa1','3','Alvi'),
('2','http','risorsa2','1','Alvi'),
('3','http','risorsa3','2','Alvi');


#Inserimento Preferenza (Lista Preferenze)
INSERT INTO `Preferenza` (IdPresentazione, Username) VALUES
('1','Alvi');

#Inserimento Messaggio
INSERT INTO `Messaggio` (IdMessaggio,IdSessione,Testo,Data,Username) VALUES
('1','1','Ciao messaggio 1','1999/03/30 12:00:00','Alvi');




# -- STORED PROCEDURE --

#registrazione utente base a piattaforma (quelli speciali li fa l'admin)
DELIMITER $ 
CREATE PROCEDURE `REGISTRA_UTENTE`(IN `UsernameNew` varchar(45), IN `NomeNew` varchar(45),IN `CognomeNew` varchar(45),IN `PasswordNew` varchar(200),IN `DataNascitaNew` date,IN `LuogoNascitaNew` varchar(45) ) 
BEGIN      #alla creazione do default utente base
	START TRANSACTION;
    INSERT INTO Utente (Username,Nome,Cognome,Password,DataNascita,LuogoNascita,Tipo) VALUES(UsernameNew,NomeNew,CognomeNew,md5(PasswordNew),DataNascitaNew,LuogoNascitaNew,'Utente');  #md5 mi crea la password hasciata
    COMMIT;
END $
DELIMITER ;

#(tutti utenti) Autenticazione alla piattaforma
DELIMITER $  
CREATE PROCEDURE `AUTENTICAZIONE_UTENTE`(IN `UsernameNew` varchar(45), IN `PasswordNew` varchar(200)) 
BEGIN 
	START TRANSACTION;
    SELECT Username,Password
    FROM Utente
    WHERE Username like UsernameNew #like confronto stringhe
	AND Password like md5(PasswordNew);
    COMMIT;
END $
DELIMITER ;

#VIEW visualizza conferenze disponibili
	CREATE VIEW VISUALIZZA_CONFERENZE (IdConferenza,AnnoEdizione,Acronimo,Nome,DataSvolgimento,Logo,CampoSvolgimento) AS
    SELECT IdConferenza,AnnoEdizione,Acronimo,Nome,DataSvolgimento,Logo,CampoSvolgimento
    FROM Conferenza
    WHERE CampoSvolgimento='Attiva';

#registrazione ad una conferenza (un utente si puo registrare ad una conferenza)
DELIMITER $  
CREATE PROCEDURE `REGISTRA_CONFERENZA`(IN `IdConferenzaNew` INT, IN `UsernameNew` varchar(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Registra (IdConferenza,Username) VALUES(IdConferenzaNew,UsernameNew);
    COMMIT;
END $
DELIMITER ;

#VIEW visualizza sessioni e presentazioni in ogni sessione
	CREATE VIEW VISUALIZZA_SESSIONI (IdSessione,NumeroPresentazioni,LinkTeams,OraFineSessione,OraInizioSessione,TitoloSessione,IdPresentazione,NumSequenze,OrarioFinePresentazione,OrarioInizioPresentazione,TitoloPresentazione,Pdf,NumeroPagine,StatoSvolgimento,Abstract,Tipo,Username) AS
    SELECT Sessione.IdSessione,NumeroPresentazioni,LinkTeams,OraFine,OraInizio,Sessione.Titolo,IdPresentazione,NumSequenze,OrarioFine,OrarioInizio,Presentazione.Titolo,Pdf,NumeroPagine,StatoSvolgimento,Abstract,Tipo,Username
    FROM Sessione INNER JOIN Presentazione On Presentazione.IdSessione=Sessione.IdSessione;
    
#STORE  visualizza messaggi nella chat di sessione, gli do id della sesisone dove sono e mi ritorna le caht di quella sessione
DELIMITER $
CREATE PROCEDURE `VISUALIZZA_CHAT`(IN `IdSessioneNew` INT) 
BEGIN 
	START TRANSACTION;
   SELECT *
   FROM Messaggio
   WHERE IdSessione=IdSessioneNew
   ORDER BY data;
    COMMIT;
END $
DELIMITER ;  

#inserisci messaggio nella chat
DELIMITER $
CREATE PROCEDURE `INSERIMENTO_CHAT`(IN `IdSessioneNew` INT,IN `TestoNew` varchar(45),IN `DataNew` datetime,IN `UsernameNew` varchar(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Messaggio (IdSessione,Testo,Data,Username) VALUES(IdSessioneNew,TestoNew,DataNew,UsernameNew);
    COMMIT;
END $
DELIMITER ;  

#inserimento  lista presentazioni favorite
DELIMITER $
CREATE PROCEDURE `INSERISCI_PRESENTAZIONE_FAVORITA`(IN `IdPresentazioneNew` INT, IN `UsernameNew` varchar(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Preferenza (IdPresentazione,Username) VALUES(IdPresentazioneNew,UsernameNew);
    COMMIT;
END $
DELIMITER ;  

#STORE visualizza lista presentazioni favorite dato il tuo username attuale
DELIMITER $
CREATE PROCEDURE `VISUALIZZA_PRESENTAZIONE_FAVORITA`(IN `UsernameNew` varchar(45) )
BEGIN 
	START TRANSACTION;
   SELECT Titolo
    FROM Presentazione
    WHERE IdPresentazione IN (SELECT IdPresentazione FROM Preferenza WHERE Username=UsernameNew);#query per visualizzare solo la lista preferiti del tuo username serve annidata per avitare conflitto user
    COMMIT;
END $
DELIMITER ; 

DELIMITER $
CREATE  PROCEDURE `INSERISCI_AffiliazioneUni`(IN `NomeUniversitanew` varchar(45), IN `NomeDipartimetnonew` varchar(45))
BEGIN 
	START TRANSACTION;
    INSERT INTO AffiliazioneUniversita (NomeUniversita,NomeDipartimento) VALUES(NomeUniversitanew,NomeDipartimentonew);
    COMMIT;
END $
DELIMITER ;

#solo SPEAKER
DELIMITER $
CREATE  PROCEDURE `MODIFICA_AffiliazioneUni`(IN `IdUniversitanew` INT, IN `NomeUniversitanew` varchar(45), IN `NomeDipartimetnonew` varchar(45))
BEGIN 
	START TRANSACTION;
    update AffiliazioneUniversita
    set  NomeUniversita=NomeUniversitanew, NomeDipartimento=NomeDipartimentonew
    Where IdUniversita=IdUniversitanew;
    COMMIT;
END $
DELIMITER ;

#solo CV SPEAKER
DELIMITER $
CREATE  PROCEDURE `INSERISCI_CV_SPEAKER`(IN `Usernamenew` varchar(45), IN `CurriculumSpeakernew` varchar(30))
BEGIN 
	START TRANSACTION;
    update Utente
    set CurriculumSpeaker=CurriculumSpeakernew
    WHERE Username=Usernamenew;
    COMMIT;
END $
DELIMITER ;

#solo CV PRESENTER
DELIMITER $
CREATE  PROCEDURE `INSERISCI_CV_SPEAKER`(IN `Usernamenew` varchar(45), IN `CurriculumPresenternew` varchar(30))
BEGIN 
	START TRANSACTION;
    update Utente
    set CurriculumPresenter=CurriculumPresenternew
    WHERE Username=Usernamenew;
    COMMIT;
END $
DELIMITER ;

#inserisci foto PRESENTER
DELIMITER $
CREATE  PROCEDURE `INSERISCI_Foto_Presenter`(IN `Usernamenew` varchar(45), IN `FotoPresenternew` varchar(45))
BEGIN 
	START TRANSACTION;
    update Utente
    set FotoPresenter=FotoPresenternew
    WHERE Username=Usernamenew;
    COMMIT;
END $
DELIMITER ;

#inserisci foto PRESENTER
DELIMITER $
CREATE  PROCEDURE `INSERISCI_Foto_Speaker`(IN `Usernamenew` varchar(45), IN `FotoSpeakernew` varchar(45))
BEGIN 
	START TRANSACTION;
    update Utente
    set FotoSpeaker=FotoSpeakernew
    WHERE Username=Usernamenew;
    COMMIT;
END $
DELIMITER ;

DELIMITER $
CREATE  PROCEDURE `INSERISCI_RisorsaAggiuntiva`(IN `Usernamenew` varchar(45), IN `Titolonew` varchar(45), IN `Abstractnew` varchar(500))
BEGIN 
	START TRANSACTION;
    update Presentqazione
    set Titolo=Titolonew, Abstract=Abstractnew
    WHERE Username=Usernamenew;
    COMMIT;
END $
DELIMITER ;







#da qui in poi sono tutte operazioni degli ADMIN

 #solo AMMINISTRATORE  crea una conferenza
DELIMITER $  
CREATE PROCEDURE `CREA_CONFERENZA`(IN `AnnoEdizioneNew` INT(11),IN `AcronimoNew` varchar(45),  IN `NomeNew` varchar(45), IN `DataSvolgimentoNew` date,IN `LogoNew` varchar(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Conferenza (AnnoEdizione,Acronimo, Nome,SponsorizzazioniTotali, DataSvolgimento,Logo,CampoSvolgimento) VALUES(AnnoEdizioneNew,AcronimoNew, NomeNew,'0', DataSvolgimentoNew,LogoNew,'Attiva');
    COMMIT;
END $
DELIMITER ;

 #solo AMMINISTRATORE crea una sessione della conferenza
DELIMITER $  
CREATE PROCEDURE `CREA_SESSIONE`(IN `NumeroPresentazioniNew` varchar(45),IN `LinkTeamsNew` varchar(45),  IN `OraFineNew` time, IN `OraInizioNew` time,IN `TitoloNew` varchar(100)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Sessione (NumeroPresentazioni,LinkTeams,OraFine,OraInizio,Titolo) VALUES(NumeroPresentazioniNew,LinkTeamsNew,OraFineNew,OraInizioNew,TitoloNew);
    COMMIT;
END $
DELIMITER ;

 #solo AMMINISTRATORE inserire presentazioni in una sessione, la ssessione la prende in base alla sessione in cui e loggato l amministratore    (gestire il fatto che in base a campo tipo hai dei campi da lasciare vuoti)
DELIMITER $  
CREATE PROCEDURE `INSERISCI_PRESENTAZIONE`(IN `NumSequenzeNew` varchar(45),IN `OrarioFineNew` time,IN `OrarioInizioNew` time, IN `TitoloNew` varchar(45),IN `PdfNew` varchar(45),IN `NumeroPagineNew` int,IN `AbstractNew` varchar (500),IN `IdSessioneNew` int,IN `TipoNew`ENUM ('Articolo','Tutorial')) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Presentazione (NumSequenze,OrarioFine,OrarioInizio,Titolo,Pdf,NumeroPagine,Abstract,IdSessione,Tipo) VALUES(NumSequenzeNew,OrarioFineNew,OrarioInizioNew,TitoloNew,PdfNew,NumeroPagineNew,AbstractNew,IdSessioneNew,TipoNew);
    COMMIT;
END $
DELIMITER ;

 #solo AMMINISTRATORE Associare uno Speaker alla presentazione di un tutorial
DELIMITER $  
CREATE PROCEDURE `ASSOCIA_SPEAKER`(IN `UsernameNew` varchar(45),IN `IdPresentazioneNew` INT) 
BEGIN 
	START TRANSACTION;
     update Presentazione 
    SET Username=UsernameNew  
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END $
DELIMITER ;

 #solo AMMINISTRATORE Associare uno Presenter alla presentazione di un articolo     
DELIMITER $  
CREATE PROCEDURE `ASSOCIA_PRESENTER`(IN `UsernameNew` varchar(45),IN `IdPresentazioneNew` INT) 
BEGIN 
	START TRANSACTION;
    update Presentazione 
    SET Username=UsernameNew  
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END $
DELIMITER ;

#solo AMMINISTRATORE   Inserimento	delle	valutazioni	sulle	presentazioni
DELIMITER $  
CREATE PROCEDURE `INSERISCI_VALUTAZIONE`(IN `UsernameNew` VARCHAR(45), IN `IdPresentazioneNew` INT, IN `VotoNew` INT, IN `NoteNew` VARCHAR(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Valuta (Username, IdPresentazione, Voto, Note) VALUES(UsernameNew, IdPresentazioneNew, VotoNew, NoteNew);
    COMMIT;
END $
DELIMITER ;

DELIMITER $ 
CREATE PROCEDURE `VISUALIZZA_VALUTAZIONE`(IN `IdPresentazioneNew` INT) 
BEGIN 
	START TRANSACTION;
    SELECT * #visualizza
    FROM Valuta
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END $
DELIMITER ;

 #inserisci sponsor SOLO AMMINISTRATORE
DELIMITER $ 
CREATE PROCEDURE `INSERISCI_SPONSOR`(IN `NomeNew` varchar(45), IN `ImmagineLogoNew` varchar(45)) 
BEGIN 
	START TRANSACTION;
    INSERT INTO Sponsor (Nome,ImmagineLogo) VALUES(NomeNew,ImmagineLogoNew);
    COMMIT;
END $
DELIMITER ;










# TRIGGER stato svolgimento
# FINITO FUNZIONA
DELIMITER $ 
CREATE TRIGGER stato_svolgimento BEFORE UPDATE ON Presentazione
FOR EACH ROW 
SET NEW.StatoSvolgimento = IF( NEW.Username IS NOT NULL, "Coperto", "Non Coperto");

DELIMITER ;

##############

#TRIGGER numero presentazioni (quando aggiungi nuova presentazione a una sessione della conferenza)(incrementare camopo ogni volta che aggiungi una riga in sessione)
#FUNZIONA
DELIMITER $ 
CREATE TRIGGER aggiornamento_numero_presentazioni_DEFINITIVE AFTER INSERT ON Presentazione
FOR EACH ROW 
UPDATE sessione SET NumeroPresentazioni=NumeroPresentazioni+1 WHERE IdSessione=NEW.IdSessione;
DELIMITER ;

#############

SET GLOBAL event_scheduler=ON;
#con event modifica campo Svolgimento(in conferenza) lo setta a completato quando data ricorrente eccede di 1 gg da ultima data svolgimento di una conf
#DA RIGUARDARE
DELIMITER $ 
CREATE EVENT svolgimento_conferenza_completata ON SCHEDULE EVERY 1 MINUTE
DO
    UPDATE Conferenza SET CampoSvolgimento="Completata"
    WHERE DataSvolgimento<CURRENT_TIMESTAMP();
DELIMITER ;
