# girocode - REDAXO-Addon für Girocode-kompatible QR-Codes

Macht, was es soll. Generiert QR-Codes, die von Giro-Code kompatiblen Banking-Apps in einer Überweisung genutzt werden können.

## Features

* QR-Code als PDF
* Generierung lokal oder über Google
* Formular zum Generieren der QR-Code-Links

## Einstellungs-Seite

Lege Standard-Angaben fest, um den Link zu verkürzen.

## Nutzung

Rufe über die REX-API folgende URL im Frontend auf, um einen QR-Code zu erhalten:

`https://example.org/?rex-api-call=girocode&iban=DEXXXXXXXXXXXXXXXXXXXX&amount=1234.56&description=Mein%20Verwendungszweck`

Wenn Voreinstellungen gewählt sind (IBAN, BIC, Empfängername, Verwendungszweck) lässt sich die URL au den Betrag verkürzen:

`https://example.org/?rex-api-call=girocode&amount=1234.56`

Der QR-Code kann dann von einer Girocode-kompatiblen App bei einer Überweisung eingescannt werden.

## Die einzelnen Parameter

| Parameter    | Bedeutung                                                                                 |
| ------------ | ----------------------------------------------------------------------------------------- |
| $iban        | IBAN im offiziellen Format, optional, Fallback in den Einstellungen                       |
| $bic         | BIC im offiziellen Format, optional, Fallback in den Einstellungen                        |
| $name        | Empfängername, optional, Fallback in den Einstellungen                                    |
| $description | Verwendungszweck                                                                          |
| $amount      | Betrag in Währung des Nutzers (z.B. EUR) als Kommazahl, z.B: `1234.56` für `1.234,56 €`   |
| $type        | Erzeugung des QR-Codes serverintern (`phpqrcode`, Standard) oder via Google API `google`) |

```php
$girocode = girocode::factory($iban, $bic, $name, $description, $amount, $type);
$girocode->showPng(); // Image-Tag direkt ausgeben
```

Alle weiteren Methoden und Infos zur Generierung: Siehe auch https://github.com/fellwell5/bezahlcode

> You can get the code as base 64:

```php
$base64 = $bezahlcode->generateBase64(); // Specified filetypes can be: jpg, png, gif; defaults to jpg
echo "<img src='$base64' alt='Bezahlcode' />";
```

> or save the code as image file

```php
$bezahlcode->saveImage("output.jpg");
$bezahlcode->saveImage("output.png", "png"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

> or output the Bezahlcode to the webbrowser

```php
$bezahlcode->outputImage();
$bezahlcode->outputImage("jpg"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

## Lizenz

LGPL 3 Lizenz, siehe [LICENSE](https://github.com/alexplusde/girocode/blob/master/LICENSE)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)
