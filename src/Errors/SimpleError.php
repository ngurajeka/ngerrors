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
class SimpleError implements NgErrorInterface
{
    protected $code;
    protected $message;

    protected $source;
    protected $stackTrace;

    public function __construct($code, $message, $source=null, $stackTrace=null)
    {
        $this->code     = $code;
        $this->message  = $message;
        $this->source   = $source;

        $this->stackTrace   = $stackTrace;
    }

    /**
     * Get the error code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the error message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the source of the error
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get the stack trace value
     *
     * @return mixed
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }

    /**
     * Extract the errors into an array. Satisfying the interface
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            "code"      => $this->getCode(),
            "message"   => $this->getMessage(),
        );
    }

    /**
     * Extract the dev errors into an array. Satisfying the interface
     *
     * @return array
     */
    public function toDev()
    {
        return array(
            "source"        => $this->getSource(),
            "stackTrace"    => $this->getStackTrace(),
        );
    }
}
