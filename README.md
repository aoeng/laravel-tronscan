## 懂的人都懂 =-=

laravel >=7
``` 
composer require aoeng/laravel-tronscan

php artisan vendor:publish --tag=tronscan
```



```injectablephp
Tron::setAddress(config('tronscan.wallet.address'));
Tron::setPrivateKey(config('tronscan.wallet.private_key'));
```
