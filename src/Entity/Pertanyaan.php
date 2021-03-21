<?php

namespace App\Entity;

use App\Repository\PertanyaanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PertanyaanRepository::class)
 */
class Pertanyaan
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
    private $pertanyaan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deskripsi;

    /**
     * @ORM\OneToMany(targetEntity=Jawaban::class, mappedBy="pertanyaan")
     */
    private $jawabans;

    public function __construct()
    {
        $this->jawabans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPertanyaan(): ?string
    {
        return $this->pertanyaan;
    }

    public function setPertanyaan(string $pertanyaan): self
    {
        $this->pertanyaan = $pertanyaan;

        return $this;
    }

    public function getDeskripsi(): ?string
    {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): self
    {
        $this->deskripsi = $deskripsi;

        return $this;
    }

    /**
     * @return Collection|Jawaban[]
     */
    public function getJawabans(): Collection
    {
        return $this->jawabans;
    }

    public function addJawaban(Jawaban $jawaban): self
    {
        if (!$this->jawabans->contains($jawaban)) {
            $this->jawabans[] = $jawaban;
            $jawaban->setPertanyaan($this);
        }

        return $this;
    }

    public function removeJawaban(Jawaban $jawaban): self
    {
        if ($this->jawabans->removeElement($jawaban)) {
            // set the owning side to null (unless already changed)
            if ($jawaban->getPertanyaan() === $this) {
                $jawaban->setPertanyaan(null);
            }
        }

        return $this;
    }
}
