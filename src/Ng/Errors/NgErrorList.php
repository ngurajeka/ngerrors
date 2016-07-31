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

    /**
     * Append Errors
     *
     * @param NgErrorInterface[] $errors
     *
     * @return void
     */
    public function append($errors)
    {
        foreach ($errors as $error) {

            if (!$error instanceOf NgErrorInterface) {
                continue;
            }

            $this->addError($error);
        }
    }

    /**
     * Get Error Object From it's index
     *
     * @param int $errorNumber
     *
     * @return NgErrorInterface
     */
    public function getError($errorNumber)
    {
        if (isset($this->ngErrors[$errorNumber])) {
            return $this->ngErrors[$errorNumber];
        }

        return null;
    }

    /**
     * Add Error to the list
     *
     * @param NgErrorInterface $ngErrorInterface
     *
     * @return void
     */
    public function addError(NgErrorInterface $ngErrorInterface)
    {
        $this->ngErrors[] = $ngErrorInterface;
    }

    /**
     * Remove Error from the list
     *
     * @param NgErrorInterface $ngErrorInterface
     *
     * @return void
     */
    public function removeError(NgErrorInterface $ngErrorInterface)
    {
        foreach ($this->ngErrors as $index => $error) {
            if ($ngErrorInterface === $error) {
                unset($this->ngErrors[$index]);
            }
        }
    }

    /**
     * Mergin another list to our list
     *
     * @param NgErrorList $ngErrorList
     *
     * @return void
     */
    public function merge(NgErrorList $ngErrorList)
    {
        $iterator       = new NgErrorIterator($ngErrorList);
        while ($iterator->valid()) {
            $ngError    = $iterator->current();
            if ($ngError instanceOf NgErrorInterface) {
                $this->ngErrors[] = $ngError;
            }
            $iterator->next();
        }
    }

    /**
     * Count how much error on the list
     *
     * @return int
     */
    public function count()
    {
        return count($this->ngErrors);
    }

    /**
     * Check if the list is empty or not
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->count() == 0;
    }

    /**
     * Return the error as an array, only for public errors
     *
     * @return array
     */
    public function toArray()
    {
        $list       = array();

        if ($this->isEmpty()) {
            return $list;
        }

        foreach ($this->ngErrors as $error) {
            /** @type NgErrorInterface $error */
            $list[] = $error->toArray();
        }

        return $list;
    }

    /**
     * Return the error as an array, only for dev errors
     *
     * @return array
     */
    public function toDev()
    {
        $list       = array();

        if ($this->isEmpty()) {
            return $list;
        }

        foreach ($this->ngErrors as $error) {
            /** @type NgErrorInterface $error */
            $list[] =  $error->toDev();
        }

        return $list;
    }
}
