<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    public string $href;

    public function __construct(string $href)
    {
        $this->href = $href;
    }

    public function isActive(): bool
    {
        // Compara a URL atual com o link do nav
        return request()->url() === url($this->href);
    }

    public function render()
    {
        return view('components.nav-link');
    }
}
