<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Breeds $breed = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Livings $living = null;

    /**
     * @var Collection<int, VeterinariansReports>
     */
    #[ORM\OneToMany(targetEntity: VeterinariansReports::class, mappedBy: 'animal')]
    private Collection $veterinariansReports;

    /**
     * @var Collection<int, EmployeesReports>
     */
    #[ORM\OneToMany(targetEntity: EmployeesReports::class, mappedBy: 'animal')]
    private Collection $employeesReports;

    #[ORM\Column]
    private ?int $consultation = null;

    #[ORM\Column(nullable: true)]
    private ?array $consultation_ip = null;



    public function __construct()
    {
        $this->veterinariansReports = new ArrayCollection();
        $this->employeesReports = new ArrayCollection();
    }

    public function __tostring(): string
    {
        return $this->name;
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getBreed(): ?Breeds
    {
        return $this->breed;
    }

    public function setBreed(?Breeds $breed): static
    {
        $this->breed = $breed;

        return $this;
    }

    public function getLiving(): ?Livings
    {
        return $this->living;
    }

    public function setLiving(?Livings $living): static
    {
        $this->living = $living;

        return $this;
    }

    /**
     * @return Collection<int, VeterinariansReports>
     */
    public function getVeterinariansReports(): Collection
    {
        return $this->veterinariansReports;
    }

    public function addVeterinariansReport(VeterinariansReports $veterinariansReport): static
    {
        if (!$this->veterinariansReports->contains($veterinariansReport)) {
            $this->veterinariansReports->add($veterinariansReport);
            $veterinariansReport->setAnimal($this);
        }

        return $this;
    }

    public function removeVeterinariansReport(VeterinariansReports $veterinariansReport): static
    {
        if ($this->veterinariansReports->removeElement($veterinariansReport)) {
            // set the owning side to null (unless already changed)
            if ($veterinariansReport->getAnimal() === $this) {
                $veterinariansReport->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmployeesReports>
     */
    public function getEmployeesReports(): Collection
    {
        return $this->employeesReports;
    }

    public function addEmployeesReport(EmployeesReports $employeesReport): static
    {
        if (!$this->employeesReports->contains($employeesReport)) {
            $this->employeesReports->add($employeesReport);
            $employeesReport->setAnimal($this);
        }

        return $this;
    }

    public function removeEmployeesReport(EmployeesReports $employeesReport): static
    {
        if ($this->employeesReports->removeElement($employeesReport)) {
            // set the owning side to null (unless already changed)
            if ($employeesReport->getAnimal() === $this) {
                $employeesReport->setAnimal(null);
            }
        }

        return $this;
    }

    public function getConsultation(): ?int
    {
        return $this->consultation;
    }

    public function setConsultation(int $consultation): static
    {
        $this->consultation = $consultation;

        return $this;
    }

    public function getConsultationIp(): ?array
    {
        return $this->consultation_ip;
    }

    public function setConsultationIp(?array $consultation_ip): static
    {
        $this->consultation_ip = $consultation_ip;

        return $this;
    }
}
