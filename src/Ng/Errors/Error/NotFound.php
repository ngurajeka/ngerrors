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
class NotFound extends SimpleError implements NgErrorInterface
{
    const NOTFOUND = 404;

    public function __construct($message, $source=null, $stackTrace=null)
    {
        parent::__construct(self::NOTFOUND, $message, $source, $stackTrace);
    }
}
