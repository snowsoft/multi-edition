<?php namespace ZN\ViewObjects\View\BS;

use Html, Buffer;

class Pager implements PagerInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Pager
    //--------------------------------------------------------------------------------------------------------
    //
    // @param callable $pager
    //
    //--------------------------------------------------------------------------------------------------------
    public function pager(Callable $pager) : String
    {
        $return  = '<ul class="pager">';
        $return .= Buffer::callback($pager, [$this]);
        $return .= '</ul>';

        return $return;
    }

    //--------------------------------------------------------------------------------------------------------
    // Prev
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url   = NULL
    // @param string $value = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function prev(String $url = NULL, String $value = NULL, $t = 'previous')
    {
        $type = Properties::$type === 'center' ? ' class="'.$t.'"' : NULL;

        echo '<li'.$type.'>' . Html::anchor($url, $value) . '</li>';
    }

    //--------------------------------------------------------------------------------------------------------
    // Next
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url   = NULL
    // @param string $value = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function next(String $url = NULL, String $value = NULL)
    {
        $this->prev($url, $value, 'next');
    }
}