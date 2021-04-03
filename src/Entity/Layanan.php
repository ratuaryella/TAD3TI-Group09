<?php

namespace App\Entity;

use App\Repository\LayananRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LayananRepository::class)
 */
class Layanan
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
    private $nama;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deskripsi;

    /**
     * @ORM\ManyToOne(targetEntity=Instansi::class, inversedBy="layanans")
     * @ORM\JoinColumn(nullable=false)
     */
    private $instansi;

    /**
     * @ORM\OneToMany(targetEntity=Responden::class, mappedBy="layanan")
     */
    private $respondens;

    public function __construct()
    {
        $this->respondens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNama(): ?string
    {
        return $this->nama;
    }

    public function setNama(string $nama): self
    {
        $this->nama = $nama;

        return $this;
    }

    public function getDeskripsi(): ?string
    {
        return $this->deskripsi;
    }

    public function setDeskripsi(?string $deskripsi): self
    {
        $this->deskripsi = $deskripsi;

        return $this;
    }

    public function getInstansi(): ?Instansi
    {
        return $this->instansi;
    }

    public function setInstansi(?Instansi $instansi): self
    {
        $this->instansi = $instansi;

        return $this;
    }

    /**
     * @return Collection|Responden[]
     */
    public function getRespondens(): Collection
    {
        return $this->respondens;
    }

    public function addResponden(Responden $responden): self
    {
        if (!$this->respondens->contains($responden)) {
            $this->respondens[] = $responden;
            $responden->setLayanan($this);
        }

        return $this;
    }

    public function removeResponden(Responden $responden): self
    {
        if ($this->respondens->removeElement($responden)) {
            // set the owning side to null (unless already changed)
            if ($responden->getLayanan() === $this) {
                $responden->setLayanan(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nama;
    }
}
