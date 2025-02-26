<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class FirebaseService
{
  private $client;
  private $firebaseUrl;
  public function __construct(HttpClientInterface $client)
  {
    $this->client = $client;
    $this->firebaseUrl = 'https://aselec-5880b-default-rtdb.europe-west1.firebasedatabase.app/';
  }
  public function addcontact(string $name, string $email, string $message): string
  {
    $data = [
      'name' => $name,
      'email' => $email,
      'message' => $message,
    ];

    $response = $this->client->request('POST', $this->firebaseUrl, [
      'json' => $data,
      'verify_peer' => false,
      'verify_host' => false,
    ]);

    $statusCode = $response->getStatusCode();
    if ($statusCode === 200) {
      return "Avis ajouté avec succès!";
    }
    return "Erreur lors de l'ajout de l'avis.";
  }
}
