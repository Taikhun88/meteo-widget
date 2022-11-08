<?php

namespace App\Controller;

use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $cities = [ 
        'Annecy',
        'Biarritz',
        'Bordeaux',
        'Bruxelles',
        'Chambéry',
        'Grenoble',
        'Lille',
        'Lyon',
        'Marseille',
        'Metz',
        'Montpellier',
        'Nantes',
        'Nice',
        'Paris',
        'Rouen',
        'Toulouse',
        ];

        $randomCity = $cities[mt_rand(0, 15)];

        $weathers = [
            0 => ['/images/png/sun.png', mt_rand(15, 21), mt_rand(22, 37)],
            1 => ['/images/png/sun-cloud.png', mt_rand(15, 18), mt_rand(18, 28)],
            2 => ['/images/png/snow.png', mt_rand(15, 18), mt_rand(18, 28)],
        ];

        $dateToday = new DateTimeImmutable('d, m');
        $randomWeather = $weathers[mt_rand(0, 2)];
        $randomWeatherImg = $randomWeather[0];
        $randomWeatherMin = $randomWeather[1];
        $randomWeatherMax = $randomWeather[2];

        // dump($randomWeatherImg, $randomWeatherMin, $randomWeatherMax);

        return $this->render('home/index.html.twig', [
            'cities' => $cities,
            'randomCity' => $randomCity,
            'todayDate' => $dateToday,
            'randomWeather' => $randomWeather, 
            'randomWeatherImg' => $randomWeatherImg,
            'randomWeatherMin' => $randomWeatherMin, 
            'randomWeatherMax' => $randomWeatherMax, 
        ]);
    }

    #[Route('/mountains', name: 'app_mountains')]
    public function showMountains(): Response
    {
        return $this->render('home/mountains.html.twig');
    }

    #[Route('/beaches', name: 'app_beaches')]
    public function showBeaches(): Response
    {
        return $this->render('home/beaches.html.twig');
    }
}
