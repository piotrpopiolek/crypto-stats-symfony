<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Unirest;

class MainController extends AbstractController
{
    public function index()
    {

        $autorization = array(
            "X-RapidAPI-Host" => "coingecko.p.rapidapi.com",
            "X-RapidAPI-Key" => "002a3e6fd9msh804451a0819bffep107d46jsnd06912c8e7d7"
        );

        $response = Unirest\Request::get(
            "https://coingecko.p.rapidapi.com/coins/markets?page=1&per_page=100&order=market_cap_desc&vs_currency=usd",
            $autorization
        );

        $coins = $response->body;

        return $this->render('main/main.html.twig', array('coins' => $coins));
    }
}
