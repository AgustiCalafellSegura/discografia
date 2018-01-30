<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:55
 */

namespace App\Controller;


use App\Entity\Artist;
use App\Form\Type\ArtistFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends Controller
{
    /**
     * @Route("/artists/list")
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

    /**
     * @Route("/artists/create")
     */
    public function create(Request $request)
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistFormType::class, $artist);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($artist);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_artist_listing');
        }

        return $this->render('artistCreate.html.twig', array(
            'form' => $form->createView()
        ));
     }

    /**
     * @Route("/artists/{id}/update")
     */
    public function update(Request $request, $id)
    {
        $artist = $this->getDoctrine()->getRepository('App:Artist')->find($id);
        $form = $this->createForm(ArtistFormType::class, $artist);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_artist_listing');
        }

        return $this->render('artistCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/artists/{id}/delete")
     */
    public function delete($id)
    {
        $artist = $this->getDoctrine()->getRepository('App:Artist')->find($id);

        return $this->render('deleteArtist.html.twig', array(
            'artist' => $artist,
        ));
    }

    /**
     * @Route("/artists/{id}/delete-confirm")
     */
    public function deleteConfirm($id)
    {
        $artist = $this->getDoctrine()->getRepository('App:Artist')->find($id);
        $this->getDoctrine()->getManager()->remove($artist);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('app_artist_listing');

    }
}