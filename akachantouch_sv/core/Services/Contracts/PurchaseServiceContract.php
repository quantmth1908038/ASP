<?php

namespace Core\Services\Contracts;

interface PurchaseServiceContract
{
    public function store($request);
    public function platformCheck($data);
    public function receiptCheck($receipt);
    public function signatureCheck($signature);
    public function isPurchased();
}
