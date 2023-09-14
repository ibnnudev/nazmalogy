<?php

namespace App\Interfaces;

interface PointInterface
{
    public function getAll();
    public function getById($id);
    public function getByUserId($user_id);
}
