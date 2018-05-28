<?php

namespace Dhii\Action\UnitTest\Exception;

use Dhii\Action\ActionInterface;
use Dhii\Action\Exception\RunException as TestSubject;
use Xpmock\TestCase;
use Exception as RootException;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_MockObject_MockBuilder as MockBuilder;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class RunExceptionTest extends TestCase
{
    /**
     * The class name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Action\Exception\RunException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param array $methods The methods to mock.
     *
     * @return MockObject|TestSubject The new instance.
     */
    public function createInstance($methods = [], $disableOriginalConstructor = false, $constructorArgs = [])
    {
        is_array($methods) && $methods = $this->mergeValues($methods, [
            '__',
        ]);

        $builder = $this->getMockBuilder(static::TEST_SUBJECT_CLASSNAME)
            ->setMethods($methods);
        $disableOriginalConstructor && $builder->disableOriginalConstructor();
        $mock = $builder->setConstructorArgs($constructorArgs)
            ->getMockForAbstractClass();

        $mock->method('__')
            ->will($this->returnArgument(0));

        return $mock;
    }

    /**
     * Merges the values of two arrays.
     *
     * The resulting product will be a numeric array where the values of both inputs are present, without duplicates.
     *
     * @since [*next-version*]
     *
     * @param array $destination The base array.
     * @param array $source      The array with more keys.
     *
     * @return array The array which contains unique values
     */
    public function mergeValues($destination, $source)
    {
        return array_keys(array_merge(array_flip($destination), array_flip($source)));
    }

    /**
     * Creates a mock that both extends a class and implements interfaces.
     *
     * This is particularly useful for cases where the mock is based on an
     * internal class, such as in the case with exceptions. Helps to avoid
     * writing hard-coded stubs.
     *
     * @since [*next-version*]
     *
     * @param string   $className      Name of the class for the mock to extend.
     * @param string[] $interfaceNames Names of the interfaces for the mock to implement.
     *
     * @return MockBuilder The builder for a mock of an object that extends and implements
     *                     the specified class and interfaces.
     */
    public function mockClassAndInterfaces($className, $interfaceNames = [])
    {
        $paddingClassName = uniqid($className);
        $definition = vsprintf('abstract class %1$s extends %2$s implements %3$s {}', [
            $paddingClassName,
            $className,
            implode(', ', $interfaceNames),
        ]);
        eval($definition);

        return $this->getMockBuilder($paddingClassName);
    }

    /**
     * Creates a mock that uses traits.
     *
     * This is particularly useful for testing integration between multiple traits.
     *
     * @since [*next-version*]
     *
     * @param string[] $traitNames Names of the traits for the mock to use.
     *
     * @return MockBuilder The builder for a mock of an object that uses the traits.
     */
    public function mockTraits($traitNames = [])
    {
        $paddingClassName = uniqid('Traits');
        $definition = vsprintf('abstract class %1$s {%2$s}', [
            $paddingClassName,
            implode(
                ' ',
                array_map(
                    function ($v) {
                        return vsprintf('use %1$s;', [$v]);
                    },
                    $traitNames)),
        ]);
        var_dump($definition);
        eval($definition);

        return $this->getMockBuilder($paddingClassName);
    }

    /**
     * Creates a new exception.
     *
     * @since [*next-version*]
     *
     * @param string $message The exception message.
     *
     * @return RootException|MockObject The new exception.
     */
    public function createException($message = '')
    {
        $mock = $this->getMockBuilder('Exception')
            ->setConstructorArgs([$message])
            ->getMock();

        return $mock;
    }

    /**
     * Creates a new Action instance.
     *
     * @since [*next-version*]
     *
     * @param array|null $methods The methods to mock.
     *
     * @return MockObject|ActionInterface The new action.
     */
    public function createAction($methods = [])
    {
        is_array($methods) && $methods = $this->mergeValues($methods, [
            'run',
        ]);

        $mock = $this->getMockBuilder('Dhii\Action\ActionInterface')
            ->setMethods($methods)
            ->getMock();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance([], true);

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject, 'A valid instance of the test subject could not be created.');
        $this->assertInstanceOf('Dhii\Action\Exception\ActionAwareExceptionInterface', $subject, 'Subject does not implement required interface.');
    }

    /**
     * Tests whether `__construct()` works as expected.
     *
     * @since [*next-version*]
     */
    public function testConstructor()
    {
        $message = uniqid('message');
        $code = rand(1, 99);
        $previous = $this->createException('Problem while running');
        $action = $this->createAction();
        $subject = $this->createInstance(['_initBaseException', '_setAction', '_construct'], true);
        $_subject = $this->reflect($subject);

        $subject->expects($this->exactly(1))
            ->method('_initBaseException')
            ->with($message, $code, $previous);
        $subject->expects($this->exactly(1))
            ->method('_setAction')
            ->with($action);
        $subject->expects($this->exactly(1))
            ->method('_construct');

        $result = $subject->__construct($message, $code, $previous, $action);
    }
}
