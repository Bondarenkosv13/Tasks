<?php

namespace App\Helpers;

class SortTasks
{
    public static function sort($name, $filter)
    {
        $sorts = [
            'name' => 'name ?, email ?, status ?',
            'email' => 'email ?, name ?, status ?',
            'status' => 'status ?, name ?, email ?'
        ];

        foreach ($sorts as $key => $value) {
            if ($key === $name) {
                $sort = str_replace('?', $filter, $value);
            } else {
                $sort = str_replace('?', $filter, $sorts['name']);
            }
        }

        return $orderBy = 'ORDER BY ' . $sort;
    }
}