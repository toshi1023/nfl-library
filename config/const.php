<?php

return [
    'app_env' => env('APP_ENV'),

    // batch実行のseasonを指定
    'Season' => 2020,

    // 身長・体重計算値
    'Calc' => [
        'Weight' => 0.45,
        'Feet'   => 30.48,
        'Inch'   => 2.54
    ],
    // rosterのスクレイプ先URLの設定で使用する定数
    'TeamIds' => [
        'buf' => 1, 'nwe' => 2, 'mia' => 3, 'nyj' => 4,  // AFC東地区
        'cin' => 5, 'pit' => 6, 'cle' => 7, 'rav' => 8,  // AFC北地区
        'oti' => 9, 'clt' => 10, 'htx' => 11, 'jax' => 12,  // AFC南地区
        'kan' => 13, 'rai' => 14, 'sdg' => 15, 'den' => 16,  // AFC西地区
        'dal' => 17, 'phi' => 18, 'was' => 19, 'nyg' => 20,  // NFC東地区
        'gnb' => 21, 'min' => 22, 'chi' => 23, 'det' => 24,  // NFC北地区
        'tam' => 25, 'nor' => 26, 'atl' => 27, 'car' => 28,  // NFC南地区
        'ram' => 29, 'crd' => 30, 'sfo' => 31, 'sea' => 32,  // NFC西地区
    ],
    // チームIDを取得する
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
    // teamsテーブルの拠点名称
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
    // teamsテーブルのチーム名称
    'TeamName' => [
        'Bills', 'Patriots', 'Dolphins', 'Jets',        // AFC東地区
        'Bengals', 'Steelers', 'Browns', 'Ravens',      // AFC北地区
        'Titans', 'Colts', 'Texans', 'Jaguars',         // AFC南地区
        'Chiefs', 'Raiders', 'Chargers', 'Broncos',     // AFC西地区
        'Cowboys', 'Eagles', 'Commanders', 'Giants',    // NFC東地区
        'Packers', 'Vikings', 'Bears', 'Lions',         // NFC北地区
        'Buccaneers', 'Saints', 'Falcons', 'Panthers',  // NFC南地区
        'Rams', 'Cardinals', '49ers', 'Seahawks',       // NFC西地区
    ],
    // positionsテーブルのカテゴリ
    'Category' => [
        'QB' => 1, 'HB' => 2, 'FB' => 3, 'WR' => 4, 'TE' => 5, 'RG' => 6, 'LG' => 7, 'ROT' => 8, 'LOT' => 9, 'C' => 10,                 // Offence Category
        'RDT' => 11, 'LDT' => 12, 'NT' => 13, 'RDE' => 14, 'LDE' => 15, 'MLB' => 16, 'RLB' => 17, 'LLB' => 18,                          // Deffece Category
        'RCB' => 19, 'LCB' => 20, 'SS' => 21, 'FS' => 22,                                                                               // Deffece Category
        'K' => 23, 'P' => 24, 'LS' => 25,                                                                                               // Special Category
        'NOTHING' => 99
    ],
    // positionsテーブルの抽象カテゴリ
    'AbstCate' => [
        'QB' => 1, 'RB' => 2, 'WR' => 3, 'TE' => 4, 'OL' => 5,          // Offence Category
        'DL' => 6, 'LB' => 7, 'DB' => 8,                                // Deffece Category
        'K' => 9, 'LS' => 10,                                           // Special Category
        'NOTHING' => 99
    ],
    // formationsテーブルのodflg
    'ODflg' => [
        'offence' => true,
        'defence' => false
    ],
    // formation_id
    'Formationid' => [
        'T' => 1, 'I' => 2, 'SSB' => 3, 'SF' => 4, 'PSFH' => 5, 'PSHH' => 6, 'SG' => 7, 'PF' => 8, 'WB' => 9, 
        'FBW4' => 10, 'FBWT' => 11, 'WT' => 12, 'EB' => 13, 'SW' => 14, 'WF' => 15, 
        '3-4' => 16, '4-3' => 17, '4-4' => 18, '5-2' => 19, 'Nickel_LCB' => 20, 'Nickel_RCB' => 21, 'Dime' => 22, '46' => 23,
        '1-6-4' => 24, '2-4-5' => 25, '3-7-1' => 26, '3-6-2' => 27, '4-6-1' => 28, '4-5-2' => 29, '5-5-1' => 30, 
        '5-4-2' => 31, '6-4-1' => 32, '6-3-2' => 33, '3-3-5' => 34,
        'SSB_TE' => 35, 'I_TE' => 36
    ],
    // Maddenのナンバリング紐づけ
    'Madden' => [
        '2012' => 13, '2013' => 25, '2014' => 15, '2015' => 16, '2016' => 17, 
        '2017' => 18, '2018' => 19, '2019' => 20, '2020' => 21, '2021' => 22,
        '2022' => 23, '2023' => 24
    ],
    // foul_rulesのstatus_type
    'FoulRules' => [
        'common'  => 0,
        'offence' => 1,
        'defence' => 2,
        'kick'    => 3,
        'all'     => 99
    ],
    // 所属カンファレンス
    'Conference' => [
        'afc' => 1,     // AFC
        'nfc' => 2      // NFC
    ],
    // 所属地区
    'Area' => [
        'e' => 1,       // 東地区
        'n' => 2,       // 北地区
        's' => 3,       // 南地区
        'w' => 4        // 西地区
    ],

    // メールアドレス
    'RootMailAddress' => env('ROOT_MAIL_ADDRESS'),
    // パスワード
    'RootPassword'    => env('ROOT_PASSWORD'),

    // AWS S3バケット
    // 'Url'           => env('AWS_BUCKET_URL'),
    'Url'           => storage_path('app/public'),
    // AWS S3フォルダ
    'Player'        => 'Player',
    'Team'          => 'Team',
    'Logo'          => 'Logo',          // teamsのimage_file
    'Background'    => 'Background',    // teamsのback_image_file

    // httpステータス
    'Success'           => 200,
    'ServerError'       => 500,
    'ValidationError'   => 400,
    'Unauthorized'      => 401,


    // User関連で使用する定数
    'User' => [
        'ADMIN_ID'      => 1,
        'MEMBER'        => 1,
        'UNSUBSCRIBE'   => 2,
        'ADMIN'         => 3,
        'STOP'          => 4,
        'MEMBER_WORD'        => '会員',
        'UNSUBSCRIBE_WORD'   => '退会済み',
        'ADMIN_WORD'         => '管理者',
        'STOP_WORD'          => 'アカウント停止中',
        'MAN'           => 0,
        'WOMAN'         => 1,
        'GET_ERR'            => 'ユーザ情報を取得出来ませんでした',
        'SEARCH_ERR'         => '指定したユーザは存在しません',
        'REGISTER_INFO'      => 'ユーザ情報を登録しました',
        'REGISTER_ERR'       => 'ユーザ情報の登録に失敗しました',
        'DELETE_INFO'        => '退会が完了しました',
        'DELETE_ERR'         => 'サーバーエラーにより退会に失敗しました。管理者にお問い合わせください'
    ],

    // Player関連で使用する定数
    'Player' => [
        'GET_ERR'            => '選手情報を取得出来ませんでした',
        'SEARCH_ERR_SEASON'  => '指定したシーズンは存在しません',
        'SEARCH_ERR_TEAM'    => '指定したチームは存在しません',
        'REGISTER_INFO'      => '選手情報を登録しました',
        'REGISTER_ERR'       => '選手情報の登録に失敗しました'
    ],

    // システムメッセージで使用する定数
    'SystemMessage' => [
        'LOGIN_INFO'         => 'ログインに成功しました',
        'LOGOUT_INFO'        => 'ログアウトしました',
        'CHECK_INFO'         => 'ログイン中です',
        'CHECK_ERR'          => 'すでにログアウトされています',
        'SYSTEM_ERR'         => 'システム障害が発生しました。内容は次の通りです。 → ',
        'UNAUTHORIZATION'    => 'ログイン権限がありません',
        'LOGIN_ERR'          => 'メールアドレスもしくはパスワードが一致しません',
        'UNEXPECTED_ERR'     => '予期しないエラーが発生しました。管理者にお問い合わせください',
        'VALIDATE_STATUS'    => 'OK',
        'SEND_EMAIL_INFO'    => 'パスワード再設定メールを送信しました',
        'SEND_EMAIL_ERR'     => 'パスワード再設定メールを送信できませんでした',
        'RESET_PASSWORD_INFO'   => 'パスワードの再設定が完了しました',
        'RESET_PASSWORD_ERR'    => 'パスワードの再設定に失敗しました',
        'SLACK_LOG_WARN'        => 'LOGにエラー内容が出力されました。内容: '
    ],
];