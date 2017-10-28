# kuferxml
KuferSQL WordPress-Plugin

KuferSQL ist eine Seminar- und Kursverwaltung für den Einsatz in der Erwachsenenbildung. Daas Programm wird z.B. in Volkshochschulen eingesetzt. Kufer selbst bietet mit KuferWEB eine Lösung an um das Kursangebot online zu präsentieren. Diese Lösung war uns jedoch zu groß, zu aufwändig, zu enterprise. Wir suchten etwas kleineres, schlankeres, das besser zu uns passt. Etwas mehr Wordpress und dafür weniger Typo3.

Da es das nicht gab, musste ich mein erstes Wordpress-Plugin schreiben. Dieses bereitet den generellen Internet-XML-Export aus Kufer so auf, das eine Kursübersicht und einzelne Kurse auf der Seite dargestellt werden.

Wahrscheinlich nicht sonderlich elegant, tut es aber seit Monaten für uns, was es soll.

### Installation:

Es braucht nur die kufer.php in einem Plugin-Verzeichnis. Einbindung in eine Seite oder einen Beitrag per [kufer] Shortcode. Die styles.css tut, was CSS-Dateien für gewöhnlich tun. Sie passt das Layout an.

### Shrink your XML

Die von Kufer exportierte XML-Datei enthält wirklich ALLE möglichen Informationen der ausgewählten Kurse. Das ist way too much. Totaler Overload. Und da das Plugin keinerlei smartes Caching oder sonstwas beschleunigendes oder zwischenspeicherndes benutzt. Sondern ganz im Gegenteil bei jedem Seitenaufruf ganz grob und jedes mal aufs neue die XML durchackert um etwas brauchbares auf dem Bildschirm auszugeben. Daher halte ich es für gegeben zumindest in der zum Fraß vorgeworfene Datei nur verwendete Informationen vorzuhalten. Wir benötigen nicht einmal 10% dessen, was Kufer alles in die internet.xml exportiert. Dazu stehen in diesen Export z.B. mit den Telefonnummern der Dozenten Daten, welche ich auf keinen Fall in irgendeiner Weise an einem öffentlichen Ort abgespeichert haben möchte.
Dafür braucht es ein xslt stylesheet. Für unsere Zwecke dient die ifakstyle.xsl.
Apple liefert den nun noch benötigten Processor als Kommandozeilentool in OS X freundlicherweise 
Wa schön ist, denn damit kann man mit einem einfach Anufruf á la:

$ xsltproc -o output.xml style.xsl input.xml

zu dem gewünschten Ergebnis kommen.