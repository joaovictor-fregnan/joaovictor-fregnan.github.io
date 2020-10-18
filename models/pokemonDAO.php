<?php

require_once 'Pokemon.php';
require '../vendor/autoload.php';

use PokePHP\PokeApi;

class PokemonDAO
{    
    function getPokemon($id)
    {
        $api = new PokeApi;     
        
        $pokemon_api = json_decode($api->pokemon($id)); 
            
        $pokemon = new Pokemon();            
        $pokemon->setName(ucfirst($pokemon_api->name));
        $pokemon->setNumber($id);
        
        $types_arr = array();
        $types = $pokemon_api->types;
        foreach ($types as $type)
        {
            $types_arr[] = ucfirst($type->type->name);
        }        
        $pokemon->setTypes($types_arr);
        
        $img = $pokemon_api->sprites->other->{'official-artwork'}->front_default;
            
        if($img == '')
        {
            $img = $pokemon_api->sprites->front_shiny;
        }

        $pokemon->setImg($img);
        
        return $pokemon;
    }
    
    function getNext12($start_id)
    {
        $api = new PokeApi;
        
        $pokemons_arr = array();
        
        $end_id = $start_id + 12;
        
        if($end_id > 894)
        {
            $end_id = 894;
        }
        
        for($i=$start_id; $i<$end_id; $i++)
        {
            $pokemon_api = json_decode($api->pokemon($i)); 
            
            $pokemon = new Pokemon();            
            $pokemon->setName(ucfirst($pokemon_api->name));
            $pokemon->setNumber($i);

            $types_arr = array();
            $types = $pokemon_api->types;
            foreach ($types as $type)
            {
                $types_arr[] = ucfirst($type->type->name);
            }        
            $pokemon->setTypes($types_arr);

            $img = $pokemon_api->sprites->other->{'official-artwork'}->front_default;
            
            if($img == '')
            {
                $img = $pokemon_api->sprites->front_shiny;
            }
            
            $pokemon->setImg($img);
            
            $pokemons_arr[] = $pokemon;
        }
        
        return $pokemons_arr;
    }
}

/*$api = new PokeApi;
$pokemon_api = json_decode($api->pokemon(1));
echo '<pre>';
echo print_r($pokemon_api->sprites->other->{'official-artwork'}->front_default);
echo '</pre>';*/

//$api = new PokeApi;   
//echo '<pre>';
//echo print_r(json_decode($api->pokemon(800)));
//echo '</pre>';

//$pokemonDAO = new PokemonDAO();


/*$pokemonDAO = new PokemonDAO();
echo '<pre>';
echo $pokemonDAO->getNext10(1);
echo '</pre>';*/

/*foreach($pokemons as $pokemon)
{
    echo "===== ".$pokemon->name." =====<br>";
    $types = $pokemon->types;
    foreach ($types as $type)
    {
        echo $type->type->name."<br>";
    }
    echo "<br><br>";
}*/

