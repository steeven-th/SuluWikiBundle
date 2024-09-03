<?php

declare(strict_types=1);

namespace ItechWorld\SuluWikiBundle\Content\Types;

use PHPCR\NodeInterface;
use Sulu\Component\Content\Compat\PropertyInterface;
use Sulu\Component\Content\SimpleContentType;

class HighLight extends SimpleContentType
{
    public function __construct()
    {
        parent::__construct('highlight');
    }
}
