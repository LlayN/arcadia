<?php



namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'consultation')]
class Consultation
{

  #[ODM\Id]
  protected string $id;

  #[ODM\Field(type: "int")]
  protected int $consultation;

  #[ODM\Field(type: "collection")]
  protected array $consultation_ip = [];

  #[ODM\Field(type: "int")]
  protected int $animal_id;

  public function getId(): ?string
  {
    return $this->id;
  }

  public function getConsultationIp(): array
  {
    return $this->consultation_ip;
  }

  public function setConsultationIp(array $consultation_ip): static
  {
    $this->consultation_ip = $consultation_ip;

    return $this;
  }

  public function getConsultation(): int
  {
    return $this->consultation;
  }

  public function setConsultation(int $consultation): static
  {
    $this->consultation = $consultation;

    return $this;
  }

  public function getAnimalId(): int
  {
    return $this->animal_id;
  }

  public function setAnimalId(int $animal_id): static
  {
    $this->animal_id = $animal_id;

    return $this;
  }
}
