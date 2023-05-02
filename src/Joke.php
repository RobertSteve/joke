<?php

namespace Joker;

use GuzzleHttp\Client;

class Joke
{

    public function get(): string
    {
        $client = new Client();
        $response = $client->request('GET', 'https://v2.jokeapi.dev/joke/Any?lang=es');

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Error al obtener la broma');
        }

        $joke = json_decode($response->getBody());

        return $joke->setup . ' ' . $joke->delivery;
    }

}