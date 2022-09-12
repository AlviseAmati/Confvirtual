Progetto Basi di Dati 2022

Componenti gruppo:
Alvise Amati 0000947898
Andrea Asperti 0000840985
Fabio Matthias Cejka 0000942660

Descrizione:
Per prima cosa occorre verificare che il progetto sia correttamente messo nella directory “htdocs” in c:xamp e verificare che xamp sia avviato con i servizi mysql e apache attivi. Successivamente caricare il database verificando il file connessioneDb e verificare i dati.

Il progetto inizia con la root “http://localhost/Progetto_Basi/confvirtual/index.php” e nell’index.php e la pagina home dove un utente potra registrarsi come utente base oppure loggarsi:
Utente base:   Utente 123
Utente Speaker: Speaker 123
Utente Presenter: Presenter 123
Utente Amministratore: Admin 123
Una volta loggato tutti gli utenti vedranno la pagina Home.php dove in alto vengono visualizzate le statistiche pubbliche richieste e sotto ci sono le azione che tutti gli utenti possono fare come visualizzare le conferenze disponibili e registrarsi ad esse; visualizzzare le sessioni disponibili e i messaggi e le presentazioni delle singole sessioni e visualizzare le presentazioni favorite.

Gli Utenti base vedranno solo questo mentre per gli altri 3 tipi Admin Speaker e Presenter cliccando il “il mio profilo” in alto a destra (oppure il bottone che apparira sotto) andranno alla loro pagina dedicata con i loro servizi.
Gli utenti Admin potranno Creare ed eliminare una conferenza; Creare una sessione e inserire una presentazione in essal; visualizzare le presentazioni e poterle associare allo speaker/presenter corrispondente e inserire gli autori negli articoli; inserire le valutazioni nelle presentazioni; ed infine inserire gli sponsor e le sponsorizzazioni.
Gli utenti Presenter potranno inserire e modificare il loro cv, foto e affiliazione universitaria.
Gli utenti Speaker potranno inserire e modificare il loro cv, foto e affiliazione universitaria; visualizare le risorse aggiuntive della presentazione ed visualizzare le presentazioni di tipo tutorial e inserire una risorsa.

In ogni pagina avviene un controllo dell’utente in cui se non e correttamente loggato ti rimanda alla home.


N.B per i log nel database mongodb bisogna installare nella directory mongo e ti crea le sue cartelle e file
Successivamente il progetto crea in automatico la collezzione e il db. per visualizzarli abbiamo scaricato mongodb Compass.