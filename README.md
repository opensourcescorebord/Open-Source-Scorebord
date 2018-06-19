# Open-Source Scorebord
Een moderne variant op een oud idee.


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Give examples
```

### Installing

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

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
