<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Graphql\Resolver;

use GraphQL\Type\Definition\ResolveInfo;

abstract class AbstractFieldResolver implements FieldResolverInterface
{
    final public function supports(ResolveInfo $resolveInfo): bool
    {
        return $this->isSupportedField("{$resolveInfo->parentType->name}.{$resolveInfo->fieldName}");
    }

    abstract protected function isSupportedField(string $field): bool;
}
