<?php

namespace Spatie\EventSourcing\Tests\TestClasses\Events;

use Illuminate\Queue\SerializesModels;
use Spatie\EventSourcing\ShouldBeStored;
use Spatie\EventSourcing\Tests\TestClasses\Models\Account;

class MoneyAddedEvent implements ShouldBeStored
{
    use SerializesModels;

    public object $account;

    public int $amount;

    public function __construct(Account $account, int $amount)
    {
        $this->account = $account;

        $this->amount = $amount;
    }

    public function tags(): array
    {
        return [
            'Account:'.$this->account->id,
            self::class,
        ];
    }
}
