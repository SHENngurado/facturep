<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Model\Factura;

class FacturasLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $facturas = Factura::orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        return view('components.facturas-layout')->with([
            'facturas'=>$facturas
            ]);
    }
}
