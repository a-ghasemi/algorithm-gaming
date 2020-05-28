<?php

class Italic extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/[\*|\_]{1}(.*)[\*|\_]{1}/m';
    }

    public function replacement()
    {
        return "<i>$1</i>";
    }
}