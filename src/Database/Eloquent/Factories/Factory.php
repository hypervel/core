<?php

declare(strict_types=1);

namespace SwooleTW\Hyperf\Database\Eloquent\Factories;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Database\Model\Factory as BaseFactory;

class Factory extends BaseFactory
{
    /**
     * Define a class with a given set of attributes.
     *
     * @param string $class
     * @return $this
     */
    public function define($class, callable $attributes, ?string $name = null)
    {
        $name = $name ?: $this->getConnection();

        return parent::define($class, $attributes, $name);
    }

    /**
     * Define a callback to run after making a model.
     *
     * @param string $class
     * @return $this
     */
    public function afterMaking($class, callable $callback, ?string $name = null)
    {
        $name = $name ?: $this->getConnection();

        return parent::afterMaking($class, $callback, $name);
    }

    /**
     * Define a callback to run after creating a model.
     *
     * @param string $class
     * @return $this
     */
    public function afterCreating($class, callable $callback, ?string $name = null)
    {
        $name = $name ?: $this->getConnection();

        return parent::afterCreating($class, $callback, $name);
    }

    /**
     * Get the raw attribute array for a given model.
     *
     * @param string $class
     */
    public function raw($class, array $attributes = [], ?string $name = null): array
    {
        $name = $name ?: $this->getConnection();

        return parent::raw($class, $attributes, $name);
    }

    /**
     * Create a builder for the given model.
     *
     * @param string $class
     * @return \Hyperf\Database\Model\FactoryBuilder
     */
    public function of($class, ?string $name = null)
    {
        $name = $name ?: $this->getConnection();

        return parent::of($class, $name)
            ->connection($name);
    }

    protected function getConnection(): string
    {
        return ApplicationContext::getContainer()
            ->get(ConfigInterface::class)
            ->get('database.default');
    }
}
