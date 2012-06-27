<?php

namespace MindsEyeSociety\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MindsEyeSociety\LibraryBundle\Entity\Award
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @var date $earned
     *
     * @ORM\Column(name="earned", type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $earnedDate;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"General", "Regional", "National"})
     */
    private $type;

    /**
     * @var string $category
     *
     * @ORM\Column(name="category", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {
     *  "Administration", "City Development", "Communication and Web Design", "Community Service",
     *  "Publications and Public Relations", "Event Services", "Storyteller Support",
     *  "Organizational Service", "Miscellaneous", "Exceptional Service"
     * })
     */
    private $category;

    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount", type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\Min(0)
     * @Assert\Max(100)
     */
    private $amount;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=1023)
     *
     * @Assert\NotBlank()
     * @Assert\MaxLength(1023)
     */
    private $description;

    /**
     * @var string $note
     *
     * @ORM\Column(name="note", type="string", length=1023, nullable=TRUE)
     *
     * @Assert\MaxLength(1023)
     */
    private $note;

    /**
     * @var date $awarded
     *
     * @ORM\Column(name="awarded", type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $awardedDate;

    /**
     * @var string $memberNumber
     *
     * @ORM\Column(name="member_number", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    private $memberNumber;

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
     * Set earnedDate
     *
     * @param date $earnedDate
     */
    public function setEarnedDate($earnedDate)
    {
        $this->earnedDate = $earnedDate;
    }

    /**
     * Get earnedDate
     *
     * @return date 
     */
    public function getEarnedDate()
    {
        return $this->earnedDate;
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
     * Set amount
     *
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Set awardedDate
     *
     * @param date $awardedDate
     */
    public function setAwardedDate($awardedDate)
    {
        $this->awardedDate = $awardedDate;
    }

    /**
     * Get awardedDate
     *
     * @return date 
     */
    public function getAwardedDate()
    {
        return $this->awardedDate;
    }

    /**
     * Set memberNumber
     *
     * @param string $memberNumber
     */
    public function setMemberNumber($memberNumber)
    {
        $this->memberNumber = $memberNumber;
    }

    /**
     * Get memberNumber
     *
     * @return string 
     */
    public function getMemberNumber()
    {
        return $this->memberNumber;
    }
}