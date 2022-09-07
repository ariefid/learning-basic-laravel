<?php

namespace App\Enums;

/**
 * WARNING!!! Enum casting is only available for PHP 8.1+.
 * The Todostate attribute.
 *
 * @var string
 */
enum TodoState: string
{
    case DRAFT = 'draft';
    case PUBLISH = 'publish';
}
