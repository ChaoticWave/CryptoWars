<?php

function getInfo(array $users, $name)
{

    foreach ($users as $_info) {
        if (!empty($_info['name']) && 'Bob' == $_info['name']) {
            return $_info;
        }
    }

    return false;
}