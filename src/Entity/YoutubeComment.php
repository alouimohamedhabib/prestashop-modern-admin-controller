<?php 
 
namespace Myyoutubemc\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class YoutubeComment
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_product_comment", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=64)
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="grade", type="integer")
     */
    private $grade;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return ProductComment
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

public function setId($id) {
    $this->id = $id;
}
    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     *
     * @return ProductComment
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return ProductComment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return ProductComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return int
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param int $grade
     *
     * @return ProductComment
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id_product' => $this->getProductId(),
            'id_product_comment' => $this->getId(),
            'title' => $this->getTitle(),
            'content' => $this->getContent(),
            'customer_name' => $this->getCustomerName(),
            'grade' => $this->getGrade(),
        ];
    }
}