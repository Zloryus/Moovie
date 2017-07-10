<?php
/**
 * Created by PhpStorm.
 * User: eric_b
 * Date: 06/07/2017
 * Time: 10:33
 */

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Doctrine\ORM\EntityManager;
use App\Entity\Moovie;


class ResearchAction implements ServerMiddlewareInterface{

    private $entityManager;

    public function __construct(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate){
        $params = $request->getParsedBody();
        if(!isset($params['keys']) or is_null($params['keys']) or $params['keys'] == ""){
            $results = $this->entityManager->getRepository(Moovie::class)->findAll();
        }
        else{
            $keys = strtoupper($params['keys']);
            $query =  $this->entityManager->createQuery("select m from ".Moovie::class." m where m.name like '%$keys%'");
            $results = $query->getResult();

            if(empty($results)){
                return new JsonResponse(['success' => false, 'keys' => $keys]);
            }
        }
        return new JsonResponse(['result' => $results, 'success' => true]);

    }
}
