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
    protected $fName;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $lName;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $streetName;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $streetHouseNo;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $streetStaircaseNo;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $streetPremiseNo;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $postalCode;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $city;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $nrb;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $senderData;

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
