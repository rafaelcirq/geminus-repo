<?php

namespace App\Presenters;

use App\Transformers\SemestresTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SemestresPresenter.
 *
 * @package namespace App\Presenters;
 */
class SemestresPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SemestresTransformer();
    }
}
