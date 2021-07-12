<?php

declare(strict_types=1);

namespace BlueMedia\RegulationList\Dto;

use BlueMedia\Common\ValueObject\AbstractValueObject;
use JMS\Serializer\Annotation\Type;
use BlueMedia\Common\Dto\AbstractDto;
use BlueMedia\RegulationList\ValueObject\RegulationList;

final class RegulationListDto extends AbstractDto
{
    /**
     * @var RegulationList
     * @Type("BlueMedia\RegulationList\ValueObject\RegulationList")
     */
    private $regulationList;

    public function getRegulationList(): RegulationList
    {
        return $this->regulationList;
    }

    public function getRequestData(): AbstractValueObject
    {
        return $this->getRegulationList();
    }
}
