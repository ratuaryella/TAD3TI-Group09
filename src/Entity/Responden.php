<?php

namespace App\Entity;

use App\Repository\RespondenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RespondenRepository::class)
 */
class Responden
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
     * @ORM\Column(type="integer")
     */
    private $umur;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $jk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pendidikan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pekerjaan;

    /**
     * @ORM\ManyToOne(targetEntity=Layanan::class, inversedBy="respondens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $layanan;

    /**
     * @ORM\OneToMany(targetEntity=Jawaban::class, mappedBy="responden")
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

    public function getNama(): ?string
    {
        return $this->nama;
    }

    public function setNama(string $nama): self
    {
        $this->nama = $nama;

        return $this;
    }

    public function getUmur(): ?int
    {
        return $this->umur;
    }

    public function setUmur(int $umur): self
    {
        $this->umur = $umur;

        return $this;
    }

    public function getJk(): ?string
    {
        return $this->jk;
    }

    public function setJk(string $jk): self
    {
        $this->jk = $jk;

        return $this;
    }

    public function getPendidikan(): ?string
    {
        return $this->pendidikan;
    }

    public function setPendidikan(string $pendidikan): self
    {
        $this->pendidikan = $pendidikan;

        return $this;
    }

    public function getPekerjaan(): ?string
    {
        return $this->pekerjaan;
    }

    public function setPekerjaan(string $pekerjaan): self
    {
        $this->pekerjaan = $pekerjaan;

        return $this;
    }

    public function getLayanan(): ?Layanan
    {
        return $this->layanan;
    }

    public function setLayanan(?Layanan $layanan): self
    {
        $this->layanan = $layanan;

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
            $jawaban->setResponden($this);
        }

        return $this;
    }

    public function removeJawaban(Jawaban $jawaban): self
    {
        if ($this->jawabans->removeElement($jawaban)) {
            // set the owning side to null (unless already changed)
            if ($jawaban->getResponden() === $this) {
                $jawaban->setResponden(null);
            }
        }

        return $this;
    }
}
