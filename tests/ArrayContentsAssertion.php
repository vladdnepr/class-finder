<?php
namespace Darsyn\ClassFinder\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Array Contents Assertion
 *
 * @author Zander Baldwin <hello@zanderbaldwin.com>
 */
class ArrayContentsAssertion extends TestCase
{
    /**
     * Asserts that two arrays have the same contents as each other, without the order (keys) being of importance.
     *
     * @static
     * @access public
     * @param array $expected
     * @param array $actual
     * @param string $message
     * @return void
     */
    public static function assertSameArrayContents(array $expected, array $actual, $message = '')
    {
        $actualResult = array_merge(
            array_diff($expected, $actual),
            array_diff($actual, $expected)
        );
        self::assertThat($actualResult, self::isEmpty(), $message);
    }
}
