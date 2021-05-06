<?php
/**
 * Initialisierungen, Deffinitionen
 */
require_once "config/constants.php";
/**
 *  Funktion zum automatischen Klassenaufruf
 */
require_once "config/autoload.php";
/**
 *   Ruft die Klasse "Dispacher" zur zentrale Navigationskontrolle der nächsten Webseite auf.
 *   Über den Nutzer Request(Aktion) wird der Content der Webseite geroutet.
 */
$create_Dispatcher = new Dispatcher();
$create_Dispatcher->dispatch();
