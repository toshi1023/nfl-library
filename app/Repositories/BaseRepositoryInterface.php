<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * UserRepository
     */
    public function userRepository();

    /**
     * FoulRuleRepository
     */
    public function foulRuleRepository();

    /**
     * PlayerRepository
     */
    public function playerRepository();
}