<?php

namespace FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Survey
 *
 * @ORM\Table(name="survey")
 * @ORM\Entity(repositoryClass="FormBundle\Repository\SurveyRepository")
 */
class Survey
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=50)
     * 
     * @Assert\NotBlank
     * @Assert\Regex(
     *          pattern = "/^[a-zA-Z]+ [a-zA-Z]+$/",
     *          message = "Musisz podać imię i nazwisko"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     * 
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1, nullable=true)
     */
    private $sex;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     * 
     * @Assert\Date
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=2)
     * 
     * @Assert\NotBlank
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="course", type="string", length=50)
     * 
     * @Assert\NotBlank
     */
    private $course;

    /**
     * @var array
     *
     * @ORM\Column(name="invest", type="array")
     * 
     * @Assert\NotBlank
     * @Assert\Count(
     *      min = 2
     * )
     * 
     */
    private $invest;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;
    
//    /**
//     * @Assert\NotBlank
//     * @Assert\File(
//     *      maxSize = "1M",
//     *      mimeTypes = ("application/pdf", "application/x-pdf"),
//     *      mimeTypesMessage = "Potwierdzenie musi być w formacie pdf" 
//     * 
//     */
//    private $paymentFile;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Survey
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Survey
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Survey
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Survey
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Survey
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set course
     *
     * @param string $course
     * @return Survey
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set invest
     *
     * @param array $invest
     * @return Survey
     */
    public function setInvest($invest)
    {
        $this->invest = $invest;

        return $this;
    }

    /**
     * Get invest
     *
     * @return array 
     */
    public function getInvest()
    {
        return $this->invest;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Survey
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
