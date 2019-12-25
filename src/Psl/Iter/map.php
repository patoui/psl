<?php

declare(strict_types=1);

namespace Psl\Iter;

/**
 * Applies a mapping function to all values of an iterator.
 *
 * The function is passed the current iterator value and should return a
 * modified iterator value. The key is left as-is and not passed to the mapping
 * function.
 *
 * Examples:
 *
 *     Iter\map([1, 2, 3, 4, 5], fn($i) => $i * 2);
 *     => Iter(2, 4, 6, 8, 10)
 *
 * @psalm-template Tk as array-key
 * @psalm-template Tv
 * @psalm-template T
 *
 * @psalm-param iterable<Tk, Tv>    $iterable Iterable to be mapped over
 * @psalm-param (callable(Tv): T)   $function
 *
 * @psalm-return iterable<Tk, T>
 */
function map(iterable $iterable, callable $function): iterable
{
    foreach ($iterable as $key => $value) {
        yield $key => $function($value);
    }
}