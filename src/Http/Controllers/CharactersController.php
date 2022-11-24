<?php
namespace App\Http\Controllers;

use Slim\Http\ServerRequest;
use Slim\Http\Response;
use Slim\Views\Twig;
use GuzzleHttp\Client;

use App\Repository\CharacterRepository;

class CharactersController
{
    public function index($request, $response)
    {
        $view = Twig::fromRequest($request);

        $character = new CharacterRepository();
        $hero = $character->getRandomCharacter();
        $id = $hero->getMarvelId();

        $timestamp=time();
        
        $keys='6bd429ede11351e0b5fe57a057acf1849c2ded18'.'114d47f4dbff2c9e93bc0e653cfeee8d';
        $string=$timestamp.$keys;
        $md5=hash('md5', $string);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://gateway.marvel.com:80/v1/public/characters/$id?ts=$timestamp&apikey=114d47f4dbff2c9e93bc0e653cfeee8d&hash=$md5");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );   
        $output= curl_exec($ch); 

        $arr = json_decode($output)->data->results;
        curl_close($ch);

        return $view->render($response, 'characters.twig', [
            'name' => $arr[0]->name,
            'description' => $arr[0]->name,
            'thumbnail' => $arr[0]->thumbnail->path
        ]);
    }
}