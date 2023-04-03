<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/quote")]
    public function jsonQuote(): Response
    {
        $quotes = array(
            "The only sin is ignorance.", 
            "A man is his own easiest dupe, for what he wishes to be true he generally believes to be true.", 
            "A lie can travel halfway around the world while the truth is putting on its shoes.");
        
        $quotes[array_rand($quotes)];

        $data = [
            'quotes' => $quotes[array_rand($quotes)]
        ];

        // $response = new Response();
        // $response->setContent(json_encode($data));
        // $response->headers->set('Content-Type', 'application/json');

        // return $response;
        // return new JsonResponse($data);
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

}
