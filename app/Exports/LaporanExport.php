<?php

namespace App\Exports;

use App\Models\Document;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanExport implements FromView,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // Tampilan yang akan dirender ke Excel
        return view('exports.data', [
            'data' => Document::get(),
        ]);
    }

    public function registerEvents(): array
    {

        $verti_center = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
        );
        
        return [
            AfterSheet::class    => function (AfterSheet $event) use ($verti_center) {
                $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K']; // All headers

                for ($x = 'A'; $x <= 'ZZ'; $x++) {

                    if (in_array($x, ['A'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['B'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['C'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['D'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['E'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['F'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['G','H','I','J'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }
                    if (in_array($x, ['K','L','M'])) {
                        $event->sheet->getDelegate()->getColumnDimension($x)->setWidth(20);
                        $event->sheet->getDelegate()->getStyle($x)->getAlignment()->setWrapText(true); // Set wrap text for column G
                    }

                }

                 // Middle align vertically
                $event->sheet->getDelegate()->getStyle('A1:K' . $event->sheet->getDelegate()->getHighestRow())
                ->applyFromArray($verti_center);

            },
        ];
    }
}
