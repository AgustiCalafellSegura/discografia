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

class AlbumController extends Controller
{
    /**
     * @Route("/album/list")
     *
     * @return Response
     */
    public function listing()
    {
        $albums = $this->getDoctrine()->getRepository('App:Album')->findAll();

        return $this->render('albumList.html.twig', array(
            "albums" => $albums,
        ));

    }
}