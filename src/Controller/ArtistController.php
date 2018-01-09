<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:55
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends Controller
{
    /**
     * @Route("/artist/list")
     *
     * @return Response
     */
    public function listing()
    {
        $artists = $this->getDoctrine()->getRepository('App:Artist')->findAll();

        return $this->render('artistList.html.twig', array(
            "artists" => $artists,

        ));

    }
}