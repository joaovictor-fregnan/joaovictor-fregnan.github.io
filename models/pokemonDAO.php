<?php

require_once 'Pokemon.php';
require '../vendor/autoload.php';

use PokePHP\PokeApi;

class PokemonDAO
{
    function readXML()
    {                
        $xml=simplexml_load_file('../data/pokedex.xml', 'Pokemon') or die('Error: Cannot create object');
        echo '<pre>';
        echo print_r($xml->pokemon[1]);
        echo '</pre>';
    } 
    
    function getNext10($start_id)
    {
        $api = new PokeApi;        
        $pokemons = array();
        
        for($i=$start_id; $i<$start_id + 10; $i++)
        {            
            $pokemons[] = json_decode($api->pokemon($i));     
        }        
        return $pokemons;
    }
}

$api = new PokeApi;   
echo '<pre>';
echo print_r(json_decode($api->pokemon(1)));
echo '</pre>';

/*$pokemonDAO = new PokemonDAO();
$pokemons = $pokemonDAO->getNext10(10);

foreach($pokemons as $pokemon)
{
    echo "===== ".$pokemon->name." =====<br>";
    $types = $pokemon->types;
    foreach ($types as $type)
    {
        echo $type->type->name."<br>";
    }
    echo "<br><br>";
}*/

