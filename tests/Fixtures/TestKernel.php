<?php

namespace Darsyn\ClassFinder\Tests\Fixtures;


use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * @author Zander Baldwin <hello@zanderbaldwin.com>
 */
class TestKernel extends Kernel
{
    /**
     * Constructor
     * Override the Kernel constructor to force no required parameters for the ClassFinder tests.
     *
     * @access public
     * @param string $environment
     * @param bool $debug
     */
    public function __construct(string $environment = 'dev', bool $debug = true)
    {
        parent::__construct($environment, $debug);

        $this->environment = $environment;
        $this->debug = (bool) $debug;
    }

    /**
     * Register Bundles
     *
     * @access public
     * @return array
     */
    public function registerBundles(): iterable
    {
        return [
            new Bundle\TestBundle,
        ];
    }

    /**
     * Register Container Configuration
     *
     * @access public
     * @param \Symfony\Component\Config\Loader\LoaderInterface $loader
     * @return void
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
    }

    /**
     * Get Cache Directory
     *
     * @access public
     * @return string
     */
    public function getCacheDir(): string
    {
        return sys_get_temp_dir();
    }

    /**
     * Get Logs Directory
     *
     * @access public
     * @return string
     */
    public function getLogDir(): string
    {
        return sys_get_temp_dir();
    }
}
