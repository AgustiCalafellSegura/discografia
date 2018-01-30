<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact/")
     */
    public function contactForm(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $message = (new \Swift_Message('Consulta musical'))
                ->setFrom('grijardo@gmail.com')
                ->setTo('info@rubenhierro.com')
                ->setBody('El contacte: '.$contact->getNom().' amb el telèfon: '.$contact->getTelefon().' i email: '.$contact->getEmail().' diu: '.$contact->getMissatge());
            $mailer->send($message);

        }

        return $this->render('contactCreate.html.twig', array(
            'form' => $form->createView()
        ));
    }
}