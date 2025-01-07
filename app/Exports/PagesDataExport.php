<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\{DB};


class PagesDataExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return DB::table('web_pages')->where('is_deleted', 'No')->get();
    }
    public function headings(): array
    {
        return ['ID', 'Page Name', 'Page Title', 'Page Content', 'Slug', 'Keywords', 'H1 Tag', 'Meta Tags', 'Page Status', 'Page URL', 'Is Deleted', 'Last Updated By', 'Creatd On', 'Last Update On'];
    }
}