# test - Documento tecnico delle esercitazioni

Esercitazione 1 - Numeri africani:
partendo da un file excel ho recuperato i dati utili per la creazione del database.

Ho utilizzato una libreria di Node.js (sqlite3) per costruire il database in sqlite.

Mi sono costruita un web service sempre in Node.js e creata un endpoint per reperire i dati dal database e uno per visualizzare il file html opportuno con express.

Una volta ricevuti i dati ho realizzato una piccola interfaccia grafica che si divide in due sezioni: la prima sulla sinistra che va a manipolare i dati (pulendo dove possibile i caratteri non idonei) e verificare i numeri di telefono africani presenti nel database, restituendo in output la lista dei numeri che rispettano il fromat (sono composti da 11 numeri, non hanno lettere all'interno); mentre nella sezione di destra ho creato uno strumento di verifica dei numeri africani da input, che rispetta lo stesso format.


Esercitazione 2 - Pasticceria:
per questa esercitazione ho utilizzato principalmente Laravel.

Ho utilizzato un database mysql, relazionando fra loro le tabelle nei seguenti modi:
users - desserts, rispettivamente relazione 1 a molti.
desserts - ingredients, relazione molti a molti.

Ho sviluppato un backoffice dove l'utente puó gestire il proprio negozio di dolci aggiungendo, modificando o eliminando quello che preferisce (CRUD).

Ho realizzato inoltre una parte guest, per tutti gli utenti che non sono loggati, dove si puó vedere la lista dei dolci disponibile e il loro prezzo.
Il prezzo come richiesto é dinamico, dopo 2 giorni i dolci costano l'80% e dopo 3 giorni il 20%.


