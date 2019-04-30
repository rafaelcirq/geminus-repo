<?php

namespace App\Presenters;

use App\Transformers\HorariosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HorariosPresenter.
 *
 * @package namespace App\Presenters;
 */
class HorariosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HorariosTransformer();
    }
}
