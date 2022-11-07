<?php

namespace Darsyn\ClassFinder\Tests;

use Darsyn\ClassFinder\MultiClassFinder;

/**
 * @author Zander Baldwin <hello@zanderbaldwin.com>
 */
class MultiClassFinderTest extends ArrayContentsAssertion
{
    /**
     * Get Locations
     *
     * @access protected
     * @return array
     */
    protected function getLocations()
    {
        return [
            __NAMESPACE__ . '\\Fixtures\\Bundle\\Controllers' => __DIR__ . '/Fixtures/Bundle/Controllers',
            __NAMESPACE__ . '\\Fixtures\\Bundle\\Entity' => __DIR__ . '/Fixtures/Bundle/Entity',
        ];
    }

    /**
     * Initialisation
     *
     * @test
     * @access public
     * @return void
     */
    public function initialisation()
    {
        $finder = new MultiClassFinder;
        $this->assertCount(0,  $finder->getLocations());
    }

    /**
     * Constructor Locations
     *
     * @test
     * @access public
     * @return void
     */
    public function constructorLocations()
    {
        $finder = new MultiClassFinder($this->getLocations());
        $this->assertCount(2,  $finder->getLocations());
    }

    /**
     * Set Locations
     *
     * @test
     * @access public
     * @return void
     */
    public function setLocations()
    {
        $finder = new MultiClassFinder;
        $this->assertCount(0,  $finder->getLocations());
        $finder->setLocations($this->getLocations());
        $this->assertCount(2,  $finder->getLocations());
    }

    /**
     * Add Locations
     *
     * @test
     * @access public
     * @return void
     */
    public function addLocations()
    {
        $finder = new MultiClassFinder;
        $locations = $this->getLocations();
        $i = 0;
        foreach ($locations as $namespace => $location) {
            $this->assertCount($i,  $finder->getLocations());
            $finder->addLocation($namespace, $location);
            $i++;
        }
        $this->assertCount(count($locations),  $finder->getLocations());
    }

    /**
     * Classes Are Found
     *
     * @test
     * @access public
     * @return void
     */
    public function classesAreFound()
    {
        $finder = new MultiClassFinder($this->getLocations());
        $this->assertSameArrayContents([
            'Darsyn\\ClassFinder\\Tests\\Fixtures\\Bundle\\Controllers\\SecondaryController',
            'Darsyn\\ClassFinder\\Tests\\Fixtures\\Bundle\\Controllers\\DefaultController',
            'Darsyn\\ClassFinder\\Tests\\Fixtures\\Bundle\\Entity\\MyEntity',
        ], $finder->findClasses());
    }
}
