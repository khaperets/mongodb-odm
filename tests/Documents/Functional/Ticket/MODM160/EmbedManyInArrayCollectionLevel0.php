<?php

declare(strict_types=1);

namespace Documents\Functional\Ticket\MODM160;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="embedded_test") */
class EmbedManyInArrayCollectionLevel0
{
    /**
     * @ODM\Id
     *
     * @var string|null
     */
    public $id;
    /**
     * @ODM\Field(type="string")
     *
     * @var string|null
     */
    public $name;

    /**
     * @ODM\EmbedMany(targetDocument=EmbedManyInArrayCollectionLevel1::class)
     *
     * @var Collection<int, EmbedManyInArrayCollectionLevel1>
     */
    public $level1;

    public function __construct()
    {
        $this->level1 = new ArrayCollection();
    }
}
