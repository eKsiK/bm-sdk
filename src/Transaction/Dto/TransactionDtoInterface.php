<?php

declare(strict_types=1);

namespace BlueMedia\Transaction\Dto;

use BlueMedia\Transaction\ValueObject\Transaction;

interface TransactionDtoInterface
{
    public function getTransaction(): Transaction;

    public function getHtmlFormLanguage(): string;

    public function setHtmlFormLanguage(string $htmlFormLanguage): TransactionDto;
}
