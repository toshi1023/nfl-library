<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Position;

class UpsertPositions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upsert:position';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ポジション情報を更新
     *
     * @return int
     */
    public function handle()
    {
        $positions = $this->getPositionList();
        foreach($positions as $position) {
            $positionModel = Position::where('name', $position['name'])->first();
            if($positionModel) {
                $this->warn('update position name: '.$position['name'].', category: '.$position['category']);
            } else {
                $positionModel = new Position();
                $this->info('create position name: '.$position['name'].', category: '.$position['category']);
            }
            $positionModel->fill($position)->save();
        }
        $this->info('complete upsert position');
    }

    /**
     * チームデータを配列から取得
     */
    private function getPositionList()
    {
        return [
            /** 
             *  Offence Category
             **/

            // QB
            [
                'abstract_category' => config('const.AbstCate.QB'),
                'category' => config('const.Category.QB'),
                'name' => 'QB',
                'odflg' => true
            ],
            // RB
            [
                'abstract_category' => config('const.AbstCate.RB'),
                'category' => config('const.Category.HB'),
                'name' => 'RB',
                'odflg' => true
            ],
            // HB
            [
                'abstract_category' => config('const.AbstCate.RB'),
                'category' => config('const.Category.HB'),
                'name' => 'HB',
                'odflg' => true
            ],
            // FB
            [
                'abstract_category' => config('const.AbstCate.RB'),
                'category' => config('const.Category.FB'),
                'name' => 'FB',
                'odflg' => true
            ],
            // WR
            [
                'abstract_category' => config('const.AbstCate.WR'),
                'category' => config('const.Category.WR'),
                'name' => 'WR',
                'odflg' => true
            ],
            // WR/RB([saints]Ty Montgomery)
            [
                'abstract_category' => config('const.AbstCate.WR'),
                'category' => config('const.Category.WR'),
                'name' => 'WR/RB',
                'odflg' => true
            ],
            // WR/CB([lions]Jamal Agnew)
            [
                'abstract_category' => config('const.AbstCate.WR'),
                'category' => config('const.Category.WR'),
                'name' => 'WR/CB',
                'odflg' => true
            ],
            // PR([bears]Devin Hester)
            [
                'abstract_category' => config('const.AbstCate.WR'),
                'category' => config('const.Category.WR'),
                'name' => 'PR',
                'odflg' => true
            ],
            // TE
            [
                'abstract_category' => config('const.AbstCate.TE'),
                'category' => config('const.Category.TE'),
                'name' => 'TE',
                'odflg' => true
            ],
            // QB/TE([lions]Logan Thomas)
            [
                'abstract_category' => config('const.AbstCate.TE'),
                'category' => config('const.Category.TE'),
                'name' => 'QB/TE',
                'odflg' => true
            ],

            // RG
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.RG'),
                'name' => 'RG',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.RG'),
                'name' => 'RG/RT',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.RG'),
                'name' => 'RG/C',
                'odflg' => true
            ],
            // G
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.RG'),
                'name' => 'G',
                'odflg' => true
            ],
            // LG
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LG'),
                'name' => 'LG',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LG'),
                'name' => 'LG/LT',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LG'),
                'name' => 'LG/C',
                'odflg' => true
            ],
            // OG
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LG'),
                'name' => 'OG',
                'odflg' => true
            ],

            // RT
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.ROT'),
                'name' => 'RT',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.ROT'),
                'name' => 'RT/LT',
                'odflg' => true
            ],
            // OT
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.ROT'),
                'name' => 'OT',
                'odflg' => true
            ],
            // LT
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LOT'),
                'name' => 'LT',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LOT'),
                'name' => 'LT/RT',
                'odflg' => true
            ],
            // T
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LOT'),
                'name' => 'T',
                'odflg' => true
            ],
            // G,T([patriots]Marshall Newhouse)
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.LOT'),
                'name' => 'G,T',
                'odflg' => true
            ],

            // C
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'C',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'C/RG',
                'odflg' => true
            ],
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'C/LG',
                'odflg' => true
            ],
            // OL
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'OL',
                'odflg' => true
            ],
            // G/C
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'G/C',
                'odflg' => true
            ],
            // G,C
            [
                'abstract_category' => config('const.AbstCate.OL'),
                'category' => config('const.Category.C'),
                'name' => 'G,C',
                'odflg' => true
            ],

            
            /** 
             *  Defence Category
             **/

            // RDT
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDT'),
                'name' => 'RDT',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDT'),
                'name' => 'RDT/RDE',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDT'),
                'name' => 'RDT/LDT',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDT'),
                'name' => 'RDT/LDE',
                'odflg' => false
            ],
            // DT
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDT'),
                'name' => 'DT',
                'odflg' => false
            ],
            // LDT
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDT'),
                'name' => 'LDT',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDT'),
                'name' => 'LDT/LDE',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDT'),
                'name' => 'LDT/RDT',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDT'),
                'name' => 'LDT/RDE',
                'odflg' => false
            ],
            // DL
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDT'),
                'name' => 'DL',
                'odflg' => false
            ],
            // NT
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.NT'),
                'name' => 'NT',
                'odflg' => false
            ],

            // RDE
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDE'),
                'name' => 'RDE',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDE'),
                'name' => 'RDE/LDE',
                'odflg' => false
            ],
            // RE
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDE'),
                'name' => 'RE',
                'odflg' => false
            ],
            // EDGE([49ers]Nick Bosa)
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.RDE'),
                'name' => 'EDGE',
                'odflg' => false
            ],
            // LDE
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDE'),
                'name' => 'LDE',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDE'),
                'name' => 'LDE/RDE',
                'odflg' => false
            ],
            // LE
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDE'),
                'name' => 'LE',
                'odflg' => false
            ],
            // DE
            [
                'abstract_category' => config('const.AbstCate.DL'),
                'category' => config('const.Category.LDE'),
                'name' => 'DE',
                'odflg' => false
            ],

            // MLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'MLB',
                'odflg' => false
            ],
            // IL
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'IL',
                'odflg' => false
            ],
            // ILB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'ILB',
                'odflg' => false
            ],
            // RILB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'RILB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'RILB/LILB',
                'odflg' => false
            ],
            // LILB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'LILB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.MLB'),
                'name' => 'LILB/RILB',
                'odflg' => false
            ],
            // RLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'RLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'RLB/LLB',
                'odflg' => false
            ],
            // ROLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'ROLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'ROLB/LOLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'ROLB/LILB',
                'odflg' => false
            ],
            // OLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'OLB',
                'odflg' => false
            ],
            // DT/LB([bills]Lorenzo Alexander)
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.RLB'),
                'name' => 'DT/LB',
                'odflg' => false
            ],
            // LLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LLB/RLB',
                'odflg' => false
            ],
            // LOLB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LOLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LOLB/ROLB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LOLB/RILB',
                'odflg' => false
            ],
            // LB
            [
                'abstract_category' => config('const.AbstCate.LB'),
                'category' => config('const.Category.LLB'),
                'name' => 'LB',
                'odflg' => false
            ],

            // RCB
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.RCB'),
                'name' => 'RCB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.RCB'),
                'name' => 'RCB/LCB',
                'odflg' => false
            ],
            // CB
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.RCB'),
                'name' => 'CB',
                'odflg' => false
            ],
            // LCB
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.LCB'),
                'name' => 'LCB',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.LCB'),
                'name' => 'LCB/RCB',
                'odflg' => false
            ],
            // DB
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.LCB'),
                'name' => 'DB',
                'odflg' => false
            ],
            
            // SS
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.SS'),
                'name' => 'SS',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.SS'),
                'name' => 'SS/FS',
                'odflg' => false
            ],
            // S
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.SS'),
                'name' => 'S',
                'odflg' => false
            ],
            // FS
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.FS'),
                'name' => 'FS',
                'odflg' => false
            ],
            [
                'abstract_category' => config('const.AbstCate.DB'),
                'category' => config('const.Category.FS'),
                'name' => 'FS/SS',
                'odflg' => false
            ],


            /** 
             *  Special Category
             **/
            // K
            [
                'abstract_category' => config('const.AbstCate.K'),
                'category' => config('const.Category.K'),
                'name' => 'K',
                'odflg' => true
            ],
            // P
            [
                'abstract_category' => config('const.AbstCate.K'),
                'category' => config('const.Category.P'),
                'name' => 'P',
                'odflg' => true
            ],
            // LS
            [
                'abstract_category' => config('const.AbstCate.LS'),
                'category' => config('const.Category.LS'),
                'name' => 'LS',
                'odflg' => true
            ],
            // LS,TE
            [
                'abstract_category' => config('const.AbstCate.LS'),
                'category' => config('const.Category.LS'),
                'name' => 'LS,TE',
                'odflg' => true
            ],

            // ポジション情報が無い場合
            [
                'abstract_category' => config('const.AbstCate.NOTHING'),
                'category' => config('const.Category.NOTHING'),
                'name' => 'No Data',
                'odflg' => true
            ]
        ];
    }
}
