<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Graphql\Resolver;

use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Argument;

interface FieldResolverInterface
{
    public function supports(ResolveInfo $resolveInfo): bool;

    public function resolve(Argument $args, \ArrayObject $context);
}
