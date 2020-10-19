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
        $modelos_3d = scandir('../3d-html-models');                              
                
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
                                    
            if(in_array("3d-model".$i.".html", $modelos_3d))
            {
                $pokemon->setHas_3d_model(1);
            }
            else
            {
                $pokemon->setHas_3d_model(0);
            }

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

$pokemonDAO = new PokemonDAO();
$pokemonDAO->getNext12(1);

