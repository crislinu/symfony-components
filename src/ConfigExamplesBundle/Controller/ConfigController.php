<?php

namespace ConfigExamplesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{
    public function indexAction(Request $request)
    {
        return new Response('It works ' . $request->get('file'));
    }
}
