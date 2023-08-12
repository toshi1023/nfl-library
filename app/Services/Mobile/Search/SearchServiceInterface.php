<?php

namespace App\Services\Mobile\Search;

interface SearchServiceInterface
{
    /**
     * チームの検索情報を取得
     */
    public function getTeamList() : array;
    
    /**
     * ロスターに存在するシーズンの検索情報を取得
     */
    public function getSeasonList() : array;
}