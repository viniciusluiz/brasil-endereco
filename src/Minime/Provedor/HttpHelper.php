<?php

namespace Minime\Provedor;

use phpQuery;

class HttpHelper {

    public static function parseTable($html) {
        $trs = [];
        phpQuery::newDocumentHTML($html); 

        foreach (pq(pq("table"))->find('tr') as $key => $table) {
            $tds = [];
            foreach (pq($table)->find('td') as $val) {
                $tds[] = trim($val->nodeValue);
            }
            $trs[] = $tds;
        }
        return $trs;
    }

    public static function exchangeIndexNumericalByTextual($cells, $textual_keys) {
        $record = [];
        foreach ($cells as $cell) {
            if(is_array($cell)){
                foreach ($cell as $key => $value) {
                    $row[$textual_keys[$key]] = $value;
                }
                $record[] = $row;
            }
        }
        return $record;
    }

} 
