<?php

namespace FormBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FormBundle\Form\SurveyType;
use FormBundle\Entity\Survey;

///**
// * @Route("/form")
// */
class SimpleFormController extends Controller
{
    
    /**
     * @Route("/")
     * 
     * @Template
     */
    public function displayAction(Request $request)
    {
       
//        $form = $this->createFormBuilder()
//                ->add('name', TextType::class, array(
//                    'label' => 'Imię i nazwisko'
//                ))
//                ->add('email', EmailType::class, array(
//                    'label' => 'Email'
//                ))
//                ->add('sex', ChoiceType::class, array(
//                    'label' => 'Płeć',
//                    'choices' => array(
//                        'Mężczyzna' => 'm',
//                        'Kobieta' => 'k' 
//                    ),
//                    'choices_as_values' => true,
//                    'expanded' => 'true'
//                ))
//                ->add('birthdate', BirthdayType::class, array(
//                    'label' => 'Data urodzenia',
//                    'placeholder' => '--',
//                    'empty_data' => NULL
//                ))
//                ->add('country', CountryType::class, array(
//                    'label' => 'Kraj',
//                    'placeholder' => '--',
//                    'empty_data' => NULL
//                ))
//                ->add('course', ChoiceType::class, array(
//                    'label' => 'Kurs',
//                    'choices' => array(
//                        'Kurs podstawowy' => 'basic',
//                        'Analiza techniczna' => 'at',
//                        'Analiza fundamentalna' => 'af',
//                        'Kurs zaawansowany' => 'master'
//                    ),
//                    'choices_as_values' => true
//                ))
//                ->add('invest', ChoiceType::class, array(
//                    'label' => 'Inwestycje',
//                    'choices' => array(
//                        'Akcje' => 'a',
//                        'Obligacje' => 'o',
//                        'Forex' => 'f',
//                        'ETF' => 'etf'
//                    ),
//                    'choices_as_values' => true,
//                    'expanded' => 'true',
//                    'multiple' => 'true'
//                ))
//                ->add('comments', TextareaType::class, array(
//                    'label' => 'Dodatkowy komentarz'
//                ))
//                ->add('payment_file', FileType::class, array(
//                    'label' => 'Potwierdzenie zapłaty',
//                    'constraints' => array(
//                        new Assert\NotBlank,
//                        new Assert\File(array(
//                          'maxSize' => '1M',
//                          'mimrTypes' => array(
//                              'application/pdf',
//                              'application/x-pdf'
//                          ),
//                          'mimeTypesMessage' => 'Potwierdzenie musi być w formacie pdf'
//                        ))
//                    )
//                ))
//                ->add('rules', CheckboxType::class, array(
//                    'label' => 'Akceptuje regulamin'
//                ))
//                ->add('save', SubmitType::class, array(
//                    'label' => 'Zapisz'
//                ))
//                ->getForm();
        
        $survey = new Survey();
//        $survey->setName('Dominik Czyżowski')
//                ->setEmail('dominik_pk@interia.pl');
        
        $form = $this->createForm(SurveyType::class, $survey);
        
        $form->handleRequest($request);
        
        if ($form->isValid()){
            $formData = $form->getData();
        }
        
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($survey);
//        $em->flush();
        
//        return $this->render('FormBundle:SimpleForm:display.html.twig');
        
        return array(
            'form' => $form->createView(),
            'formData' => isset($formData) ? $formData : NULL
        );
    }
}
