<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Bar::class)]
    private Collection $bars;

    public function __construct()
    {
        $this->bars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Bar>
     */
    public function getBars(): Collection
    {
        return $this->bars;
    }

    public function addBar(Bar $bar): static
    {
        if (!$this->bars->contains($bar)) {
            $this->bars->add($bar);
            $bar->setCity($this);
        }

        return $this;
    }

    public function removeBar(Bar $bar): static
    {
        if ($this->bars->removeElement($bar)) {
            // set the owning side to null (unless already changed)
            if ($bar->getCity() === $this) {
                $bar->setCity(null);
            }
        }

        return $this;
    }
}
