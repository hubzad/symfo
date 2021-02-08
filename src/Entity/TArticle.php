<?php

namespace App\Entity;

use App\Repository\TArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TArticleRepository::class)
 */
class TArticle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Tcategory::class, inversedBy="tArticles")
     */
    private $Tcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Tuser::class, inversedBy="tArticles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function __construct()
    {
        $this->Tcategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Tcategory[]
     */
    public function getTcategory(): Collection
    {
        return $this->Tcategory;
    }

    public function addTcategory(Tcategory $tcategory): self
    {
        if (!$this->Tcategory->contains($tcategory)) {
            $this->Tcategory[] = $tcategory;
        }

        return $this;
    }

    public function removeTcategory(Tcategory $tcategory): self
    {
        $this->Tcategory->removeElement($tcategory);

        return $this;
    }

    public function getAuthor(): ?Tuser
    {
        return $this->author;
    }

    public function setAuthor(?Tuser $author): self
    {
        $this->author = $author;

        return $this;
    }
}
