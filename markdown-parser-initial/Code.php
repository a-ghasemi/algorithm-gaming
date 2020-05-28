<?php

class Code extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/`(.*)`/m';
    }

    public function replacement()
    {
        return "<code>$1</code>";
    }
}