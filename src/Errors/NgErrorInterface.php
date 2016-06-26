<?php
/**
 * Errors Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Errors;

/**
 * Errors Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
interface NgErrorInterface
{
    // extracting the errors into a simple key:value array (associative)
    // could be nested, only return an error that available for public users
    public function toArray();

    // extracting the errors into a simple key:value array (associative)
    // could be nested, but it is specially return the complete errors
    // message, detail as a trace to the developer
    public function toDev();
}
