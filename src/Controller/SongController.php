<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:55
 */

namespace App\Controller;


use App\Entity\Song;
use App\Form\Type\SongFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends Controller
{
    /**
     * @Route("/songs/list")
     *
     * @return Response
     */
    public function listing()
    {
        $songs = $this->getDoctrine()->getRepository('App:Song')->findAllSortedByName();

        return $this->render('songList.html.twig', array(
            "songs" => $songs,
        ));
    }

    /**
     * @Route("/songs/create")
     */
    public function create(Request $request)
    {
        $song = new Song();
        $form = $this->createForm(SongFormType::class, $song);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($song);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_artist_listing');
        }

        return $this->render('songCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/songs/{id}/update")
     */
    public function update(Request $request, $id)
    {
        $song = $this->getDoctrine()->getRepository('App:Song')->find($id);
        $form = $this->createForm(SongFormType::class, $song);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_song_listing');
        }

        return $this->render('songCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/songs/{id}/delete")
     */
    public function delete($id)
    {
        $song = $this->getDoctrine()->getRepository('App:Song')->find($id);

        return $this->render('deleteSong.html.twig', array(
            'song' => $song,
        ));
    }

    /**
     * @Route("/songs/{id}/delete-confirm")
     */
    public function deleteConfirm($id)
    {
        $song = $this->getDoctrine()->getRepository('App:Song')->find($id);
        $this->getDoctrine()->getManager()->remove($song);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('app_song_listing');

    }
}