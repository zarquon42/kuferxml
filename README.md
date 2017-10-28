# kuferxml
KuferSQL WordPress-Plugin

KuferSQL ist eine Seminar- und Kursverwaltung für den Einsatz in der Erwachsenenbildung. Daas Programm wird z.B. in Volkshochschulen eingesetzt. Kufer selbst bietet mit KuferWEB eine Lösung an um das Kursangebot online zu präsentieren. Diese Lösung war uns jedoch zu groß, zu aufwändig, zu enterprise. Wir suchten etwas kleineres, schlankeres, das besser zu uns passt. Etwas mehr Wordpress und dafür weniger Typo3.

Da es das nicht gab, musste ich mein erstes Wordpress-Plugin schreiben. Dieses bereitet den generellen Internet-XML-Export aus Kufer so auf, das eine Kursübersicht und einzelne Kurse auf der Seite dargestellt werden.

Wahrscheinlich nicht sonderlich elegant, tut es aber seit Monaten für uns, was es soll.

Installation:

Es braucht nur die kufer.php in einem Plugin-Verzeichnis. Einbindung in eine Seite oder einen Beitrag per [kufer] Shortcode. Die styles.css tut, was CSS-Dateien für gewöhnlich tun. Sie passt das Layout an.

## Shrink your XML

Die von Kufer exportierte XML-Datei enthält wirklich ALLE möglichen Informationen der ausgewählten Kurse.