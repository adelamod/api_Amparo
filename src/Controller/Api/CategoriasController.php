<?php

namespace App\Controller\Api;

use App\Repository\CategoriasRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategoriasController extends AbstractFOSRestController
{
 private $catReopository;
 public function __construct (CategoriasRepository $catReopository){
     $this->catReopository = $catReopository;
 }

    /**
     * @Rest\Get(path="/categorias")
     * @Rest\View(serializerGroups={"categoria_list}, serializerEnableMaxDepthChecks = true)
     * @return mixed
     */

 public function getCategorias(){
     return $this->catReopository->findAll();
 }
}