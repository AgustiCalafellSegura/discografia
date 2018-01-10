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
        $artists = $this->getDoctrine()->getRepository('App:Artist')->findAllSortedByName();

        return $this->render('artistList.html.twig', array(
            "artists" => $artists,

        ));
    }

    public function create(Request $request)
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistFormType::class, $artist);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($artist);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_artist_list');
        }

        return $this->render('artistCreate.html.twig', array(
            'form' => $form->createView()
        ));
     }

    public function update(Request $request, $id)
    {
        $artist = $this->getDoctrine()->getRepository('App:Artist')->find($id);
        $form = $this->createForm(ArtistFormType::class, $artist);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_artist_list');
        }

        return $this->render('artistCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }
}