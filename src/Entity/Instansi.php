<?php

namespace App\Entity;

use App\Repository\InstansiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstansiRepository::class)
 */
class Instansi
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
    private $alamat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomor_kontak;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nama_pimpinan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tingkat;

    /**
     * @ORM\OneToMany(targetEntity=Layanan::class, mappedBy="instansi")
     */
    private $layanans;

    public function __construct()
    {
        $this->layanans = new ArrayCollection();
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

    public function getAlamat(): ?string
    {
        return $this->alamat;
    }

    public function setAlamat(?string $alamat): self
    {
        $this->alamat = $alamat;

        return $this;
    }

    public function getNomorKontak(): ?string
    {
        return $this->nomor_kontak;
    }

    public function setNomorKontak(string $nomor_kontak): self
    {
        $this->nomor_kontak = $nomor_kontak;

        return $this;
    }

    public function getNamaPimpinan(): ?string
    {
        return $this->nama_pimpinan;
    }

    public function setNamaPimpinan(?string $nama_pimpinan): self
    {
        $this->nama_pimpinan = $nama_pimpinan;

        return $this;
    }

    public function getTingkat(): ?string
    {
        return $this->tingkat;
    }

    public function setTingkat(string $tingkat): self
    {
        $this->tingkat = $tingkat;

        return $this;
    }

    /**
     * @return Collection|Layanan[]
     */
    public function getLayanans(): Collection
    {
        return $this->layanans;
    }

    public function addLayanan(Layanan $layanan): self
    {
        if (!$this->layanans->contains($layanan)) {
            $this->layanans[] = $layanan;
            $layanan->setInstansi($this);
        }

        return $this;
    }

    public function removeLayanan(Layanan $layanan): self
    {
        if ($this->layanans->removeElement($layanan)) {
            // set the owning side to null (unless already changed)
            if ($layanan->getInstansi() === $this) {
                $layanan->setInstansi(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nama;
    }

}
