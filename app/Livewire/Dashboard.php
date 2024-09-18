<?php

namespace App\Livewire;

use Yajra\DataTables\DataTables;
use App\Models\Quote;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }

    public function datatable()
    {
        return DataTables::of(Quote::query())
            ->addColumn('thumbnail', function ($quote) {
                $thumbnailUrl = asset('storage/' . $quote->thumbnail); 
                return '<img src="' . $thumbnailUrl . '" width="100">';
            })
            ->addColumn('color', function ($quote) {
                return '<div style="background-color: ' . $quote->color . '; width: 100px; height: 30px; border: 1px solid #ddd;"></div>';
            })
            ->addColumn('published', function ($quote) {
                if($quote->published==1)
                {
                    return 'published';
                }else{
                    return 'not published';
                }
            })
            ->rawColumns(['thumbnail','color'])
            ->make(true);
    }
}
