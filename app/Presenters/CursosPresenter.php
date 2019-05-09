<?php

namespace App\Presenters;

use App\Transformers\CursosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CursosPresenter.
 *
 * @package namespace App\Presenters;
 */
class CursosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CursosTransformer();
    }
}
