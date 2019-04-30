<?php

namespace App\Presenters;

use App\Transformers\DisciplinasTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DisciplinasPresenter.
 *
 * @package namespace App\Presenters;
 */
class DisciplinasPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DisciplinasTransformer();
    }
}
