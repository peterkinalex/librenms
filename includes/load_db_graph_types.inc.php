<?php
/*
 * LibreNMS dynamic graph types
 *
 * Author: Paul Gear
 * Copyright (c) 2015 Gear Consulting Pty Ltd <github@libertysys.com.au>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

// load graph types from the database
foreach (dbFetchRows('select * from graph_types') as $graph) {
    // remove leading 'graph_' from column names
    foreach ($graph as $k => $v) {
        $key = strpos($k, 'graph_') == 0 ? str_replace('graph_', '', $k) : $k;
        $g[$key] = $v;
    }
    $config['graph_types'][$g['type']][$g['subtype']] = $g;
}
