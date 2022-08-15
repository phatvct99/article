<?php

namespace App;

class Constant
{
    const REGEX_CONTENT = '/<\s*(h.*?|p.*?)[^>]*>([^<]*)<\s*\/\s*(h.*?|p)\s*>/';
    const REGEX_SCRIPT = '/<script\b[^>]*>([\s\S]*?)<\/script>/';
}
