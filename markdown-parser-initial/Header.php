<?php

class Header extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/\#+\s*(.*)$/m';
    }

    public function replacement()
    {
        return "<h3>$1</h3>";
    }
}