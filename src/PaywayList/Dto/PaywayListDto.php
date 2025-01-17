<?php

declare(strict_types=1);

namespace BlueMedia\PaywayList\Dto;

use BlueMedia\Common\Dto\AbstractDto;
use BlueMedia\Common\ValueObject\AbstractValueObject;
use JMS\Serializer\Annotation\Type;
use BlueMedia\PaywayList\ValueObject\PaywayList;

final class PaywayListDto extends AbstractDto
{
    /**
     * @var PaywayList
     * @Type("BlueMedia\PaywayList\ValueObject\PaywayList")
     */
    private $paywayList;

    public function getPaywayList(): PaywayList
    {
        return $this->paywayList;
    }

    public function getRequestData(): AbstractValueObject
    {
        return $this->getPaywayList();
    }
}
