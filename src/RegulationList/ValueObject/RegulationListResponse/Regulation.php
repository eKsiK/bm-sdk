<?php

declare(strict_types=1);

namespace BlueMedia\RegulationList\ValueObject\RegulationListResponse;

use JMS\Serializer\Annotation\Type;

final class Regulation
{
    /**
     * @var string
     * @Type("string")
     */
    private $regulationID;

    /**
     * @var string
     * @Type("string")
     */
    private $url;

    /**
     * @var string
     * @Type("string")
     */
    private $type;

    /**
     * @var string
     * @Type("string")
     */
    private $language;

    public function getRegulationID(): string
    {
        return $this->regulationID;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
