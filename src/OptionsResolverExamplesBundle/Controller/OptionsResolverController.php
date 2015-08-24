<?php
namespace OptionsResolverExamplesBundle\Controller;

use OptionsResolverExamplesBundle\Services\OptionsResolverService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * http://symfony.com/doc/current/components/options_resolver.html
 */
class OptionsResolverController extends Controller
{
    private $optionsResolverService;

    public function __construct(OptionsResolverService $optionsResolverService)
    {
        $this->optionsResolverService = $optionsResolverService;
    }

    public function classicMailerAction(Request $request)
    {
        $query = $request->query->all();
        $this->optionsResolverService->doClassicMailer($query);

        return new Response(null, Response::HTTP_OK);
    }

    public function optionsResolverMailerAction(Request $request)
    {
        $query = $request->query->all();
        $this->optionsResolverService->doOptionsResolverMailer($query);

        return new Response(null, Response::HTTP_OK);
    }

    public function googleMailerAction(Request $request)
    {
        $query = $request->query->all();
        $this->optionsResolverService->doGoogleMailer($query);

        return new Response(null, Response::HTTP_OK);
    }

    public function getRequiredOptForGoogleMailerAction(Request $request)
    {
        $query = $request->query->all();
        $this->optionsResolverService->getRequiredOptionsForGoolgeMailer($query);

        return new Response(null, Response::HTTP_OK);
    }

    public function example1Action(Request $request)
    {
        $resolver = new OptionsResolver();
        $this->configureOptionsExample1($resolver);

        $query = $request->query->all();

        $options = $resolver->resolve($query);

        return new Response(json_encode($options), 200);
    }



    /**
     * Configuring the OptionsResolver
     * @param OptionsResolver $resolver
     */
    private function configureOptionsExample1(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'host' => 'localhost',
            'username' => 'user',
            'password' => 'pass'
        ));
    }
}
