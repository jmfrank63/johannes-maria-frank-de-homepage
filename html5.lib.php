<?php

/*
    Übungsaufgabe
    Bitte Groß- und Kleinschreibung übernehmen

    Erstelle eine neue PHP-Datei im Unterverzeichnis php
    mit dem Namen html5.lib.php

    Erstellt eine Funktion mit Namen: buildUlList
    Die Funktion soll eine beliebige Anzahl von Argumenten
    erhalten dürfen.

    Sofern Argumentwerte vorhanden sind, sollen diese als Content
    für die li-Elemente eingesetzt werden ... zuletzt soll
    eine ordentlich formatierte ul-Liste von der Funktion
    zurückgegeben werden.
    Wurde keine Argumentwerte übergeben, soll ein leerer
    String zurück gegeben werden.

    Überprüfe anhand mehrere Funktionsaufrufe, ob Deine
    Funktion auch sauber funktioniert.
 */
$html_text=<<<'EOT'
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>%1$s</title>
</head>
<body>
    %2$s
</body>
</html>
EOT;

function buildUlList() {
    $args = func_get_args();
    $ul_liste = array();
    
    foreach ($args as $arg){
        array_push($ul_liste, "<li>", (string)$arg, "</li>");
    }
    return "<ul>" . implode($ul_liste). "</ul>";
}

$ul_liste = buildUlList('a','b','c', 22, 3.5);

printf($html_text, "Dees is ober schee", $ul_liste);

?>