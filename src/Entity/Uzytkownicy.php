<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UzytkownicyRepository")
 */
class Uzytkownicy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imie;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataDodaniaZadania;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getDataDodaniaZadania(): ?\DateTimeInterface
    {
        return $this->dataDodaniaZadania;
    }

    public function setDataDodaniaZadania(\DateTimeInterface $dataDodaniaZadania): self
    {
        $this->dataDodaniaZadania = $dataDodaniaZadania;

        return $this;
    }
}
