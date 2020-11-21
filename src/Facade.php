<?php

namespace Aoeng\LaravelTronscan;

use Illuminate\Support\Facades\Facade  as LaravelFacade;

/**
 * @method static mixed accountBalance(string $address)
 * @method static mixed accountBalanceMulti(string $address)
 * @method static mixed accountTxList(string $address)
 * @method static mixed accountTxListInternal(string $address)
 * @method static mixed accountTokenTx(array $param)
 * @method static mixed accountTokenNftTx(string $address)
 * @method static mixed accountGetMinedBlocks(string $address)
 * @method static mixed statsTokenSupply(string $address)
 * @method static mixed accountTokenBalance(string $contractAddress, string $address)
 *
 */
class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'tronscan';
    }

}
