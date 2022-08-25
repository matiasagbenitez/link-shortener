<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class LinkTable extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $links = Link::where('user_id', auth()->user()->id)
            ->where('url', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.link-table', compact('links'));
    }
}
