<?php

require_once(__DIR__.'/../models/PokemonDAO.php');

class PokemonController
{
    function __construct()
    {
        if(filter_input(INPUT_POST, 'acao') == 'getPokemon')
        {
            $this->getPokemon(filter_input(INPUT_POST, 'id'));
        }
        
        if(filter_input(INPUT_POST, 'acao') == 'getNext12')
        {
            $this->getNext12(filter_input(INPUT_POST, 'start_id'));
        }
    }
    
    function getPokemon($id)
    {
        $pokemonDAO = new PokemonDAO();
        
        print json_encode($pokemonDAO->getPokemon($id));
    }
    
    function getNext12($start_id)
    {
        $pokemonDAO = new PokemonDAO();
        
        print json_encode($pokemonDAO->getNext12($start_id));
    }
}

$pokemonController = new PokemonController();