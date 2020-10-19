<?php

require_once 'Pokemon.php';
require '../vendor/autoload.php';

use PokePHP\PokeApi;

function generateJSON($inicio, $fim)
{
    $modelos_3d = scandir('../3d-html-models');                              

    $api = new PokeApi;

    $pokemons_arr = array();

    $i = $inicio;

    while($i <= $fim)
    {
        $pokemon_api = json_decode($api->pokemon($i)); 

        $pokemon = new Pokemon();            
        $pokemon->setName(ucfirst($pokemon_api->name));
        $pokemon->setNumber($pokemon_api->id);

        if(in_array("3d-model".$pokemon_api->id.".html", $modelos_3d))
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

        $i += 1;
    }

    $fp = fopen('../data/pokemons'.$inicio.'-'.$fim.'.json', 'w');
    fwrite($fp, json_encode($pokemons_arr));
    fclose($fp);
}

generateJSON(801, 893);