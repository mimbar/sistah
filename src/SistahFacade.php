<?php

namespace Mimbar\Sistah;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mimbar\Sistah\Skeleton\SkeletonClass
 */
class SistahFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sistah';
    }
}
