<?php

class Image extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/^!\[(.*)\]\((.*)\)/m';
    }

    public function replacement()
    {
        return "<img src=\"$2\" alt=\"$1\">";
    }
}