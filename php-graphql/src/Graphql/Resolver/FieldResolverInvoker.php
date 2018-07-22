<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Graphql\Resolver;

use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Argument;

class FieldResolverInvoker
{
    /** @var FieldResolverInterface[] */
    private $resolvers = [];

    /**
     * @param FieldResolverInterface[] $resolvers
     */
    public function setResolvers(array $resolvers): void
    {
        $this->resolvers = $resolvers;
    }

    public function __invoke($value, Argument $args, \ArrayObject $context, ResolveInfo $info)
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($info)) {
                return $resolver->resolve($args, $context);
            }
        }

        throw new \LogicException(sprintf('No field resolver found for "%s"', implode('.', $info->path)));
    }
}
