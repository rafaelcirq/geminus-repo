<?php

namespace App\Presenters;

use App\Transformers\MatrizesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MatrizesPresenter.
 *
 * @package namespace App\Presenters;
 */
class MatrizesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MatrizesTransformer();
    }
}
