<?php



namespace App\Document;

use DateTime;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'visitor')]
class Visitor
{

  #[ODM\Id]
  protected string $id;


  #[ODM\Field(type: 'string')]
  protected string $session_id;

  #[ODM\Field(type: 'string')]
  protected string $ip_address;

  #[ODM\Field(type: 'date')]
  protected DateTime $visited_at;

  #[ODM\Field(type: 'string')]
  protected string $language;

  #[ODM\Field(type: 'string')]
  protected string $user_agent;


  public function getId(): ?string
  {
    return $this->id;
  }


  public function getSessionId(): ?string
  {
    return $this->session_id;
  }

  public function setSessionId(string $session_id): self
  {
    $this->session_id = $session_id;

    return $this;
  }

  public function getIpAddress(): ?string
  {
    return $this->ip_address;
  }

  public function setIpAddress(string $ip_address): self
  {
    $this->ip_address = $ip_address;

    return $this;
  }

  public function getVisitedAt(): ?DateTime
  {
    return $this->visited_at;
  }

  public function setVisitedAt(DateTime $visited_at): self
  {
    $this->visited_at = $visited_at;

    return $this;
  }

  public function getLanguage(): ?string
  {
    return $this->language;
  }

  public function setLanguage(string $language): self
  {
    $this->language = $language;

    return $this;
  }
  public function getUserAgent(): ?string
  {
    return $this->user_agent;
  }

  public function setUserAgent(string $user_agent): self
  {
    $this->user_agent = $user_agent;

    return $this;
  }
}
