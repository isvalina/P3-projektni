<?php
require 'vendor/autoload.php';
require 'bootstrap.php';

use Svalina\Ontologija;
use Composer\Autoload\ClassLoader;

Flight::route('/', function () {

  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/isvalina_20/ontologija/isvalina.rdf');
  $info = $foaf->dump();
  echo "<h2>Ontologija korištena za projektni zadatak iz P3:</h2> <br/><br/>" . $info;
});

Flight::route('GET /search', function () {

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij = $em->getRepository('Svalina\Ontologija');
  $zapisi = $repozitorij->findAll();
  echo $doctrineBootstrap->getJson($zapisi);
});


Flight::route(
  'GET /napuni_bazu', function () {

    $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/isvalina_20/ontologija/isvalina.rdf');

    foreach ($foaf->resources() as $resource) {

      $name = $foaf->get($resource, 'rdfs:label');

      if($name != ''){

        $i = 0;
        $types[] = [];
        $annotations = "";

        foreach ($resource->types() as $key) { 
          $types[$i] = $key;
          $i++;
        }

        if(count($types)>1){ 
          $myType = $types[1];
        }else{
          $myType = $types[0];
        }

        $zanr = $foaf->get($resource, 'http://oziz.ffos.hr/isvalina/ontologija-mcu#Zanr');
        $nagrada = $foaf->get($resource, 'http://oziz.ffos.hr/isvalina/ontologija-mcu#Nagrada');
        $godinaIzlaska = $foaf->get($resource, 'ns0:godinaIzlaska');
        $trajanjeFilma = $foaf->get($resource, 'ns0:trajanjeFilma');
        
        foreach ($resource->properties() as $key) {
          echo $i++ . ' ' . $key . ' <br/>';
      }

      $ontologija = new Ontologija();
      $ontologija->setPodaci(Flight::request()->data);

      $ontologija->setNazivFilma($name);
      $ontologija->setZanr($zanr);
      $ontologija->setNagrada($nagrada);
      $ontologija->setGodinaIzlaska($godinaIzlaska);
      $ontologija->setTrajanjeFilma($trajanjeFilma);

      $em->persist($ontologija);
      $em->flush();
    }
  }

  echo "Ontologija uspješno unesena u bazu podataka.";

});

Flight::route('GET /search/@name', function($name){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Svalina\Ontologija');
  $zapisi = $repozitorij->createQueryBuilder('p')
                        ->where('p.naziv LIKE :naziv')
                        ->setParameter('naziv', '%'.$name.'%')
                        ->getQuery()
                        ->getResult();
  echo $doctrineBootstrap->getJson($zapisi);

});

$cl = new ClassLoader('Svalina', __DIR__, '/src');
$cl->register();
require_once 'bootstrap.php';
Flight::register('entityManager', 'DoctrineBootstrap');

Flight::start();

