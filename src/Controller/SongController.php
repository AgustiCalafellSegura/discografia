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

class SongController extends Controller
{
    /**
     * @Route("/song/list")
     *
     * @return Response
     */
    public function listing()
    {
        $songs = $this->getDoctrine()->getRepository('App:Song')->findAll();

        return $this->render('songList.html.twig', array(
            "songs" => $songs,
        ));

    }
}