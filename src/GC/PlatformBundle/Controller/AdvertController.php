<?php
namespace GC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
// pour l'url complete
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdvertController extends Controller
{
    // On récupère tous les paramètres en arguments de la méthode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$_format."."
        );
    }
    // La route fait appel à OCPlatformBundle:Advert:view,
    // on doit donc définir la méthode viewAction.
    // On donne à cette méthode l'argument $id, pour
    // correspondre au paramètre {id} de la route
    public function viewAction($id, Request $request)
    {

        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5
        // Ici, on récupèrera depuis la base de données
        // l'annonce correspondant à l'id $id.
        // Puis on passera l'annonce à la vue pour
        // qu'elle puisse l'afficher
//        return new Response("Affichage de l'annonce d'id : ".$id);
//        $tag = $request->query->get('tag');
//
//        return new Response(
//            "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag

//        );// On crée la réponse sans lui donner de contenu pour le moment
//        $response = new Response();
//        // On définit le contenu
//        $response->setContent("Ceci est une page d'erreur 404");
//        // On définit le code HTTP à « Not Found » (erreur 404)
//        $response->setStatusCode(Response::HTTP_NOT_FOUND);
//        // On retourne la réponse
//        return $response;
        // On récupère notre paramètre tag
//        $tag = $request->query->get('tag');
//        // On utilise le raccourci : il crée un objet Response
//        // Et lui donne comme contenu le contenu du template
//        return $this->get('templating')->renderResponse(
//            'GCPlatformBundle:Advert:view.html.twig',
//            array('id'  => $id, 'tag' => $tag)
//        );
//        $url = $this->get('router')->generate('gc_platform_home');
//
//        return new RedirectResponse($url);
        //pareil que les 2 ligne au dessus mais moins long
//        return $this->redirectToRoute('gc_platform_home');
        // Créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
//        $response = new Response(json_encode(array('id' => $id)));
//        // Ici, nous définissons le Content-type pour dire au navigateur
//        // que l'on renvoie du JSON et non du HTML
//        $response->headers->set('Content-Type', 'application/json');
//        return $response;
//        return new JsonResponse(array('id' => $id));
        // Récupération de la session

        $session = $request->getSession();

        // On récupère le contenu de la variable user_id
        $userId = $session->get('user_id');

        // On définit une nouvelle valeur pour cette variable user_id
        $session->set('user_id', 91);

        // On n'oublie pas de renvoyer une réponse
        return new Response("<body>Je suis une page de test, je n'ai rien à dire.</body>");
    }
    public function indexAction()
    {
        // On veut avoir l'URL de l'annonce d'id 5.
//        $url = $this->get('router')->generate(
//            'gc_platform_view', // 1er argument : le nom de la route
//            array('id' => 5)    // 2e argument : les valeurs des paramètres
//        );
//        pour generer l'url entier
                $url = $this->get('router')->generate('gc_platform_home', array(), UrlGeneratorInterface::ABSOLUTE_URL);
        // $url vaut « /platform/advert/5 »
        return new Response("L'URL de l'annonce d'id 5 est : ".$url);
    }
//    public function indexAction()
//    {
//
//        $content = $this
//            ->get('templating')
//            ->render('GCPlatformBundle:Advert:index.html.twig', array('nom' => 'winzou'));
//
//
//        return new Response($content);
//    }
}