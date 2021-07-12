<?php

declare(strict_types=1);

namespace BlueMedia\Transaction\Dto;

use BlueMedia\Common\Dto\AbstractDto;
use BlueMedia\Common\ValueObject\AbstractValueObject;
use BlueMedia\Serializer\SerializableInterface;
use BlueMedia\Transaction\ValueObject\Transaction;
use JMS\Serializer\Annotation\Type;

final class TransactionDto extends AbstractDto implements TransactionDtoInterface
{
    /**
     * @var Transaction
     * @Type("BlueMedia\Transaction\ValueObject\Transaction")
     */
    private $transaction;

    /**
     * Language used in html form with redirect to BlueMedia paywall.
     *
     * @var string
     */
    private $htmlFormLanguage = 'pl';

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

    public function getHtmlFormLanguage(): string
    {
        return $this->htmlFormLanguage;
    }

    /**
     * @return TransactionDto
     */
    public function setHtmlFormLanguage(string $htmlFormLanguage): self
    {
        $this->htmlFormLanguage = $htmlFormLanguage;

        return $this;
    }

    public function getRequestData(): AbstractValueObject
    {
        return $this->getTransaction();
    }
}
