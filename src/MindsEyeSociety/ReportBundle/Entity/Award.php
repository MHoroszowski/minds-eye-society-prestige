<?php

namespace MindsEyeSociety\ReportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MindsEyeSociety\ReportBundle\Entity\Award
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MindsEyeSociety\ReportBundle\Entity\AwardRepository")
 */
class Award
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
     * @var \DateTime $earned
     *
     * @ORM\Column(name="earned", type="date")
     */
    private $earned;

    /**
     * @var \DateTime $awarded
     *
     * @ORM\Column(name="awarded", type="date")
     */
    private $awarded;

    /**
     * @var integer $value
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string $category
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=1023)
     */
    private $description;

    /**
     * @var string $note
     *
     * @ORM\Column(name="note", type="string", length=1023, nullable=true)
     */
    private $note;

    /**
     * @var Member $receivingMember
     *
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="receivedAwards")
     * @ORM\JoinColumn(name="receiving_member_id", referencedColumnName="id")
     */
    private $receivingMember;

    /**
     * @var Member $approvingMember
     *
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="approvedAwards")
     * @ORM\JoinColumn(name="approving_member_id", referencedColumnName="id")
     */
    private $approvingMember;

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
     * Set value
     *
     * @param integer $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set category
     *
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set note
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set receivingMember
     *
     * @param Member $receivingMember
     */
    public function setReceivingMember(\MindsEyeSociety\ReportBundle\Entity\Member $receivingMember)
    {
        $this->receivingMember = $receivingMember;
    }

    /**
     * Get receivingMember
     *
     * @return Member
     */
    public function getReceivingMember()
    {
        return $this->receivingMember;
    }

    /**
     * Set approvingMember
     *
     * @param Member $approvingMember
     */
    public function setApprovingMember(\MindsEyeSociety\ReportBundle\Entity\Member $approvingMember)
    {
        $this->approvingMember = $approvingMember;
    }

    /**
     * Get approvingMember
     *
     * @return Member
     */
    public function getApprovingMember()
    {
        return $this->approvingMember;
    }

    /**
     * Set earned
     *
     * @param \DateTime $earned
     */
    public function setEarned(\DateTime $earned)
    {
        $this->earned = $earned;
    }

    /**
     * Get earned
     *
     * @return \DateTime
     */
    public function getEarned()
    {
        return $this->earned;
    }

    /**
     * Set awarded
     *
     * @param \DateTime $awarded
     */
    public function setAwarded(\DateTime $awarded)
    {
        $this->awarded = $awarded;
    }

    /**
     * Get awarded
     *
     * @return \DateTime
     */
    public function getAwarded()
    {
        return $this->awarded;
    }
}