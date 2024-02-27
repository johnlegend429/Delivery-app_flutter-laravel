<?php

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CategoriesOfMarketCriteria.
 *
 * @package namespace App\Criteria\Categories;
 */
class CategoriesOfMarketCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $request;

    /**
     * CategoriesOfMarketCriteria constructor.
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
        if (!$this->request->has('market_id')) {
            return $model;
        } else {
            $id = $this->request->get('market_id');
            return $model->join('products', 'products.category_id', '=', 'categories.id')
                ->where('products.market_id', $id)
                ->select('categories.*')
                ->groupBy('categories.id');
        }
    }
}
