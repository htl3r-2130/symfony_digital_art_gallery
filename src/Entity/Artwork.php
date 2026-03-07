<?php

namespace App\Entity;

use App\Repository\ArtworkRepository;
use BcMath\Number;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtworkRepository::class)]
#[ORM\Index(name: 'idx_title', columns: ['title'])]
#[ORM\Index(name: 'idx_creation_date', columns: ['creation_date'])]
class Artwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $creationDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $imagePath = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?Artist $artist = null;

    /**
     * @var Collection<int, VirtualTours>
     */
    #[ORM\ManyToMany(targetEntity: VirtualTours::class, mappedBy: 'artworks')]
    private Collection $virtualTours;

    public function __construct()
    {
        $this->virtualTours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTime $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return Collection<int, VirtualTours>
     */
    public function getVirtualTours(): Collection
    {
        return $this->virtualTours;
    }

    public function addVirtualTour(VirtualTours $virtualTour): static
    {
        if (!$this->virtualTours->contains($virtualTour)) {
            $this->virtualTours->add($virtualTour);
            $virtualTour->addArtwork($this);
        }

        return $this;
    }

    public function removeVirtualTour(VirtualTours $virtualTour): static
    {
        if ($this->virtualTours->removeElement($virtualTour)) {
            $virtualTour->removeArtwork($this);
        }

        return $this;
    }
}
