<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function index($data);

    public function store($data);
}