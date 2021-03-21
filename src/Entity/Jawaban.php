<?php

namespace App\Entity;

use App\Repository\JawabanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JawabanRepository::class)
 */
class Jawaban
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Responden::class, inversedBy="jawabans")
     */
    private $responden;

    /**
     * @ORM\ManyToOne(targetEntity=Pertanyaan::class, inversedBy="jawabans")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pertanyaan;

    /**
     * @ORM\Column(type="integer")
     */
    private $jawaban;

    /**
     * @ORM\Column(type="date")
     */
    private $tanggal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResponden(): ?responden
    {
        return $this->responden;
    }

    public function setResponden(?responden $responden): self
    {
        $this->responden = $responden;

        return $this;
    }

    public function getPertanyaan(): ?pertanyaan
    {
        return $this->pertanyaan;
    }

    public function setPertanyaan(?pertanyaan $pertanyaan): self
    {
        $this->pertanyaan = $pertanyaan;

        return $this;
    }

    public function getJawaban(): ?int
    {
        return $this->jawaban;
    }

    public function setJawaban(int $jawaban): self
    {
        $this->jawaban = $jawaban;

        return $this;
    }

    public function getTanggal(): ?\DateTimeInterface
    {
        return $this->tanggal;
    }

    public function setTanggal(\DateTimeInterface $tanggal): self
    {
        $this->tanggal = $tanggal;

        return $this;
    }
}
