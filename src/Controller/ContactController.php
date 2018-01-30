<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact/")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactForm(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $message = (new \Swift_Message('Consulta musical'))
                ->setFrom($this->getParameter('admin_mail'))
                ->setTo($this->getParameter('admin_mail'))
                ->setBody('El contacte: '.$contact->getName().' amb el telèfon: '.$contact->getPhone().' i email: '.$contact->getEmail().' diu: '.$contact->getMessage());
            $mailer->send($message);

        }

        return $this->render('contactCreate.html.twig', array(
            'contactForm' => $form->createView()
        ));
    }
}