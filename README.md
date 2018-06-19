# Open-Source Scorebord
Een moderne variant op een oud idee.  

(We raden het gebruik van OSS af in een actieve sporthal voor andere doeleinden dan testen. Wij zijn 5 elektrotechniek studenten zonder formele opleiding in web development, er zullen zeker bugs zijn en veiligheids problemen. We moedigen je aan naar de code te kijken en deze dingen te verbeteren.)  



## Ermee aan het werk

Deze instructies zullen je begeleiden door het installatie process.
Mogelijke problemen kunnen aangegeven worden door een mail te sturen naar:

### Benodigdheden

Hieronder staan de dingen die je nodig hebt om dit systeem aan het werk te krijgen binnen U sporthal.

```
* Tv scherm, 1920 x 1080, 170cm+ aangeraden
* Raspberry Pi 3+
* Lokaal netwerk binnen de sporthal
* HDMI
* Muis & Toetsenbord
* Ethernet kabel of WiFi
* SD/Micro SD, minstens 8GB

```

### Installeren

Een stappen gids voor het installeren van het OSS project  

Navigeer naar de links hieronder en download de nieuwste versies:
```
https://downloads.raspberrypi.org/raspbian_latest
https://github.com/resin-io/etcher/releases/download/v1.4.4/Etcher-Setup-1.4.4-x64.exe
```
Gebriuk Etcher om raspbian op de SD kaart te zetten.  

Stop de SD kaart in de PI.  
Start de Pi op.  
Stel je Wifi in of sluit je Ethernet kabel aan.  

Start de terminal op en installeer apache2, PHP, Mysql en PhpMyAdmin.  
Check eerst of je PI up-to-date is

```
sudo apt update
sudo apt upgrade
sudo apt update

```
  Vervolgens installeren we eerst apache
```
sudo apt install apache2

```
vervolgens moeten we een paar rechten verlenen aan het mapje waar apache zijn bestanden vandaan zal halen
```
sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/

```
Om te testen of je installatie is geslaagd kun je Chromium opstarten en 'localhost' in de adresbalk intypen.  


Nu gaan we PHP installeren, Hiervoor moet je het volgende in de Terminal invoeren
```
sudo apt install php php-mbstring

```
Om vervolgens te testen of PHP werkt zullen we de volgende commands in de terminal intypen
```
sudo rm /var/www/html/index.html

echo "<?php phpinfo ();?>" > /var/www/html/index.php

```
Navigeer nu weer naar 'localhost' in Chromium

Nu gaan we MYSqL installeren, Hiervoor moet je het volgende in de Terminal invoeren
```
sudo apt install mysql-server php-mysql

```
Om vervolgens te testen of MYSQL werkt zullen we de volgende commands in de terminal intypen.  
Vervang 'password' met het gewenste password voor uw database
```
sudo mysql -u root

DROP USER 'root'@'localhost';
CREATE USER 'root'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost'

```

Om de bestanden voor OSS op je computer te krijgen zul je deze moeten downloaden vanaf deze github pagina.  
Navigeer op de raspberry pi naar onze github pagina en download alles als een zip bestand.  
Verwijder eerst alle data uit het mapje '/var/html/www/'
Pak alles uit in het mapje '/var/html/www/'  

Open de terminal nogmaals en creeer een database genaamd 'Scorebord':
```
cd /var/www/html

sudo mysql -u root -p [uw gekozen wachtwoord]

CREATE DATABASE scorebord;

CREATE USER 'ScorePi'@'localhost' IDENTIFIED BY 'SDI';

GRANT ALL PRIVILEGES ON * scorebord * TO 'ScorePi'@'SDI';

FLUSH PRIVILEGES;

mysql -u root -p [Door u gekozen wachtwoord] localhost scorebord < scorebordsql.sql

```
Zoek het IP adress van de PI op door de volgende command uit te voeren:
```
ifconfig

```

Als u nu navigeert naar 'localhost/PI/PIwaitinroom.php' op de PI zal de PI klaar zijn voor een test.  
Navigeer op uw telefoon, die ook verbonden moet zijn met hetzelfde netwerk, naar het IP adress van de PI


### Gebruik


## Test procedure

