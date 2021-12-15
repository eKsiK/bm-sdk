<?php

namespace BlueMedia\Itn\ValueObject\ItnRequest;

use BlueMedia\Serializer\SerializableInterface;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "index",
 *      "validityYear",
 *      "validityMonth",
 *      "issuer",
 *      "bin",
 *      "mask"
 * })
 */
class CardData implements SerializableInterface
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $index;

    /**
     * @var string|null
     * @Type("string")
     */
    private $validityYear;

    /**
     * @var string|null
     * @Type("string")
     */
    private $validityMonth;

    /**
     * @var string|null
     * @Type("string")
     */
    private $issuer;

    /**
     * @var string|null
     * @Type("string")
     */
    private $bin;

    /**
     * @var string|null
     * @Type("string")
     */
    private $mask;

    public function getIndex(): ?string
    {
        return $this->index;
    }

    public function getValidityYear(): ?string
    {
        return $this->validityYear;
    }

    public function getValidityMonth(): ?string
    {
        return $this->validityMonth;
    }

    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    public function getBin(): ?string
    {
        return $this->bin;
    }

    public function getMask(): ?string
    {
        return $this->mask;
    }
}
