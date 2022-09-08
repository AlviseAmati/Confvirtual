-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 08, 2022 alle 20:39
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confvirtual`
--

DELIMITER $$
--
-- Procedure
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ASSOCIA_PRESENTER` (IN `UsernameNew` VARCHAR(45), IN `IdPresentazioneNew` INT)   BEGIN 
	START TRANSACTION;
    update Presentazione 
    SET Username=UsernameNew  
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ASSOCIA_SPEAKER` (IN `UsernameNew` VARCHAR(45), IN `IdPresentazioneNew` INT)   BEGIN 
	START TRANSACTION;
     update Presentazione 
    SET Username=UsernameNew  
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AUTENTICAZIONE_UTENTE` (IN `UsernameNew` VARCHAR(45), IN `PasswordNew` VARCHAR(200))   BEGIN 
	START TRANSACTION;
    SELECT Username,Password
    FROM Utente
    WHERE Username like UsernameNew #like confronto stringhe
	AND Password like md5(PasswordNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREA_CONFERENZA` (IN `AnnoEdizioneNew` INT(11), IN `AcronimoNew` VARCHAR(45), IN `NomeNew` VARCHAR(45), IN `DataSvolgimentoNew` DATE, IN `LogoNew` VARCHAR(45), IN `UsernameAmministratoreNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Conferenza (AnnoEdizione,Acronimo, Nome,SponsorizzazioniTotali, DataSvolgimento,Logo,CampoSvolgimento,UsernameAmministratore) VALUES(AnnoEdizioneNew,AcronimoNew, NomeNew,'0', DataSvolgimentoNew,LogoNew,'Attiva',UsernameAmministratoreNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREA_SESSIONE` (IN `NumeroPresentazioniNew` VARCHAR(45), IN `LinkTeamsNew` VARCHAR(45), IN `OraFineNew` TIME, IN `OraInizioNew` TIME, IN `TitoloNew` VARCHAR(100))   BEGIN 
	START TRANSACTION;
    INSERT INTO Sessione (NumeroPresentazioni,LinkTeams,OraFine,OraInizio,Titolo) VALUES(NumeroPresentazioniNew,LinkTeamsNew,OraFineNew,OraInizioNew,TitoloNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERIMENTO_CHAT` (IN `IdSessioneNew` INT, IN `TestoNew` VARCHAR(45), IN `DataNew` DATETIME, IN `UsernameNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Messaggio (IdSessione,Testo,Data,Username) VALUES(IdSessioneNew,TestoNew,DataNew,UsernameNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_AUTORE` (IN `NomeNew` VARCHAR(45), IN `CognomeNew` VARCHAR(45), IN `IdPresentazioneNew` INT)   BEGIN 
	START TRANSACTION;
    INSERT INTO autore (Nome,Cognome,IdPresentazione) VALUES(NomeNew,CognomeNew,IdPresentazioneNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_CV_PRESENTER` (IN `Usernamenew` VARCHAR(45), IN `CurriculumPresenternew` VARCHAR(30))   BEGIN 
	START TRANSACTION;
    update Utente
    set CurriculumPresenter=CurriculumPresenternew
    WHERE Username=Usernamenew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_CV_SPEAKER` (IN `Usernamenew` VARCHAR(45), IN `CurriculumSpeakernew` VARCHAR(30))   BEGIN 
	START TRANSACTION;
    update Utente
    set CurriculumSpeaker=CurriculumSpeakernew
    WHERE Username=Usernamenew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_Foto_Presenter` (IN `Usernamenew` VARCHAR(45), IN `FotoPresenterNew` VARCHAR(45))   BEGIN
	START TRANSACTION;
    update Utente
    set FotoPresenter=FotoPresenterNew
    WHERE Username=Usernamenew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_Foto_Speaker` (IN `Usernamenew` VARCHAR(45), IN `FotoSpeakernew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    update Utente
    set FotoSpeaker=FotoSpeakernew
    WHERE Username=Usernamenew;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_PRESENTAZIONE` (IN `NumSequenzeNew` VARCHAR(45), IN `OrarioFineNew` TIME, IN `OrarioInizioNew` TIME, IN `TitoloNew` VARCHAR(45), IN `PdfNew` VARCHAR(45), IN `NumeroPagineNew` INT, IN `AbstractNew` VARCHAR(500), IN `IdSessioneNew` INT, IN `TipoNew` ENUM('Articolo','Tutorial'))   BEGIN 
	START TRANSACTION;
    INSERT INTO Presentazione (NumSequenze,OrarioFine,OrarioInizio,Titolo,Pdf,NumeroPagine,Abstract,IdSessione,Tipo) VALUES(NumSequenzeNew,OrarioFineNew,OrarioInizioNew,TitoloNew,PdfNew,NumeroPagineNew,AbstractNew,IdSessioneNew,TipoNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_PRESENTAZIONE_FAVORITA` (IN `IdPresentazioneNew` INT, IN `UsernameNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Preferenza (IdPresentazione,Username) VALUES(IdPresentazioneNew,UsernameNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_SPONSOR` (IN `NomeNew` VARCHAR(45), IN `ImmagineLogoNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Sponsor (Nome,ImmagineLogo) VALUES(NomeNew,ImmagineLogoNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_SPONSORIZAZZIONE` (IN `IdConferenzaNew` INT, IN `IdSponsorNew` INT, IN `ImportoSponsorizzazioneNew` INT)   BEGIN 
	START TRANSACTION;
    INSERT INTO dispone (IdConferenza,IdSponsor,ImportoSponsorizzazione) VALUES(IdConferenzaNew,IdSponsorNew,ImportoSponsorizzazioneNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERISCI_VALUTAZIONE` (IN `UsernameNew` VARCHAR(45), IN `IdPresentazioneNew` INT, IN `VotoNew` INT, IN `NoteNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Valuta (Username, IdPresentazione, Voto, Note) VALUES(UsernameNew, IdPresentazioneNew, VotoNew, NoteNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRA_CONFERENZA` (IN `IdConferenzaNew` INT, IN `UsernameNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
    INSERT INTO Registra (IdConferenza,Username) VALUES(IdConferenzaNew,UsernameNew);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRA_UTENTE` (IN `UsernameNew` VARCHAR(45), IN `NomeNew` VARCHAR(45), IN `CognomeNew` VARCHAR(45), IN `PasswordNew` VARCHAR(200), IN `DataNascitaNew` DATE, IN `LuogoNascitaNew` VARCHAR(45))   BEGIN      #alla creazione do default utente base
	START TRANSACTION;
    INSERT INTO Utente (Username,Nome,Cognome,Password,DataNascita,LuogoNascita,Tipo) VALUES(UsernameNew,NomeNew,CognomeNew,md5(PasswordNew),DataNascitaNew,LuogoNascitaNew,'Utente');  #md5 mi crea la password hasciata
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VISUALIZZA_CHAT` (IN `IdSessioneNew` INT)   BEGIN 
	START TRANSACTION;
   SELECT *
   FROM Messaggio
   WHERE IdSessione=IdSessioneNew
   ORDER BY data;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VISUALIZZA_PRESENTAZIONE_FAVORITA` (IN `UsernameNew` VARCHAR(45))   BEGIN 
	START TRANSACTION;
   SELECT Titolo
    FROM Presentazione
    WHERE IdPresentazione IN (SELECT IdPresentazione FROM Preferenza WHERE Username=UsernameNew);#query per visualizzare solo la lista preferiti del tuo username serve annidata per avitare conflitto user
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VISUALIZZA_VALUTAZIONE` (IN `IdPresentazioneNew` INT)   BEGIN 
	START TRANSACTION;
    SELECT * #visualizza
    FROM Valuta
    WHERE IdPresentazione=IdPresentazioneNew;
    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `affiliazioneuniversita`
--

CREATE TABLE `affiliazioneuniversita` (
  `IdUniversita` int(11) NOT NULL,
  `NomeUniversita` varchar(45) NOT NULL,
  `NomeDipartimento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `affiliazioneuniversita`
--

INSERT INTO `affiliazioneuniversita` (`IdUniversita`, `NomeUniversita`, `NomeDipartimento`) VALUES
(1, 'Unibo', 'Scienze'),
(2, 'Unimore', 'Giurisprudenza');

-- --------------------------------------------------------

--
-- Struttura della tabella `autore`
--

CREATE TABLE `autore` (
  `IdAutore` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Cognome` varchar(45) NOT NULL,
  `IdPresentazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `autore`
--

INSERT INTO `autore` (`IdAutore`, `Nome`, `Cognome`, `IdPresentazione`) VALUES
(1, 'Andrea', 'Pesaresi', 1),
(2, 'Andrea', 'Pesaresi', 1),
(3, 'Andrea', 'Pesaresi', 1),
(4, 'Andrea', 'Giovanni', 1),
(5, 'Andrea', 'Pesaresi', 2),
(6, 'Andrea', 'Amati', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `conferenza`
--

CREATE TABLE `conferenza` (
  `IdConferenza` int(11) NOT NULL,
  `AnnoEdizione` int(11) NOT NULL,
  `Acronimo` varchar(45) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `SponsorizzazioniTotali` int(11) NOT NULL,
  `DataSvolgimento` date NOT NULL,
  `Logo` varchar(45) NOT NULL,
  `CampoSvolgimento` enum('Attiva','Completata') NOT NULL,
  `UsernameAmministratore` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `conferenza`
--

INSERT INTO `conferenza` (`IdConferenza`, `AnnoEdizione`, `Acronimo`, `Nome`, `SponsorizzazioniTotali`, `DataSvolgimento`, `Logo`, `CampoSvolgimento`, `UsernameAmministratore`) VALUES
(1, 2022, 'C1', 'Conferenza1', 10, '2023-03-10', 'http', 'Attiva', ''),
(2, 2022, 'C2', 'Conferenza2', 15, '2022-02-09', 'http', 'Completata', ''),
(3, 2022, 'C3', 'Conferenza3', 12, '2022-03-07', 'http', 'Completata', ''),
(4, 2022, 'C4', 'Conferenza4', 12, '2022-03-07', 'http', 'Completata', ''),
(11, 1999, 'C5', 'Conferenza5', 0, '2022-08-12', 'http:...', 'Attiva', ''),
(12, 1999, 'C1', 'Conferenza6', 0, '2022-09-02', 'http:...', 'Attiva', ''),
(18, 1999, 'C7', 'Conferenza7', 0, '2022-09-03', 'http:...', 'Attiva', 'Alvi');

-- --------------------------------------------------------

--
-- Struttura della tabella `dispone`
--

CREATE TABLE `dispone` (
  `IdConferenza` int(11) NOT NULL,
  `IdSponsor` int(11) NOT NULL,
  `ImportoSponsorizzazione` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dispone`
--

INSERT INTO `dispone` (`IdConferenza`, `IdSponsor`, `ImportoSponsorizzazione`) VALUES
(18, 1, '99');

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggio`
--

CREATE TABLE `messaggio` (
  `IdMessaggio` int(11) NOT NULL,
  `IdSessione` int(11) NOT NULL,
  `Testo` varchar(45) NOT NULL,
  `Data` datetime NOT NULL,
  `Username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messaggio`
--

INSERT INTO `messaggio` (`IdMessaggio`, `IdSessione`, `Testo`, `Data`, `Username`) VALUES
(1, 1, 'Ciao messaggio 1', '1999-03-30 12:00:00', 'Alvi'),
(2, 1, 'il mio messaggioxz', '2022-08-14 09:30:07', 'Presenter'),
(3, 4, 'il mio messaggio', '2022-08-31 05:31:36', 'Speaker'),
(4, 1, 'ciao', '2022-09-01 11:09:19', 'Speaker'),
(5, 27, 'prova', '2022-09-08 04:46:29', 'Presenter');

-- --------------------------------------------------------

--
-- Struttura della tabella `parolachiave`
--

CREATE TABLE `parolachiave` (
  `IdParola` int(11) NOT NULL,
  `ParolaChiave` varchar(20) NOT NULL,
  `IdPresentazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `preferenza`
--

CREATE TABLE `preferenza` (
  `IdPresentazione` int(11) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `preferenza`
--

INSERT INTO `preferenza` (`IdPresentazione`, `Username`) VALUES
(1, 'Alvi'),
(1, 'Presenter'),
(1, 'Presenter'),
(1, 'Presenter'),
(1, 'Presenter'),
(13, 'Speaker'),
(1, 'Speaker'),
(7, 'Speaker'),
(4, 'Speaker'),
(4, 'Alvi'),
(4, 'Speaker'),
(4, 'Speaker'),
(4, 'Speaker'),
(3, 'Speaker'),
(3, 'Speaker'),
(3, 'Speaker');

-- --------------------------------------------------------

--
-- Struttura della tabella `presentazione`
--

CREATE TABLE `presentazione` (
  `IdPresentazione` int(11) NOT NULL,
  `NumSequenze` varchar(45) NOT NULL,
  `OrarioFine` time NOT NULL,
  `OrarioInizio` time NOT NULL,
  `Titolo` varchar(45) DEFAULT NULL,
  `Pdf` varchar(45) DEFAULT NULL,
  `NumeroPagine` int(11) DEFAULT NULL,
  `StatoSvolgimento` enum('Coperto','Non Coperto') DEFAULT 'Non Coperto',
  `Abstract` varchar(500) DEFAULT NULL,
  `IdSessione` int(11) DEFAULT NULL,
  `Tipo` enum('Articolo','Tutorial') DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `presentazione`
--

INSERT INTO `presentazione` (`IdPresentazione`, `NumSequenze`, `OrarioFine`, `OrarioInizio`, `Titolo`, `Pdf`, `NumeroPagine`, `StatoSvolgimento`, `Abstract`, `IdSessione`, `Tipo`, `Username`) VALUES
(1, '3', '12:00:00', '09:00:00', 'Articolo1', 'pdf1', 22, 'Coperto', NULL, 1, 'Articolo', 'Presenter'),
(2, '5', '16:00:00', '14:00:00', 'Articolo2', 'pdf2', 22, 'Coperto', NULL, 2, 'Articolo', 'Presenter'),
(3, '3', '12:00:00', '09:00:00', 'Tutorial1', NULL, NULL, 'Coperto', 'tutorial 1 abstract', 3, 'Tutorial', 'Speaker'),
(4, '5', '16:00:00', '14:00:00', 'Tutorial2', NULL, NULL, NULL, 'tutorial 2 abstract', 4, 'Tutorial', 'Speaker'),
(7, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Coperto', '...', 1, 'Articolo', 'Presenter'),
(8, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Coperto', '...', 1, 'Articolo', 'Presenter'),
(10, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Non Coperto', '...', 1, 'Articolo', NULL),
(11, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Non Coperto', '...', 1, 'Articolo', NULL),
(12, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Non Coperto', '...', 2, 'Tutorial', NULL),
(13, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Non Coperto', '...', 1, 'Tutorial', NULL),
(14, '5', '10:00:00', '08:00:00', 'Art/Tout 1', 'pdf1', 23, 'Non Coperto', '...', 25, '', NULL),
(15, '5', '10:00:00', '08:00:00', 'Tutorial prova', 'pdf1', 23, 'Non Coperto', '...', 26, 'Tutorial', NULL),
(16, '5', '10:00:00', '08:00:00', 'Art prova', 'pdf1', 23, 'Non Coperto', '...', 26, 'Articolo', NULL);

--
-- Trigger `presentazione`
--
DELIMITER $$
CREATE TRIGGER `aggiornamento_numero_presentazioni_DEFINITIVE` AFTER INSERT ON `presentazione` FOR EACH ROW UPDATE sessione SET NumeroPresentazioni=NumeroPresentazioni+1 WHERE IdSessione=NEW.IdSessione
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stato_svolgimento` BEFORE UPDATE ON `presentazione` FOR EACH ROW SET NEW.StatoSvolgimento = IF( NEW.Username IS NOT NULL, "Coperto", "Non Coperto")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `programmagiornaliero`
--

CREATE TABLE `programmagiornaliero` (
  `IdProgrammaGiornaliero` int(11) NOT NULL,
  `Giorno` date NOT NULL,
  `IdConferenza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `programmagiornaliero`
--

INSERT INTO `programmagiornaliero` (`IdProgrammaGiornaliero`, `Giorno`, `IdConferenza`) VALUES
(1, '2022-04-08', 1),
(2, '2022-03-07', 2),
(3, '2022-02-09', 3),
(4, '2022-02-09', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `registra`
--

CREATE TABLE `registra` (
  `IdConferenza` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `registra`
--

INSERT INTO `registra` (`IdConferenza`, `Username`) VALUES
(1, 'Presenter'),
(11, 'Presenter');

-- --------------------------------------------------------

--
-- Struttura della tabella `risorsaaggiuntiva`
--

CREATE TABLE `risorsaaggiuntiva` (
  `IdRisorsa` int(11) NOT NULL,
  `LinkWeb` varchar(45) NOT NULL,
  `Descrizione` varchar(45) NOT NULL,
  `IdPresentazione` int(11) NOT NULL,
  `Username` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `risorsaaggiuntiva`
--

INSERT INTO `risorsaaggiuntiva` (`IdRisorsa`, `LinkWeb`, `Descrizione`, `IdPresentazione`, `Username`) VALUES
(1, 'http', 'risorsa1', 3, 'Alvi'),
(2, 'http', 'risorsa2', 1, 'Alvi'),
(3, 'http', 'risorsa3', 2, 'Alvi'),
(97, 'http', 'risorsa..', 13, 'Speaker'),
(154, 'http', 'risorsa 8', 13, 'Speaker');

-- --------------------------------------------------------

--
-- Struttura della tabella `sessione`
--

CREATE TABLE `sessione` (
  `IdSessione` int(11) NOT NULL,
  `NumeroPresentazioni` varchar(45) NOT NULL,
  `LinkTeams` varchar(45) NOT NULL,
  `OraFine` time NOT NULL,
  `OraInizio` time NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `IdProgrammaGiornaliero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sessione`
--

INSERT INTO `sessione` (`IdSessione`, `NumeroPresentazioni`, `LinkTeams`, `OraFine`, `OraInizio`, `Titolo`, `IdProgrammaGiornaliero`) VALUES
(1, '13', 'http', '12:00:00', '09:00:00', 'Sessione1', 1),
(2, '22', 'http', '16:00:00', '14:00:00', 'Sessione2', 2),
(3, '32', 'http', '19:00:00', '17:00:00', 'Sessione3', 3),
(4, '32', 'http', '19:00:00', '17:00:00', 'Sessione4', 4),
(25, '11', 'https://', '10:00:00', '08:00:00', 'Sessione5', NULL),
(26, '12', 'https://', '12:04:00', '10:00:00', 'Sessione6', NULL),
(27, '10', 'https://', '19:01:00', '08:00:00', 'Sessione7', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `sponsor`
--

CREATE TABLE `sponsor` (
  `IdSponsor` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `ImmagineLogo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sponsor`
--

INSERT INTO `sponsor` (`IdSponsor`, `Nome`, `ImmagineLogo`) VALUES
(1, 'Bialetti', 'http'),
(2, 'Apple', 'http'),
(7, 'Alvi2', 'http');

-- --------------------------------------------------------

--
-- Struttura della tabella `svolgespeaker`
--

CREATE TABLE `svolgespeaker` (
  `Username` varchar(45) NOT NULL,
  `IdPresentazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Username` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `DataNascita` date NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `LuogoNascita` varchar(45) NOT NULL,
  `Tipo` enum('Amministratore','Utente','Presenter','Speaker') NOT NULL,
  `FotoPresenter` varchar(45) DEFAULT NULL,
  `CurriculumPresenter` varchar(30) DEFAULT NULL,
  `CurriculumSpeaker` varchar(30) DEFAULT NULL,
  `FotoSpeaker` varchar(45) DEFAULT NULL,
  `IdUniversita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Username`, `Nome`, `Password`, `DataNascita`, `Cognome`, `LuogoNascita`, `Tipo`, `FotoPresenter`, `CurriculumPresenter`, `CurriculumSpeaker`, `FotoSpeaker`, `IdUniversita`) VALUES
('', '', 'd41d8cd98f00b204e9800998ecf8427e', '1970-01-01', '', '', 'Utente', NULL, '0', NULL, NULL, NULL),
('Alvi', 'Amati', 'Alvi', '1999-03-30', 'Amati', 'Rimini', 'Amministratore', NULL, '0', NULL, NULL, NULL),
('Aspi', 'Andrea', 'Aspi', '1998-03-13', 'Asperti', 'Monza', 'Amministratore', NULL, '0', NULL, NULL, NULL),
('Cejka', 'Alvi', '5aa9114de7d21806f68693601b5842d9', '2001-03-03', 'Alvi', 'Rimini', 'Utente', NULL, '0', NULL, NULL, NULL),
('dasdas', 'sdad', 'a8f5f167f44f4964e6c998dee827110c', '1970-01-01', 'sadasd', '', 'Utente', NULL, '0', NULL, NULL, NULL),
('Fabio', 'Fabio', 'Fabio', '1998-09-01', 'Cejka', 'Vienna', 'Amministratore', NULL, '0', NULL, NULL, NULL),
('FabioMT', 'matthias', '202cb962ac59075b964b07152d234b70', '2022-09-09', 'cejka', 'Austria', 'Utente', NULL, NULL, NULL, NULL, NULL),
('ggggg', 'aaaa', '5aa9114de7d21806f68693601b5842d9', '2021-02-01', 'ddddd', 'maria', 'Utente', NULL, '0', NULL, NULL, NULL),
('iphone', 'aldo', '202cb962ac59075b964b07152d234b70', '2022-02-02', 'aldii', 'rimini', 'Utente', NULL, '0', NULL, NULL, NULL),
('jaime', 'lannister', '202cb962ac59075b964b07152d234b70', '2022-08-09', 'lannister', 'Rimii', 'Utente', NULL, '0', NULL, NULL, NULL),
('Presenter', 'Giulio', '123', '1996-05-15', 'Bianchi', 'Milano', 'Presenter', 'http', 'prova', 'prova', 'https prese', 2),
('prova', 'prova', '202cb962ac59075b964b07152d234b70', '2020-02-02', 'prova', 'Rimini', 'Utente', NULL, '0', NULL, NULL, NULL),
('prova1', 'pinko', '202cb962ac59075b964b07152d234b70', '2020-03-02', 'pallino ', 'rimini', 'Utente', NULL, '0', NULL, NULL, NULL),
('prova2', 'prova2', '202cb962ac59075b964b07152d234b70', '2020-02-01', 'prova2', 'roma', 'Utente', NULL, '0', NULL, NULL, NULL),
('provaform', 'a', '202cb962ac59075b964b07152d234b70', '2001-03-02', 'a', 'Rimini', 'Utente', NULL, '0', NULL, NULL, NULL),
('sdad', 'asdasd', '4d18db80e353e526ad6d42a62aaa29be', '1970-01-01', 'asdas', 'asda', 'Utente', NULL, '0', NULL, NULL, NULL),
('Speaker', 'Marco', '123', '1997-04-14', 'Rossi', 'Roma', 'Speaker', NULL, '0', 'cv', 'http foto prova', 1),
('Utente', 'Alessandro', '123', '1995-02-12', 'Neri', 'Torino', 'Utente', NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `valuta`
--

CREATE TABLE `valuta` (
  `Username` varchar(45) NOT NULL,
  `IdPresentazione` int(11) NOT NULL,
  `Voto` int(11) DEFAULT NULL CHECK (`Voto` between 0 and 10),
  `Note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `valuta`
--

INSERT INTO `valuta` (`Username`, `IdPresentazione`, `Voto`, `Note`) VALUES
('Alvi', 1, 1, 'nota'),
('Alvi', 2, 2, 'nota'),
('Alvi', 3, 3, 'nota');

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `visualizza_conferenze`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `visualizza_conferenze` (
`IdConferenza` int(11)
,`AnnoEdizione` int(11)
,`Acronimo` varchar(45)
,`Nome` varchar(45)
,`DataSvolgimento` date
,`Logo` varchar(45)
,`CampoSvolgimento` enum('Attiva','Completata')
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `visualizza_sessioni`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `visualizza_sessioni` (
`IdSessione` int(11)
,`NumeroPresentazioni` varchar(45)
,`LinkTeams` varchar(45)
,`OraFineSessione` time
,`OraInizioSessione` time
,`TitoloSessione` varchar(100)
,`IdPresentazione` int(11)
,`NumSequenze` varchar(45)
,`OrarioFinePresentazione` time
,`OrarioInizioPresentazione` time
,`TitoloPresentazione` varchar(45)
,`Pdf` varchar(45)
,`NumeroPagine` int(11)
,`StatoSvolgimento` enum('Coperto','Non Coperto')
,`Abstract` varchar(500)
,`Tipo` enum('Articolo','Tutorial')
,`Username` varchar(45)
);

-- --------------------------------------------------------

--
-- Struttura per vista `visualizza_conferenze`
--
DROP TABLE IF EXISTS `visualizza_conferenze`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visualizza_conferenze`  AS SELECT `conferenza`.`IdConferenza` AS `IdConferenza`, `conferenza`.`AnnoEdizione` AS `AnnoEdizione`, `conferenza`.`Acronimo` AS `Acronimo`, `conferenza`.`Nome` AS `Nome`, `conferenza`.`DataSvolgimento` AS `DataSvolgimento`, `conferenza`.`Logo` AS `Logo`, `conferenza`.`CampoSvolgimento` AS `CampoSvolgimento` FROM `conferenza` WHERE `conferenza`.`CampoSvolgimento` = 'Attiva\'Attiva''Attiva\'Attiva'  ;

-- --------------------------------------------------------

--
-- Struttura per vista `visualizza_sessioni`
--
DROP TABLE IF EXISTS `visualizza_sessioni`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visualizza_sessioni`  AS SELECT `sessione`.`IdSessione` AS `IdSessione`, `sessione`.`NumeroPresentazioni` AS `NumeroPresentazioni`, `sessione`.`LinkTeams` AS `LinkTeams`, `sessione`.`OraFine` AS `OraFineSessione`, `sessione`.`OraInizio` AS `OraInizioSessione`, `sessione`.`Titolo` AS `TitoloSessione`, `presentazione`.`IdPresentazione` AS `IdPresentazione`, `presentazione`.`NumSequenze` AS `NumSequenze`, `presentazione`.`OrarioFine` AS `OrarioFinePresentazione`, `presentazione`.`OrarioInizio` AS `OrarioInizioPresentazione`, `presentazione`.`Titolo` AS `TitoloPresentazione`, `presentazione`.`Pdf` AS `Pdf`, `presentazione`.`NumeroPagine` AS `NumeroPagine`, `presentazione`.`StatoSvolgimento` AS `StatoSvolgimento`, `presentazione`.`Abstract` AS `Abstract`, `presentazione`.`Tipo` AS `Tipo`, `presentazione`.`Username` AS `Username` FROM (`sessione` join `presentazione` on(`presentazione`.`IdSessione` = `sessione`.`IdSessione`))  ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `affiliazioneuniversita`
--
ALTER TABLE `affiliazioneuniversita`
  ADD PRIMARY KEY (`IdUniversita`);

--
-- Indici per le tabelle `autore`
--
ALTER TABLE `autore`
  ADD PRIMARY KEY (`IdAutore`),
  ADD KEY `IdPresentazione` (`IdPresentazione`);

--
-- Indici per le tabelle `conferenza`
--
ALTER TABLE `conferenza`
  ADD PRIMARY KEY (`IdConferenza`),
  ADD UNIQUE KEY `AnnoEdizione` (`AnnoEdizione`,`Acronimo`),
  ADD KEY `UsernameAmministratore` (`UsernameAmministratore`);

--
-- Indici per le tabelle `dispone`
--
ALTER TABLE `dispone`
  ADD PRIMARY KEY (`IdConferenza`,`IdSponsor`),
  ADD KEY `IdSponsor` (`IdSponsor`);

--
-- Indici per le tabelle `messaggio`
--
ALTER TABLE `messaggio`
  ADD PRIMARY KEY (`IdMessaggio`,`IdSessione`),
  ADD KEY `IdSessione` (`IdSessione`),
  ADD KEY `Username` (`Username`);

--
-- Indici per le tabelle `parolachiave`
--
ALTER TABLE `parolachiave`
  ADD PRIMARY KEY (`IdParola`),
  ADD KEY `IdPresentazione` (`IdPresentazione`);

--
-- Indici per le tabelle `preferenza`
--
ALTER TABLE `preferenza`
  ADD KEY `IdPresentazione` (`IdPresentazione`),
  ADD KEY `Username` (`Username`);

--
-- Indici per le tabelle `presentazione`
--
ALTER TABLE `presentazione`
  ADD PRIMARY KEY (`IdPresentazione`),
  ADD KEY `Username` (`Username`),
  ADD KEY `IdSessione` (`IdSessione`);

--
-- Indici per le tabelle `programmagiornaliero`
--
ALTER TABLE `programmagiornaliero`
  ADD PRIMARY KEY (`IdProgrammaGiornaliero`),
  ADD KEY `IdConferenza` (`IdConferenza`);

--
-- Indici per le tabelle `registra`
--
ALTER TABLE `registra`
  ADD PRIMARY KEY (`Username`,`IdConferenza`),
  ADD KEY `IdConferenza` (`IdConferenza`);

--
-- Indici per le tabelle `risorsaaggiuntiva`
--
ALTER TABLE `risorsaaggiuntiva`
  ADD PRIMARY KEY (`IdRisorsa`),
  ADD KEY `IdPresentazione` (`IdPresentazione`),
  ADD KEY `Username` (`Username`);

--
-- Indici per le tabelle `sessione`
--
ALTER TABLE `sessione`
  ADD PRIMARY KEY (`IdSessione`),
  ADD KEY `IdProgrammaGiornaliero` (`IdProgrammaGiornaliero`);

--
-- Indici per le tabelle `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`IdSponsor`);

--
-- Indici per le tabelle `svolgespeaker`
--
ALTER TABLE `svolgespeaker`
  ADD PRIMARY KEY (`Username`,`IdPresentazione`),
  ADD KEY `IdPresentazione` (`IdPresentazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `IdUniversita` (`IdUniversita`);

--
-- Indici per le tabelle `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`Username`,`IdPresentazione`),
  ADD KEY `IdPresentazione` (`IdPresentazione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `affiliazioneuniversita`
--
ALTER TABLE `affiliazioneuniversita`
  MODIFY `IdUniversita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `autore`
--
ALTER TABLE `autore`
  MODIFY `IdAutore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `conferenza`
--
ALTER TABLE `conferenza`
  MODIFY `IdConferenza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `messaggio`
--
ALTER TABLE `messaggio`
  MODIFY `IdMessaggio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `parolachiave`
--
ALTER TABLE `parolachiave`
  MODIFY `IdParola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `presentazione`
--
ALTER TABLE `presentazione`
  MODIFY `IdPresentazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `programmagiornaliero`
--
ALTER TABLE `programmagiornaliero`
  MODIFY `IdProgrammaGiornaliero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `risorsaaggiuntiva`
--
ALTER TABLE `risorsaaggiuntiva`
  MODIFY `IdRisorsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT per la tabella `sessione`
--
ALTER TABLE `sessione`
  MODIFY `IdSessione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `IdSponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `autore`
--
ALTER TABLE `autore`
  ADD CONSTRAINT `autore_ibfk_1` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`);

--
-- Limiti per la tabella `conferenza`
--
ALTER TABLE `conferenza`
  ADD CONSTRAINT `conferenza_ibfk_1` FOREIGN KEY (`UsernameAmministratore`) REFERENCES `utente` (`Username`);

--
-- Limiti per la tabella `dispone`
--
ALTER TABLE `dispone`
  ADD CONSTRAINT `dispone_ibfk_1` FOREIGN KEY (`IdConferenza`) REFERENCES `conferenza` (`IdConferenza`),
  ADD CONSTRAINT `dispone_ibfk_2` FOREIGN KEY (`IdSponsor`) REFERENCES `sponsor` (`IdSponsor`);

--
-- Limiti per la tabella `messaggio`
--
ALTER TABLE `messaggio`
  ADD CONSTRAINT `messaggio_ibfk_1` FOREIGN KEY (`IdSessione`) REFERENCES `sessione` (`IdSessione`),
  ADD CONSTRAINT `messaggio_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`);

--
-- Limiti per la tabella `parolachiave`
--
ALTER TABLE `parolachiave`
  ADD CONSTRAINT `parolachiave_ibfk_1` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`);

--
-- Limiti per la tabella `preferenza`
--
ALTER TABLE `preferenza`
  ADD CONSTRAINT `preferenza_ibfk_1` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`),
  ADD CONSTRAINT `preferenza_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`);

--
-- Limiti per la tabella `presentazione`
--
ALTER TABLE `presentazione`
  ADD CONSTRAINT `presentazione_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`),
  ADD CONSTRAINT `presentazione_ibfk_2` FOREIGN KEY (`IdSessione`) REFERENCES `sessione` (`IdSessione`);

--
-- Limiti per la tabella `programmagiornaliero`
--
ALTER TABLE `programmagiornaliero`
  ADD CONSTRAINT `programmagiornaliero_ibfk_1` FOREIGN KEY (`IdConferenza`) REFERENCES `conferenza` (`IdConferenza`);

--
-- Limiti per la tabella `registra`
--
ALTER TABLE `registra`
  ADD CONSTRAINT `registra_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`),
  ADD CONSTRAINT `registra_ibfk_2` FOREIGN KEY (`IdConferenza`) REFERENCES `conferenza` (`IdConferenza`);

--
-- Limiti per la tabella `risorsaaggiuntiva`
--
ALTER TABLE `risorsaaggiuntiva`
  ADD CONSTRAINT `risorsaaggiuntiva_ibfk_1` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`),
  ADD CONSTRAINT `risorsaaggiuntiva_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`);

--
-- Limiti per la tabella `sessione`
--
ALTER TABLE `sessione`
  ADD CONSTRAINT `sessione_ibfk_1` FOREIGN KEY (`IdProgrammaGiornaliero`) REFERENCES `programmagiornaliero` (`IdProgrammaGiornaliero`);

--
-- Limiti per la tabella `svolgespeaker`
--
ALTER TABLE `svolgespeaker`
  ADD CONSTRAINT `svolgespeaker_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`),
  ADD CONSTRAINT `svolgespeaker_ibfk_2` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`IdUniversita`) REFERENCES `affiliazioneuniversita` (`IdUniversita`);

--
-- Limiti per la tabella `valuta`
--
ALTER TABLE `valuta`
  ADD CONSTRAINT `valuta_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `utente` (`Username`),
  ADD CONSTRAINT `valuta_ibfk_2` FOREIGN KEY (`IdPresentazione`) REFERENCES `presentazione` (`IdPresentazione`);

DELIMITER $$
--
-- Eventi
--
CREATE DEFINER=`root`@`localhost` EVENT `svolgimento_conferenza_completata` ON SCHEDULE EVERY 1 MINUTE STARTS '2022-08-16 10:40:03' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE Conferenza SET CampoSvolgimento="Completata"
    WHERE DataSvolgimento<CURRENT_TIMESTAMP()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
