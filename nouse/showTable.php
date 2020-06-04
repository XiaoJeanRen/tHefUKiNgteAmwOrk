<?php

class TableRows extends RecursiveIteratorIterator {
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td class='data_tablerow'>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

?>