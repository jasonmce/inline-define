<?php
/**
 * simple-inline-define.php
 *
 * Most basic version of inline-text replacement class.  Later I will expand
 * this into a more useful set of classes and features.
 *
 */



/**
 * InlineDefine class
 *
 * An object which will replace terms in a string with their definitions
 * as supplied, which may include dom wrapped strings with various html
 * attributes to be used separately.
 */
class InlineDefine
{
    /**
     * Returns text with all terms replaced by their decorated forms.
     *
     * @param string $text  Text to be updated.
     * @param array  $terms Array of term => wrapped text. The wrapped text
     *     can include anything the user wants, including html or javascript.
     *
     * @return string The original text, after text replacement.
     */
    public function getDecoratedText($text = null, $terms = null)
    {
        foreach ($terms as $term => $definition) {
            $text = preg_replace("/\b($term)\b/", $definition, $text);
        }
        return $text;
    }
}

