<?php

namespace App\Account;

class Account
{
    private ?string $datetime;
    private int $balance;
    private array $transactions = [];

    public function __construct()
    {
        $this->balance = 0;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;

        $this->logTransaction("+{$amount}");
    }

    public function withdraw(int $amount): void
    {
        if ($amount > $this->balance) {
            return;
        }

        $this->balance -= $amount;

        $this->logTransaction("-{$amount}");
    }

    public function logTransaction(string $amount): void
    {
        $this->transactions[] = is_null($this->datetime)
            ? new Transaction($amount, $this->balance)
            : new Transaction($amount, $this->balance, $this->datetime);

        $this->datetime = null;
    }

    public function getStatement(): string
    {
        return implode(PHP_EOL, array_map(function ($transaction) {
            return $transaction->getInfo();
        }, $this->transactions));
    }

    public function withCurrentTime(string $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }
}