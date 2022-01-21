<?php

namespace App\Exports;

use App\Models\API\District;
use App\Models\API\Station;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ConditionExport implements FromView, WithEvents

{    
    /**
    * @var Station $station
    */

    use RegistersEventListeners;

    const arrName = [
        'sat1' => 'Антена 1',
        'sat2' => 'Антена 2',
        'pvr1' => 'Приймач 1',
        'pvr2' => 'Приймач 2',
        'pvr3' => 'Приймач 3',
        'pvr4' => 'Приймач 4',
        'trans1' => 'Передавач МХ1',
        'trans2' => 'Передавач МХ2',
        'trans3' => 'Передавач МХ3',
        'trans4' => 'Передавач МХ5',
        'mux' => 'Мультиплексор',
        'gps1' => 'GPS1',
        'gps2' => 'GPS2',
        'ups' => 'UPS',
        'temp' => 'Темп.',
        'asa' => 'ASA-5505',
        'cisco' => 'Catalist',
        'console' => 'Ком. консолей',
        'server' => 'Сервер',
        'telescaner' => 'Телесканер',
        'reg_channel' => 'Рег. канали',
        'other' => 'Інше',
        'communication' => "Зв\'язок"
    ];

    public function view(): View
    {
        $districts = District::with('stations.params', 'stations.equipments')->get();

        return view('exports.stations', [
            'stations' => $this->prepareData($districts)
        ]);
    }

    protected function prepareData($items){
        $result = [];
        foreach($items as $district){
            if($district->id == 26) continue;
            $result[] = ['name' => $district->name, 'district' => true];
            foreach($district->stations as $station){
                $result[] = [
                    'number' => $station->number,
                    'name' => $station->name,
                    'mx1_only' => $station->params->only_mx1 ?? 0, //
                    'power' => $station->params->power ?? 0,
                    'sat1' => $station->equipments->sat1 ?? null,
                    'sat2' => $station->equipments->sat2 ?? null,
                    'pvr1' => $station->equipments->pvr1 ?? null,
                    'pvr2' => $station->equipments->pvr2 ?? null,
                    'pvr3' => $station->equipments->pvr3 ?? null,
                    'pvr4' => $station->equipments->pvr4 ?? null,
                    'trans1' => $station->equipments->trans1 ?? null,
                    'trans2' => $station->equipments->trans2 ?? null,
                    'trans3' => $station->equipments->trans3 ?? null,
                    'trans4' => $station->equipments->trans4 ?? null,
                    'mux' => $station->equipments->mux ?? null,
                    'gps1' => $station->equipments->gps1 ?? null,
                    'gps2' => $station->equipments->gps2 ?? null,
                    'ups' => $station->equipments->ups ?? null,
                    'temp' => $station->equipments->temp ?? null,
                    'asa' => $station->equipments->asa ?? null,
                    'cisco' => $station->equipments->cisco ?? null,
                    'console' => $station->equipments->console ?? null,
                    'server' => $station->equipments->server ?? null,
                    'telescaner' => $station->equipments->telescaner ?? null,
                    'reg_channel' => $station->equipments->reg_channel ?? null,
                    'other' => $station->equipments->other ?? null,
                    'communication' => $station->equipments->communication ?? null,
                ];
            }
        }
        return $result;
    }

    public static function afterSheet(AfterSheet $event){

        $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 
            'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA'];

        $border_top_options = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $border_bottom_options = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $border_bottom_thick_options = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                ],
            ],
        ];
        $border_right_thick_options = [
            'borders' => [
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                ],
            ],
        ];
        $border_left_options = [
            'borders' => [
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $border_right_options = [
            'borders' => [
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $active_sheet = $event->sheet->getDelegate();
        // $active_sheet->getParent()->getDefaultStyle()->applyFromArray($border_options);
        $active_sheet->freezePane('A2');
        $active_sheet->getStyle('A1:AA1')->applyFromArray($border_bottom_thick_options);
        // $active_sheet->getStyle('A1:A300')->applyFromArray($border_right_options);
        $active_sheet->getStyle('B1:B300')->applyFromArray($border_right_thick_options);
        

        foreach($letters as $letter){
            if($letter == 'B') continue;
            $active_sheet->getStyle("{$letter}1:{$letter}300")->applyFromArray($border_right_options);
        }
        for($i=2; $i<=300; $i++){
            $active_sheet->getStyle("A{$i}:AA{$i}")->applyFromArray($border_bottom_options);
        }


        $active_sheet->getStyle('C1:Z1')->getAlignment()->setTextRotation(90);
        $active_sheet->getStyle('A1:AA1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFCC99');
    }
}
