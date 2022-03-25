<?php

return [
    // rosterのスクレイプ先URLの設定で使用する定数
    'UrlTeams' => [
        'buf', 'nwe', 'mia', 'nyj',  // AFC東地区
        'cin', 'pit', 'cle', 'rav',  // AFC北地区
        'oti', 'clt', 'htx', 'jax',  // AFC南地区
        'kan', 'rai', 'sdg', 'den',  // AFC西地区
        'dal', 'phi', 'was', 'nyg',  // NFC東地区
        'gnb', 'min', 'chi', 'det',  // NFC北地区
        'tam', 'nor', 'atl', 'car',  // NFC南地区
        'ram', 'crd', 'sfo', 'sea',  // NFC西地区
    ],
    // Teamsテーブルの拠点名称
    'City' => [
        'Buffalo', 'New England', 'Miami', 'New York',          // AFC東地区
        'Cincinnati', 'Pittsburgh', 'Cleveland', 'Baltimore',   // AFC北地区
        'Tennessee', 'Indianapolis', 'Houston', 'Jacksonville', // AFC南地区
        'Kansas City', 'Las Vegas', 'Los Angeles', 'Denver',    // AFC西地区
        'Dallas', 'Philadelphia', 'Washington', 'New York',     // NFC東地区
        'Green Bay', 'Minnesota', 'Chicago', 'Detroit',         // NFC北地区
        'Tampa Bay', 'New Orleans', 'Atlanta', 'Carolina',      // NFC南地区
        'Los Angeles', 'Arizona', 'San Francisco', 'Seattle',   // NFC西地区
    ],
    // Teamsテーブルのチーム名称
    'TeamName' => [
        'Bills', 'Patriots', 'Dolphins', 'Jets',        // AFC東地区
        'Bengals', 'Steelers', 'Browns', 'Ravens',      // AFC北地区
        'Titans', 'Colts', 'Texans', 'Jaguars',         // AFC南地区
        'Chiefs', 'Raiders', 'Chargers', 'Broncos',     // AFC西地区
        'Cowboys', 'Eagles', 'Commanders', 'Giants',    // NFC東地区
        'Packers', 'Vikings', 'Bears', 'Lions',         // NFC北地区
        'Buccaneers', 'Saints', 'Falcons', 'Panthers',  // NFC南地区
        'Rams', 'Cardinals', '49ers', 'Seahawks',       // NFC西地区
    ]
];