<?php
namespace App;

interface DateInterface
{
    public function __toString():string;
    public function formatFrancais():string;
    public function formatAmericain():string;
}
