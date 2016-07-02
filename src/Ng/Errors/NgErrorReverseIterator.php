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
namespace Ng\Errors;


/**
 * Errors Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/ngerrors
 */
class NgErrorReverseIterator implements \Iterator
{
    private $ngErrors;

    protected $currentError = 0;

    public function __construct(NgErrorList $ngErrors)
    {
        $this->ngErrors     = $ngErrors;
        $this->currentError = $this->ngErrors->count() - 1;
    }

    public function current()
    {
        return $this->ngErrors->getError($this->currentError);
    }

    public function next()
    {
        $this->currentError--;
    }

    public function key()
    {
        return $this->currentError;
    }

    public function valid()
    {
        return null !== $this->ngErrors->getError($this->currentError);
    }

    public function rewind()
    {
        $this->currentError = $this->ngErrors->count() - 1;
    }

}
