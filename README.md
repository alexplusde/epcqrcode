# EPC-QR-Code - REDAXO-Addon für GiroCode-kompatible EPC-QR-Codes

Macht, was es soll. Generiert QR-Codes, die von Giro-Code kompatiblen Banking-Apps in einer Überweisung genutzt werden können.

## Features

* EPC-QR-Code zur Verwendung ins PDFs oder auf der Website
* Generierung lokal oder über Google
* 
## Einstellungs-Seite

Lege Standard-Angaben fest, um den Link zu verkürzen.

## Nutzung

Rufe über die REX-API folgende URL im Frontend auf, um einen EPC-QR-Code zu erhalten:

`https://example.org/?rex-api-call=epcqrcode&iban=DEXXXXXXXXXXXXXXXXXXXX&amount=1234.56&description=Mein%20Verwendungszweck`

Wenn Voreinstellungen gewählt sind (IBAN, BIC, Empfängername, Verwendungszweck) lässt sich die URL au den Betrag verkürzen:

`https://example.org/?rex-api-call=epcqrcode&amount=1234.56`

Der EPC-QR-Code kann dann von einer GiroCode-kompatiblen App bei einer Überweisung eingescannt werden.

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
$epcqrcode = epcqrcode::factory($iban, $bic, $name, $description, $amount, $type);
$epcqrcode->showPng(); // Image-Tag direkt ausgeben
```

Alle weiteren Methoden und Infos zur Generierung: Siehe auch https://github.com/fellwell5/bezahlcode

> You can get the code as base 64:

```php
$base64 = $epcqrcode->generateBase64(); jpg, png, gif
echo '<img src="'.$base64.'" alt="" />';
```

> or save the code as image file

```php
$epcqrcode->saveImage("output.jpg");
$epcqrcode->saveImage("output.png", "png"); // jpg, png, gif
```

> or output the Bezahlcode to the webbrowser

```php
$epcqrcode->outputImage();
$epcqrcode->outputImage("jpg"); // jpg, png, gif
```

## Lizenz

MIT Lizenz, siehe [LICENSE](https://github.com/alexplusde/epcqrcode/blob/master/LICENSE)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)
