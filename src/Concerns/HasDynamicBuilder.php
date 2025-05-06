<?php

namespace Bjnstnkvc\BuilderMakeCommand\Concerns;

trait HasDynamicBuilder
{
    /**
     * Boot the dynamic builder trait for a model.
     *
     * @return void
     */
    public static function bootHasDynamicBuilder(): void
    {
        $model     = basename(__CLASS__);
        $namespace = config('builder.namespace');
        $builder   = "$namespace\\{$model}Builder";

        if (!class_exists($builder)) {
            return;
        }

        self::$builder = $builder;
    }
}
