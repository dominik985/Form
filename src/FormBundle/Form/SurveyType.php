<?php

namespace FormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class SurveyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
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
                    'choices_as_values' => true,
                    'placeholder' => '--',
                    'empty_data' => NULL
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
                ->add('rules', CheckboxType::class, array(
                    'label' => 'Akceptuje regulamin',
                    'mapped' => false,
                    'constraints' => array(
                        new Assert\NotBlank()
                )))
                ->add('save', SubmitType::class, array(
                      'label' => 'Zapisz'
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormBundle\Entity\Survey'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formbundle_survey';
    }


}
