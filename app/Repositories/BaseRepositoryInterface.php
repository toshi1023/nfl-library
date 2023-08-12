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
    
    /**
     * TeamRepository
     */
    public function teamRepository();

    /**
     * RosterRepository
     */
    public function rosterRepository();
}