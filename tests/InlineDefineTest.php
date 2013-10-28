<?php
/**
 * This test class provides basic error checking for the InlineDefine object.
 */

require 'InlineDefine.php';

class InlineDefineTest extends PHPUnit_Framework_TestCase
{

    private $_simple_terms
        = array(
            'apple' =>
                '<a href="http://apple.com" title="fiber-tastic fruit">apple</a>',
            'pear' => '<a href="http://pear.com" title="juicy fruit">pear</a>',
          );

    /**
     * Initialize consts to be used across tests.
     *
     * @return Returns nothing.
     */
    public static function setUpBeforeClass()
    {
        define(
            'SIMPLE_SENTENCE',
            'An apple a day beats two pear, just ask the guy with the spears'
        );
        define(
            'EXPECTED_RESULT',
            'An <a href="http://apple.com" title="fiber-tastic fruit">apple</a> ' .
            'a day beats two <a href="http://pear.com" title="juicy fruit">pear</a>, ' .
            'just ask the guy with the spears'
        );
    }

    /**
     * Confirm the constructor returns an object.
     *
     * @return Returns nothing.
     */
    public function testEmptyConstructor()
    {
        $inline_text = new InlineDefine();
        $this->assertNotEmpty($inline_text);
    }

    /**
     * Confirm the getDecoratedText method with a simple test.
     * This should later be replaced with a large textfile and more dynamic
     * set of term => definition pairs, including words within another term's
     * decorated text.
     *
     * @return bool True is test passes.
     */
    public function testGetDecoratedTextSimpleText()
    {
        $inline_text = new InlineDefine();
        $result_text = $inline_text->getDecoratedText(
            SIMPLE_SENTENCE,
            $this->_simple_terms
        );
        $this->assertEquals(
            $result_text,
            EXPECTED_RESULT
        );
    }

    /**
    * Try the getDecoratedText method as a static object method.
    *
    * @return bool true if result matches expected.
    */
    public function testGetDecoratedTextAsStaticMethod()
    {
        $result_text = InlineDefine::getDecoratedText(
            SIMPLE_SENTENCE,
            $this->_simple_terms
        );
        $this->assertEquals(
            $result_text,
            EXPECTED_RESULT
        );
    }

}
