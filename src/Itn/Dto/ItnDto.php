<?php

declare(strict_types=1);

namespace BlueMedia\Itn\Dto;

use BlueMedia\Common\Dto\AbstractDto;
use BlueMedia\Common\ValueObject\AbstractValueObject;
use BlueMedia\Itn\ValueObject\Itn;
use BlueMedia\Serializer\SerializableInterface;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

final class ItnDto extends AbstractDto implements SerializableInterface
{
    /**
     * @var Itn
     * @Type("BlueMedia\Itn\ValueObject\Itn")
     * @XmlList(inline = true, entry = "transaction")
     */
    private $itn;

    public function getItn(): Itn
    {
        return $this->itn;
    }

    public function getRequestData(): AbstractValueObject
    {
        return $this->getItn();
    }
}
