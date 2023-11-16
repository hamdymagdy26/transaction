<?php

namespace App\Interfaces;

interface TransactionInterface
{
    public function index($data);

    public function store($data);

    public function show($id);

    public function update($id, $data);
    
    public function destroy($id);
}