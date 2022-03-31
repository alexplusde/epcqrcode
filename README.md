# girocode - REDAXO-Addon für Girocode-kompatible QR-Codes

Macht, was es soll. Generiert QR-Codes, die von Giro-Code kompatiblen Banking-Apps in einer Überweisung genutzt werden können.

## Features

* QR-Code als PDF
* Generierung lokal oder über Google
* Formular zum Generieren der QR-Code-Links

## Einstellungs-Seite

Lege Standard-Angaben fest, um den Link zu Verkürzen.

## Nutzung

Die einzelnen Parameter:

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

```
$base64 = $bezahlcode->generateBase64(); // Specified filetypes can be: jpg, png, gif; defaults to jpg
echo "<img src='$base64' alt='Bezahlcode' />";
```

> or save the code as image file

```
$bezahlcode->saveImage("output.jpg");
$bezahlcode->saveImage("output.png", "png"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

> or output the Bezahlcode to the webbrowser

```
$bezahlcode->outputImage();
$bezahlcode->outputImage("jpg"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

## Lizenz

LGPL 3 Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/girocode/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)
