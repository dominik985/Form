<?php

namespace FormBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


///**
// * @Route("/form")
// */
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
                ->add('name', TextType::class, array(
                    'label' => 'Imię i nazwisko'
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'Email'
                ))
                ->add('sex', ChoiceType::class, array(
                    'label' => 'Płeć',
                    'choices' => array(
                        'Mężczyzna' => 'm',
                        'Kobieta' => 'k' 
                    ),
                    'choices_as_values' => true,
                    'expanded' => 'true'
                ))
                ->add('birthdate', BirthdayType::class, array(
                    'label' => 'Data urodzenia',
                    'placeholder' => '--',
                    'empty_data' => NULL
                ))
                ->add('country', CountryType::class, array(
                    'label' => 'Kraj',
                    'placeholder' => '--',
                    'empty_data' => NULL
                ))
                ->add('course', ChoiceType::class, array(
                    'label' => 'Kurs',
                    'choices' => array(
                        'Kurs podstawowy' => 'basic',
                        'Analiza techniczna' => 'at',
                        'Analiza fundamentalna' => 'af',
                        'Kurs zaawansowany' => 'master'
                    ),
                    'choices_as_values' => true
                ))
                ->add('invest', ChoiceType::class, array(
                    'label' => 'Inwestycje',
                    'choices' => array(
                        'Akcje' => 'a',
                        'Obligacje' => 'o',
                        'Forex' => 'f',
                        'ETF' => 'etf'
                    ),
                    'choices_as_values' => true,
                    'expanded' => 'true',
                    'multiple' => 'true'
                ))
                ->add('comments', TextareaType::class, array(
                    'label' => 'Dodatkowy komentarz'
                ))
                ->add('payment_file', FileType::class, array(
                    'label' => 'Potwierdzenie zapłaty'
                ))
                ->add('rules', CheckboxType::class, array(
                    'label' => 'Akceptuje regulamin'
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Zapisz'
                ))
                ->getForm();
        
        
//        return $this->render('FormBundle:Form:display.html.twig');
        
        return array(
            'form' => $form->createView()
        );
    }
}
