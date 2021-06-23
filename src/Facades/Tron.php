<?php

namespace Aoeng\Laravel\Tronscan\Facades;

use Aoeng\Laravel\Tronscan\Tronscan;
use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static Tronscan full(string $fullNode)
 * @method static Tronscan solidity(string $solidityNode)
 * @method static Tronscan event(string $eventServer)
 * @method static Tronscan sign(string $signServer)
 * @method static Tronscan explorer(string $explorer)
 * @method static Tronscan key(string $privateKey)
 * @method static mixed createAccount()
 * @method static mixed freezeBalance(float $amount = 0, int $duration = 3, string $resource = 'BANDWIDTH', string $owner_address = null)
 * @method static mixed fromHex(string $address)
 * @method static mixed toHex(string $address)
 * @method static mixed generateAddress()
 * @method static mixed getBalance(string $address = null, bool $fromTron = false)
 * @method static mixed getContractBalance(string $address, string $tokenID)
 * @method static mixed getAccount(string $address = null)
 * @method static mixed getAddress()
 * @method static mixed getTransactionCount()
 * @method static mixed getTokenBalance(int $tokenId, string $address, bool $fromTron = false)
 * @method static mixed getBlock($block = null)
 * @method static mixed getBlockByNumber(int $blockID)
 * @method static mixed getCurrentBlock()
 * @method static mixed getLatestBlocks(int $limit = 1)
 * @method static mixed getTransaction(string $transactionID)
 * @method static mixed getTransactionsFromAddress(string $address, int $limit = 30, int $offset = 0)
 * @method static mixed isAddress(string $address = null)
 * @method static mixed setPrivateKey(string $privateKey)
 * @method static mixed setAddress(string $address)
 * @method static mixed sendRawTransaction($signedTransaction)
 * @method static mixed sendTransaction(string $to, float $amount, string $message = null, string $from = null)
 * @method static mixed sendTokenTransaction(string $to, float $amount, int $tokenID = null, string $from = null)
 * @method static mixed sendToken(string $to, int $amount, string $tokenID, string $from = null)
 * @method static mixed sendTRC20TokenTransaction(string $to, float $amount, $tokenID = null, $from = null)
 * @method static mixed unfreezeBalance(string $resource = 'BANDWIDTH', string $owner_address = null)
 *
 */
class Tron extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'tron';
    }

}
