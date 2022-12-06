<?php

namespace WeDesignIt\ParcelPro\Exceptions;

use Throwable;

class ParcelProException extends \Exception
{

    protected array $codes = [
        4  => 'Given status not valid',
        7  => 'Unknown country',
        8  => 'Invalid sender address',
        9  => 'Invalid address', // Address unknown at postcode.nl
        11 => 'Invalid user',
        12 => 'API key invalid or not provided',
        13 => 'No carriers configured for user',
        31 => 'Invalid sender postal code',
        41 => 'Invalid signature hash',
        51 => 'Invalid type',
        71 => 'Invalid country',
    ];

    public function __construct(
        int $code = 0,
        Throwable $previous = null
    ) {
        $message = $this->codes[$code] ?? 'Unknown error';
        parent::__construct($message, $code, $previous);
    }
}
