<?php

class Link extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/^\[(.*)\]\((.*)\)/m';
    }

    public function replacement()
    {
        return "<a href=\"$2\">$1</a>";
    }
}