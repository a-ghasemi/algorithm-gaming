<?php

class Bold extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/\*{2}(.*)\*{2}|\_{2}(.*)\_{2}/m';
    }

    public function replacement()
    {
        return "<b>$1</b>";
    }
}