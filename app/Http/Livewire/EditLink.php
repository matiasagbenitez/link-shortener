<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;

class EditLink extends Component
{
    public $link_id;
    public $url;
    public $slug;
    public $is_enabled;

    protected $rules = [
        'url' => 'required|url|max:255',
        'slug' => 'required|alpha_dash|min:3|max:100',
        'is_enabled' => 'required|boolean'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount(Link $link)
    {
        $this->link_id = $link->id;
        $this->url = $link->url;
        $this->slug = $link->slug;
        $this->is_enabled = $link->is_enabled;
    }

    public function saveLink()
    {
        $link = Link::findOrFail($this->link_id);

        if ($this->checkSlugExists()) {
            return $this->addError('slug', 'This slug is already taken.');
        }

        $link->update($this->validate());
        return redirect()->route('links');
    }

    public function checkSlugExists()
    {
        $link = Link::where('slug', $this->slug)->first();
        return $link && $link->id !== $this->link_id;
    }

    public function render()
    {
        return view('livewire.edit-link');
    }
}
