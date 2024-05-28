<?php

namespace Relokia\Utils;

class CsvWriter
{
    private $file;

    public function __construct(string $filename)
    {
        $this->file = fopen($filename, 'w');
        if ($this->file === false) {
            throw new \Exception('Cannot open file for writing: ' . $filename);
        }
    }

    public function writeHeader(array $header): void
    {
        fputcsv($this->file, $header);
    }

    public function writeRow(array $row): void
    {
        fputcsv($this->file, $row);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
