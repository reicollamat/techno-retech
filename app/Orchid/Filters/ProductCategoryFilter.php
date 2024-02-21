<?php

namespace App\Orchid\Filters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductCategoryFilter extends Filter
{
    /**
     * The displayable name of the filter.
     */
    public function name(): string
    {
        return __('Category');
    }

    /**
     * The array of matched parameters.
     */
    public function parameters(): ?array
    {
        return ['product_category'];
    }

    /**
     * Apply to a given Eloquent query builder.
     */
    public function run(Builder $builder): Builder
    {
        return $builder->where('category', $this->request->get('product_category'));
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function display(): iterable
    {
        return [
            Select::make('product_category')
                ->fromModel(Product::class, 'category', 'category')
                ->empty()
                ->value($this->request->get('product_category'))
                ->title(__('Category')),
        ];
    }
}
