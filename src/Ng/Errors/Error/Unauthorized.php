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
 * @link     https://github.com/ngurajeka/ngerrors
 */
namespace Ng\Errors\Error;


use Ng\Errors\NgErrorInterface;

/**
 * Errors Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/ngerrors
 */
class Unauthorized extends SimpleError implements NgErrorInterface
{
    const UNAUTHORIZED = 401;

    public function __construct($message, $source=null, $stackTrace=null)
    {
        parent::__construct(self::UNAUTHORIZED, $message, $source, $stackTrace);
    }
}
