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
class NgErrors
{
    protected $ngerrors = array();

    /**
     * Append Error(s) that implemented NgErrorInterface
     *
     * @param NgErrorInterface ...$ngErrorInterface error that implement NgErrorInterface
     *
     * @return void
     */
    public function append(NgErrorInterface ...$ngErrorInterfaces)
    {
        if (empty($ngErrorInterfaces)) {
            return;
        }

        $append = function ($error) {
            if ($error instanceOf NgErrorInterface) {
                $this->ngerrors[] = $error;
            }
        };

        array_walk($ngErrorInterfaces, $append);
    }

    /**
     * Merge NgErrors
     *
     * @param NgErrors $ngerrors Errors Module
     *
     * @return void
     */
    public function merge(NgErrors $ngErrors)
    {
        if ($ngErrors->isEmpty()) {
            return;
        }

        foreach ($ngErrors->getNgErrors() as $ngError) {
            $this->append($ngError);
        }
    }

    /**
     * Flush Errors. We set to empty errors
     *
     * @return void
     */
    public function flush()
    {
        $this->ngerrors = array();
    }

    /**
     * Clean Errors. We unset (remove) empty error.
     *
     * @param bool $sort et to resort the array
     *
     * @return void
     */
    public function clean($sort=true)
    {
        $errors = $this->getNgErrors();
        $clean  = function (NgErrorInterface $ngerror) {
            if (empty($ngerror->toArray())) {
                unset($ngerror);
            }
        };

        array_walk($errors, $clean);

        if ($sort === true) {
            sort($errors);
        }

        $this->ngerrors = $errors;
    }

    /**
     * Check If NgErrors is empty or not
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->ngerrors);
    }

    /**
     * Get the ngerrors attribute
     *
     * @return array
     */
    public function getNgErrors()
    {
        return $this->ngerrors;
    }

    /**
     * Extract the errors as an array
     *
     * @return array
     */
    public function toArray()
    {
        $errors         = array();
        foreach ( $this->getNgErrors() as $ngerror ) {
            /** @type NgErrorInterface $ngerror */
            $errors[]   = $ngerror->toArray();
        }

        return $errors;
    }

}
