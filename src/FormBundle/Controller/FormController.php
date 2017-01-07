<?php

namespace FormBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @Route("/form")
 */
class FormController extends Controller
{
    
    /**
     * @Route("/")
     * 
     * @Template
     */
    public function displayAction()
    {
       
        $form = $this->createFormBuilder()
                ->add('name', 'text')
                ->add('email', 'email')
                ->add('sex', 'choice', array(
                    'choices' => array(
                        'm' => 'Mężczyzna',
                        'k' => 'Kobieta'
                    ),
                    'expanded' => 'true'
                ))
                ->add('birthdate', 'birthday', array(
                    'empty_value' => '--',
                    'empty_data' => NULL
                ))
                ->add('country', 'country', array(
                    'empty_value' => '--',
                    'empty_data' => NULL
                ))
                ->add('course', 'choice', array(
                    'choices' => array(
                        'basic' => 'Kurs podstawowy',
                        'at' => 'Analiza techniczna',
                        'af' => 'Analiza fundamentalna',
                        'master' => 'Kurs zaawansowany'
                    )
                ))
                ->add('invest', 'choice', array(
                    'choices' => array(
                        'a' => 'Akcje',
                        'o' => 'Obligacje',
                        'f' => 'Forex',
                        'etf' => 'ETF'
                    ),
                    'expanded' => 'true',
                    'multiple' => 'true'
                ))
                ->add('comments', 'textarea')
                ->add('payment_file', 'file')
                ->add('rules', 'checkbox')
                ->add('save', 'submit')
                ->getForm();
        
        
//        return $this->render('FormBundle:Form:display.html.twig');
        
        return array(
            'form' => $form->createView()
        );
    }
}
