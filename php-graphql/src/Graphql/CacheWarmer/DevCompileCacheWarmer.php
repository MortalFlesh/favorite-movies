<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Graphql\CacheWarmer;

use Overblog\GraphQLBundle\CacheWarmer\CompileCacheWarmer;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @TODO remove after https://github.com/overblog/GraphQLPhpGenerator/issues/24 is resolved
 */
class DevCompileCacheWarmer extends CompileCacheWarmer
{
    public function warmUp($cacheDir)
    {
        parent::warmUp($cacheDir);

        (new Filesystem())->chmod($cacheDir, 0777, 0, true);
    }
}
