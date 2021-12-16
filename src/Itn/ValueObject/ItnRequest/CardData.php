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
    protected $index;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $validityYear;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $validityMonth;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $issuer;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $bin;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $mask;

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
