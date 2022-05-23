<?php

namespace RyanChandler\Csv;

use Closure;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Traits\Macroable;
use League\Csv\Reader;

class Csv
{
    use Macroable;

    public static function foreach(string $path, Closure $do, bool $header = true, int $headerOffset = 0, string $delimiter = ',', string $enclosure = '"'): void
    {
        $reader = Reader::createFromPath($path)
            ->setDelimiter($delimiter)
            ->setEnclosure($enclosure);

        if ($header) {
            $reader->setHeaderOffset($headerOffset);
        }

        foreach ($reader->getRecords() as $offset => $record) {
            $do($record, $offset);
        }
    }
}
