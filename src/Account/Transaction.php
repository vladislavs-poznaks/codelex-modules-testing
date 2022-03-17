<?php

namespace App\Account;

use Carbon\Carbon;

class Transaction
{
    private string $change;
    private int $balance;
    private ?Carbon $timestamp;

    public function __construct(string $change, int $balance, ?string $datetime = null)
    {
        $this->change = $change;
        $this->balance = $balance;
        $this->timestamp = Carbon::parse($datetime);
    }

    public function getInfo(): string
    {
        return $this->timestamp->format('d-m-Y') . ' | ' . $this->change . ' | ' . $this->balance;
    }
}