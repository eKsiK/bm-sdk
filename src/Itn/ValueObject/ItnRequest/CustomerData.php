<?php

namespace BlueMedia\Itn\ValueObject\ItnRequest;

use BlueMedia\Serializer\SerializableInterface;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "fName",
 *      "lName",
 *      "streetName",
 *      "streetHouseNo",
 *      "streetStaircaseNo",
 *      "streetPremiseNo",
 *      "postalCode",
 *      "city",
 *      "nrb",
 *      "senderData"
 * })
 */
class CustomerData implements SerializableInterface
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $fName;
    /**
     * @var string|null
     * @Type("string")
     */
    private $lName;
    /**
     * @var string|null
     * @Type("string")
     */
    private $streetName;
    /**
     * @var string|null
     * @Type("string")
     */
    private $streetHouseNo;
    /**
     * @var string|null
     * @Type("string")
     */
    private $streetStaircaseNo;
    /**
     * @var string|null
     * @Type("string")
     */
    private $streetPremiseNo;
    /**
     * @var string|null
     * @Type("string")
     */
    private $postalCode;
    /**
     * @var string|null
     * @Type("string")
     */
    private $city;
    /**
     * @var string|null
     * @Type("string")
     */
    private $nrb;
    /**
     * @var string|null
     * @Type("string")
     */
    private $senderData;

    public function getFName(): ?string
    {
        return $this->fName;
    }

    public function getLName(): ?string
    {
        return $this->lName;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function getStreetHouseNo(): ?string
    {
        return $this->streetHouseNo;
    }

    public function getStreetStaircaseNo(): ?string
    {
        return $this->streetStaircaseNo;
    }

    public function getStreetPremiseNo(): ?string
    {
        return $this->streetPremiseNo;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getNrb(): ?string
    {
        return $this->nrb;
    }

    public function getSenderData(): ?string
    {
        return $this->senderData;
    }
}
