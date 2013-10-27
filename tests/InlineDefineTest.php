<?php
/**
 * This test class provides basic error checking for the InlineDefine object.
 */

require 'InlineDefine.php';

class InlineDefineTest extends PHPUnit_Framework_TestCase
{
    /**
     * Confirm the constructor returns an object.
     *
     * @return object Returns nothing.
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
        $test_text = "An apple a day beats two pear.";
        $test_terms = array(
          'apple' =>
                '<a href="http://apple.com" title="fiber-tastic fruit">apple</a>',
          'pear' => '<a href="http://pear.com" title="juicy fruit">pear</a>',
        );

        $inline_text = new InlineDefine();
        $result_text = $inline_text->getDecoratedText($test_text, $test_terms);

        $this->assertEquals(
            $result_text,
            'An <a href="http://apple.com" title="fiber-tastic fruit">apple</a> ' .
            'a day beats two <a href="http://pear.com" title="juicy fruit">pear</a>.'
        );
    }

    /**
    * Try the getDecoratedText method as a static object method.
    *
    * @return bool true if result matches expected.
    */
    public function testGetDecoratedTextAsStaticMethod()
    {
        $test_text = "An apple a day beats two pear.";
        $test_terms = array(
          'apple' =>
              '<a href="http://apple.com" title="fiber-tastic fruit">apple</a>',
          'pear' => '<a href="http://pear.com" title="juicy fruit">pear</a>',
        );

        $result_text = InlineDefine::getDecoratedText($test_text, $test_terms);

        $this->assertEquals(
            $result_text,
            'An <a href="http://apple.com" title="fiber-tastic fruit">apple</a> a' .
            ' day beats two <a href="http://pear.com" title="juicy fruit">pear</a>.'
        );
    }

}
