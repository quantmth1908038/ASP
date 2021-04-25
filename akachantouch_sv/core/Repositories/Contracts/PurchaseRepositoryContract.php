<?php

namespace Core\Repositories\Contracts;

interface PurchaseRepositoryContract
{
    public function store($data);
    public function findByTransactionId($transactionId);
    public function findBySignature($signature, $codeSuccess);
    public function isPurchased();
}
