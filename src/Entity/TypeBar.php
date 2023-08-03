<?php

namespace App\Entity;

use App\Repository\TypeBarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeBarRepository::class)]
class TypeBar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Bar::class, mappedBy: 'typeBar')]
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
            $bar->addTypeBar($this);
        }

        return $this;
    }

    public function removeBar(Bar $bar): static
    {
        if ($this->bars->removeElement($bar)) {
            $bar->removeTypeBar($this);
        }

        return $this;
    }
}
