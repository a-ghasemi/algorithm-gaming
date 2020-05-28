<?php

class HorizontalRule extends RegexRule implements RegexRuleInterface
{

    public function rule()
    {
        return '/^[-|\*|\_]+$/m';
    }

    public function replacement()
    {
        return"<hr>";
    }
}