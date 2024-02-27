<?php

namespace App\Criteria\Products;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProductsOfCategoriesCriteria.
 *
 * @package namespace App\Criteria\Products;
 */
class ProductsOfCategoriesCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $request;

    /**
     * ProductsOfFieldsCriteria constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$this->request->has('categories')) {
            return $model;
        } else {
            $categories = $this->request->get('categories');
            if (in_array('0', $categories)) { // means all fields
                return $model;
            }
            return $model->whereIn('category_id', $this->request->get('categories', []));
        }
    }
}
