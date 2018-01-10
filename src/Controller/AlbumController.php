<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:55
 */

namespace App\Controller;

use App\Entity\Album;
use App\Form\Type\SongFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    /**
     * @Route("/album/list")
     *
     * @return Response
     */
    public function listing()
    {
        $albums = $this->getDoctrine()->getRepository('App:Album')->findAllSortedByName();

        return $this->render('albumList.html.twig', array(
            "albums" => $albums,
        ));

    }

    /**
     * @Route("/albums/create")
     */
    public function create(Request $request)
    {
        $song = new Song();
        $form = $this->createForm(SongFormType::class, $song);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($song);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_songs_listing');
        }

        return $this->render('songCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/albums/{id}/update")
     */
    public function update(Request $request, $id)
    {
        $song = $this->getDoctrine()->getRepository('App:Song')->find($id);
        $form = $this->createForm(SongFormType::class, $song);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_songs_listing');
        }

        return $this->render('songCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
    * @Route("/albums/{id}/delete")
     */
    public function delete($id)
    {
            $album = $this->getDoctrine()->getRepository('App:Album')->find($id);

            return $this->render('deleteAlbum.html.twig', array(
                    'album' => $album,
                ));
    }

    /**
     * @Route("/albums/{id}/delete-confirm")
     */
    public function deleteConfirm($id)
    {
            $album = $this->getDoctrine()->getRepository('App:Album')->find($id);
            $this->getDoctrine()->getManager()->remove($album);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_albums_listing');
    }
}