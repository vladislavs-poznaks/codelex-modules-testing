<?php


use App\Account\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function it_deposits_amount()
    {
        $account = new Account();

        $account
            ->withCurrentTime("16-03-2022")
            ->deposit(100);

        $this->assertEquals("16-03-2022 | +100 | 100", $account->getStatement());
    }

    /** @test */
    public function it_withdraws_amount()
    {
        $account = new Account();

        $account
            ->withCurrentTime("16-03-2022")
            ->deposit(100);

        $account
            ->withCurrentTime("18-03-2022")
            ->withdraw(50);

        $expectedStatement = implode(PHP_EOL, [
            "16-03-2022 | +100 | 100",
            "18-03-2022 | -50 | 50",
        ]);

        $this->assertEquals($expectedStatement, $account->getStatement());
    }

    /** @test */
    public function it_does_not_withdraw_amount_that_is_larger_than_available()
    {
        $account = new Account();

        $account
            ->withCurrentTime("16-03-2022")
            ->deposit(100);

        $account
            ->withCurrentTime("18-03-2022")
            ->withdraw(150);

        $expectedStatement = implode(PHP_EOL, [
            "16-03-2022 | +100 | 100",
        ]);

        $this->assertEquals($expectedStatement, $account->getStatement());
    }
}