Voor het testen van ons systeem hebben we een paar test procedures bedacht die passen bij onze formele requierments.
Formele requierments:
* 1. De score moet real-time worden weergegeven.
* 2. De software moet geheel open-source zijn.
* 3. Er moet een mogelijkheid zijn om sponsoren weer te geven.
* 4. De score moet gebruiksvriendelijk aan te passen zijn.
* 5. De score moet zichtbaar zijn voor alle toeschouwers.
* 6. Er mag één gebruiker tegelijk controle de hebben over de bediening.
* 7. De software wordt gefaciliteerd op een betaalbare en bruikbare processor.

Test procedure per requierment.
eerst zal de procedure beschreven worden, vervolgens zal er beschreven hoe we dit hebben getest:
* 1. De score moet real-time worden weergegeven:  
    Dit gaan we testen door een game opstarten en met de game meekijken op meerdere schermen. Vervolgens gaan we de score 10 keer te veranderen. Hierdoor kunnen we zien of de score binnen één seconde veranderd op alle schermen.  

    Na het testen op 5 apparaten tegelijk is gebleken dat de score update binnen 1 seconde op alle devices.

* 2. De software moet geheel open-source zijn:  
    Dit wordt getest door een persoon van buiten af. Deze persoon gaat kijken of hij makkelijk een weg kan banen door de code van het Open Source Scorebord.  


* 3. De code zal toegankelijk zijn via GitHub:  
    Dit word getest door op GitHup te zoeken naar “Open Source Scorebord”.  

    Zoeken naar ‘Open Source Scorebord’ levert het gewenste resultaat, namelijk ons project, bovenaan. Zoeken naar ‘Scorebord’ geeft ons project als 8ste weer.

* 4. De score moet gebruiksvriendelijk aan te passen zijn:  
    Dit gaan we testen door de webapp te openen en een game te starten en vervolgens de score aan te passen.  

    Als je een game start verschijnen er 4 knoppen waarmee de score aangepast kan worden. Dit werkt allemaal intuïtief en naar behoren.

* 5. De score moet zichtbaar zijn voor alle toeschouwers:  
    Dit gaan we testen door de Open Source Scorebord op een tv aan te sluiten en steeds verder naar achter te lopen totdat het oncomfortabel is om ernaar te kijken.  

    Vanaf 30 meter was de score nog duidelijk zichtbaar. Maar dit is ook sterk afhankelijk van wat voor TV de sporthal aanschaft. Wij hebben hiervoor een TV met diameter 1 meter 60 gebruikt.

* 6. Er mag één gebruiker tegelijk controle de hebben over de bediening:  
    Dit gaan we testen door met een ander apparaat proberen een game te starten, terwijl er al een game aan de gang is.  

    Wanneer iemand actief de game aan het besturen is zal ieder persoon die ook probeert in te loggen direct geredirect worden.

* 7. De software wordt gefaciliteerd op een betaalbare en bruikbare processor:  
    Dit gaan we testen door de Raspberry Pi aan te doen.  

    We gebruiken een raspberry pi om de server te hosten en dit werkt allemaal naar behoren.

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/) - HTML Framework
* [JQuery](https://jquery.com/) - Javascript library
* [PHP](http://php.net/manual/en/migration70.new-features.php) - Back-end
* [HTML](https://www.w3schools.com/Html/) - Front-end mark up
* [CSS](https://www.w3schools.com/CSS/) - Front-end styling


## Versioning

This is version 1.0

## Authors

* **Sena Gomashie** - *All round* - [Linkedin](https://www.linkedin.com/in/sena-gomashie-14079a155/)
* **Gerardus Dulfer** - *Front-end* - [Linkedin]()
* **Frederik de Boer** - *Front-end* - [Linkedin](https://www.linkedin.com/in/frederik-boer-68688b158/)
* **Jelle Pek** - *Back-end* - [Linkedin](https://www.linkedin.com/in/jellepek/)
* **Emiel de Vries** - *Back-end* - [Linkedin](https://www.linkedin.com/in/emiel-de-vries-a519a6147/)

## Acknowledgments

* Dank aan SDI voor het ondersteunen en geven van deze opdracht.
* Dank aan dhr. Peter Kamphuis voor het ondersteunen van ons project.
