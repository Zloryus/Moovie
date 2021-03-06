<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Twig\TwigRenderer;

class HomePageAction implements ServerMiddlewareInterface{


    private $router;
    private $template;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null){
        $this->router = $router;
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate){
        $data = [];
        $data['research'] = '';
        return new HtmlResponse($this->template->render('app::index', $data));
    }
}
