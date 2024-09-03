<?php

namespace ItechWorld\SuluWikiBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sulu\Component\Persistence\Model\AuditableInterface;
use Sulu\Component\Persistence\Model\AuditableTrait;
use Sulu\Component\Persistence\Model\TimestampableTrait;

#[ORM\Entity]
#[ORM\Table(name: 'iw_wiki_code_block')]
class CodeBlock implements AuditableInterface
{
    use AuditableTrait;
    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $codeBlock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeBlock(): ?string
    {
        return $this->codeBlock;
    }

    public function setCodeBlock(?string $codeBlock): void
    {
        $this->codeBlock = $codeBlock;
    }
}
