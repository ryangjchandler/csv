<?php

namespace RyanChandler\Csv;

use Closure;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Traits\Macroable;
use League\Csv\Reader;

class Csv
{
    use Macroable;

    final public static function foreach(string $path, Closure $do, bool $header = true, int $headerOffset = 0, string $delimiter = ',', string $enclosure = '"'): void
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

    final public static function read(string $path, bool $header = true, int $headerOffset = 0, string $delimiter = ',', string $enclosure = '"'): array
    {
        $records = [];

        self::foreach($path, do: function ($record) use (&$records) {
            $records[] = $record;
        }, header: $header, headerOffset: $headerOffset, delimiter: $delimiter, enclosure: $enclosure);

        return $records;
    }
}
