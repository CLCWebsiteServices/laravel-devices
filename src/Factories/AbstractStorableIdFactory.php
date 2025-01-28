<?php

namespace Ninja\DeviceTracker\Factories;

use Ninja\DeviceTracker\Contracts\StorableId;

/** @phpstan-consistent-constructor */
abstract class AbstractStorableIdFactory
{
    /** @var array<class-string<AbstractStorableIdFactory>, AbstractStorableIdFactory> */
    protected static array $instances = [];

    private function __construct() {}

    public static function instance(): self
    {
        $class = static::class;
        if (! isset(self::$instances[$class])) {
            self::$instances[$class] = new static;
        }

        return self::$instances[$class];
    }

    public static function generate(): StorableId
    {
        $idClass = self::instance()->getIdClass();

        return $idClass::build();
    }

    public static function from(string $id): ?StorableId
    {
        $idClass = self::instance()->getIdClass();

        return $idClass::from($id);
    }

    abstract protected function getIdClass(): string;
}
