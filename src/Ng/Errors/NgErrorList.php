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
class NgErrorList implements \Countable
{
    private $ngErrors;

    public function getError($errorNumber)
    {
        if (isset($this->ngErrors[$errorNumber])) {
            return $this->ngErrors[$errorNumber];
        }

        return null;
    }

    public function AddError(NgErrorInterface $ngErrorInterface)
    {
        $this->ngErrors[] = $ngErrorInterface;
    }

    public function removeError(NgErrorInterface $ngErrorInterface)
    {
        foreach ($this->ngErrors as $index => $error) {
            if ($ngErrorInterface === $error) {
                unset($this->ngErrors[$index]);
            }
        }
    }

    public function count()
    {
        return count($this->ngErrors);
    }
}
