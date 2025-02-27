<?php

namespace App\Service;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class FirebaseService
{
  private Database $database;

  public function __construct()
  {
    $factory = (new Factory)
      ->withServiceAccount(__DIR__ . '/../../config/firebase_credentials.json')
      ->withDatabaseUri('https://aselec2-ee07c-default-rtdb.europe-west1.firebasedatabase.app/');

    $this->database = $factory->createDatabase();
  }

  public function sendContactData(array $data): void
  {
    // On pousse les données dans la collection "contacts"
    $this->database
      ->getReference('contacts')
      ->push($data);
  }
}
