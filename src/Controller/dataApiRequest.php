<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class dataApiRequest
{
  /**
   * @Route("/velib", name="velib")
   */
  function getVelib()
  {
    $httpClient = HttpClient::create();
    $response = $httpClient->request('GET', 'https://opendata.paris.fr/api/records/1.0/search/?dataset=velib-disponibilite-en-temps-reel&rows=200&facet=station_state&facet=kioskstate');

    // Check HTTP response
    if (200 !== $response->getStatusCode()) {
      // handle the HTTP request error
      echo strval('Error(/velib): Status Code: ' + $response->getStatusCode());
    } else {
      $content = $response->getContent();
      $responseApi = JsonResponse::fromJsonString($content);
      return $responseApi;
    }
  }

  /**
   * @Route("/trash", name="trash")
   */
  function getTrash()
  {
    $httpClient = HttpClient::create();
    $response = $httpClient->request('GET', 'https://opendata.paris.fr/api/records/1.0/search/?dataset=dechets-menagers-points-dapport-volontaire-stations-trilib&rows=20&facet=type&facet=code_postal&facet=etat');

    // Check HTTP response
    if (200 !== $response->getStatusCode()) {
      // handle the HTTP request error
      echo strval('Error(/trash): Status Code: ' + $response->getStatusCode());
    } else {
      $content = $response->getContent();
      $responseApi = JsonResponse::fromJsonString($content);
      return $responseApi;
    }
  }
}