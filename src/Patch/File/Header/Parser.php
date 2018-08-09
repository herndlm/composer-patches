<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE_VAIMO.txt for license details.
 */
namespace Vaimo\ComposerPatches\Patch\File\Header;

class Parser
{
    public function parseContents($header)
    {
        $lines = explode(PHP_EOL, $header);

        $key = 'label';

        $data = array();

        foreach ($lines as $line) {
            if (strpos($line, '@') === 0) {
                $key = ltrim(strstr($line, ' ', true), '@');

                $data[$key] = array();

                $line = ltrim(strstr($line, ' '), ' ');
            }

            if (!trim($line)) {
                continue;
            }

            $data[$key][] = $line;
        }

        return $data;
    }
}