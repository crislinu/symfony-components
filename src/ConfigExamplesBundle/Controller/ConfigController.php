<?php

namespace ConfigExamplesBundle\Controller;

use ConfigExamplesBundle\Sevices\ConfigService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{
    public $configService;

    public function __construct(ConfigService $confiService)
    {
        $this->configService = $confiService;
    }

    public function indexAction(Request $request)
    {
        $file = $request->get('file');
        $abtest = $request->get('abtest');

        $configuration = $this->configService->loadConfiguration($file);
        var_dump($configuration);

        return new Response('It works ');
    }
}
