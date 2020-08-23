<?php

namespace App\Helpers;

class Paginator
{

    private function checkLimit($limit)
    {
        if ($limit < 1) {
            return $limit = 1;
        } elseif ($limit > 10) {
            return $limit = 10;
        }
        return $limit;
    }

    public function paginate($limit, $countPages)
    {
        $limit = $this->checkLimit($limit);

        $page = !empty($_GET['page']) ? $_GET['page'] : 1;

        $total = intval(($countPages - 1) / $limit) + 1;

        $page = intval($page);

        if (empty($page) || $page < 0) {
            $page = 1;
        }
        if ($page > $total) {
            $page = $total;
        }

        $start = $page * $limit - $limit;

        $paginate = [
            'limit' => $limit,
            'page' => $page,
            'total' => $total,
            'start' => $start
        ];

        return $paginate;

    }


}