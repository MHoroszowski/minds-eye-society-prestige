<?php

namespace MindsEyeSociety\ReportBundle\Entity;

use MindsEyeSociety\ReportBundle\Entity\Location;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * MindsEyeSociety\ReportBundle\Entity\Member
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MindsEyeSociety\ReportBundle\Entity\MemberRepository")
 */
class Member
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string $number
     *
     * @ORM\Column(name="number", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @var Location $homeLocation
     *
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="members")
     * @ORM\JoinColumn(name="home_location_id", referencedColumnName="id")
     *
     * @Assert\NotBlank()
     */
    private $homeLocation;


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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set homeLocation
     *
     * @param MindsEyeSociety\ReportBundle\Entity\Location $homeLocation
     */
    public function setHomeLocation(\MindsEyeSociety\ReportBundle\Entity\Location $homeLocation)
    {
        $this->homeLocation = $homeLocation;
    }

    /**
     * Get homeLocation
     *
     * @return MindsEyeSociety\ReportBundle\Entity\Location 
     */
    public function getHomeLocation()
    {
        return $this->homeLocation;
    }
}