<?php

namespace App\Model\Entity;

class Character
{
    private ?int    $id;
    private ?int $marvel_id;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->marvel_id = $data['marvel_id'] ?? null;
    }

    public function getMarvelId()
    {
        return $this->marvel_id;
    }
}