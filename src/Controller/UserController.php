<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        // Crear el formulario
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);


        // Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);

        // Comprobar si se ha enviado el formulario
        if ($form->isSubmitted()){
            // Modificando el objeto para guardarlo
            $user->setRole('ROLE_USER');

            $user->setCreatedAt(new DateTime('now'));


            //Cifrar contraseña
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            // Guardar usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('tasks');
        }
        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
