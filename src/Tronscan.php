<?php


namespace Aoeng\Laravel\Tronscan;


use IEXBase\TronAPI\Exception\TronException;
use IEXBase\TronAPI\Provider\HttpProvider;
use IEXBase\TronAPI\TransactionBuilder;
use IEXBase\TronAPI\Tron;
use IEXBase\TronAPI\TronManager;

class Tronscan extends Tron
{

    private $fullNode;
    private $solidityNode;
    private $eventServer;
    private $signServer;
    private $explorer;

    public function __construct($fullNode = null,
                                $solidityNode = null,
                                $eventServer = null,
                                $signServer = null,
                                $explorer = null,
                                $privateKey = null)
    {

        $this->full($fullNode ?? config('tronscan.host.full'));
        $this->solidity($solidityNode ?? config('tronscan.host.solidity'));
        $this->event($eventServer ?? config('tronscan.host.event'));
        $explorer && $this->explorer($explorer);
        $signServer && $this->sign($signServer);
        $privateKey && $this->setPrivateKey($privateKey);

        $this->setManager(new TronManager($this, [
            'fullNode'     => $this->fullNode,
            'solidityNode' => $this->solidityNode,
            'eventServer'  => $this->eventServer,
            'signServer'   => $this->signServer,
        ]));

        $this->transactionBuilder = new TransactionBuilder($this);
    }


    public function full(string $fullNode): Tronscan
    {
        $this->fullNode = new HttpProvider($fullNode);

        return $this;
    }

    public function solidity(string $solidityNode)
    {
        $this->solidityNode = new HttpProvider($solidityNode);

        return $this;
    }

    public function event(string $eventServer)
    {
        $this->eventServer = new HttpProvider($eventServer);

        return $this;
    }

    public function sign(string $signServer)
    {
        $this->signServer = new HttpProvider($signServer);

        return $this;
    }

    public function explorer(string $explorer)
    {
        $this->explorer = new HttpProvider($explorer);

        return $this;
    }

    public function key(string $privateKey)
    {
        $this->privateKey = $privateKey;

        return $this;
    }


    public function sendTRC20TokenTransaction(string $to, float $amount, $tokenID = null, $from = null)
    {
        if (is_null($from)) {
            $from = $this->address['hex'];
        }
        $abi = [
            [
                'name'    => 'transfer',
                'inputs'  => [
                    ['name' => '_to', 'type' => 'address'],
                    ['name' => '_value', 'type' => 'uint256'],
                ],
                'outputs' => [
                    ['name' => '_to', 'type' => 'bool'],
                ]

            ]
        ];
        $contract = $this->toHex($tokenID);
        $params = [
            '0' => $this->address2HexString($to),
            '1' => $this->toTron($amount),
        ];
        $address = $this->address2HexString($from);
        $transaction = $this->transactionBuilder->triggerSmartContract($abi, $contract, 'transfer', $params, config('tronscan.wallet.free_limit'), $address);
        $signedTransaction = $this->signTransaction($transaction);

        $response = $this->sendRawTransaction($signedTransaction);

        return array_merge($response, $signedTransaction);
    }

}
