<?php

require_once 'Pokemon.php';

class PokemonDAO
{
    function readXML()
    {                
        $xml=simplexml_load_file('../data/pokedex.xml', 'Pokemon') or die('Error: Cannot create object');
        echo '<pre>';
        echo print_r($xml->pokemon[1]);
        echo '</pre>';
    } 
}

$pokemonDAO = new PokemonDAO();

$pokemonDAO->readXML();