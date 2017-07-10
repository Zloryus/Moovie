<?php
/**
 * Created by PhpStorm.
 * User: eric_b
 * Date: 06/07/2017
 * Time: 12:10
 */

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ResearchFactory{

    public function __invoke(ContainerInterface $container){

        $em = $container->get('doctrine.entity_manager.orm_default');

        return new ResearchAction($em);
    }
}