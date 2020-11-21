<?php


namespace Aoeng\LaravelTronscan;


use IEXBase\TronAPI\Provider\HttpProvider;
use IEXBase\TronAPI\Tron;

class Tronscan
{

    private $fullNode;
    private $solidityNode;
    private $eventServer;
    private $signServer;
    private $explorer;
    private $privateKey;

    public function __construct($fullNode = null,
                                $solidityNode = null,
                                $eventServer = null,
                                $signServer = null,
                                $explorer = null,
                                $privateKey = null)
    {
        $this->fullNode = new HttpProvider($fullNode ?? config('tronscan.host.full'));
        $this->solidityNode = new HttpProvider($solidityNode ?? config('tronscan.host.full'));
        $this->eventServer = new HttpProvider($eventServer ?? config('tronscan.host.full'));
        $this->signServer = $signServer ? new HttpProvider($signServer) : null;
        $this->explorer = $explorer ? new HttpProvider($explorer) : null;
        $this->privateKey = $privateKey;

        return new Tron($this->fullNode, $this->solidityNode, $this->eventServer, $this->signServer, $this->explorer, $this->privateKey);
    }


    public function full(string $fullNode)
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
}
