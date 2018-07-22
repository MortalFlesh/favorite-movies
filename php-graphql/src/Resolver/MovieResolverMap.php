<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Resolver;

use MF\FavoriteMovies\GraphQL\Graphql\Resolver\FieldResolverInvoker;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

class MovieResolverMap extends ResolverMap
{
    /** @var FieldResolverInvoker */
    private $fieldResolverInvoker;

    public function __construct(FieldResolverInvoker $fieldResolverInvoker)
    {
        $this->fieldResolverInvoker = $fieldResolverInvoker;
    }

    protected function map()
    {
        return [
            'MovieQuery' => [static::RESOLVE_FIELD => $this->fieldResolverInvoker],
            'Movie' => [static::RESOLVE_FIELD => $this->fieldResolverInvoker],
            //'WidgetMutation' => [static::RESOLVE_FIELD => $this->fieldResolverInvoker],
            //'WidgetMutations' => [static::RESOLVE_FIELD => $this->fieldResolverInvoker],
        ];
    }
}
