<?php

use Illuminate\Contracts\Support\Htmlable;

if (! function_exists('numrows')) {
    function numrows($data, $index = 1, $name = 'no')
    {
        if (is_object($data)) {
            foreach ($data as $key => $value) {
                $value->{$name} = $index;
                $index++;
            }
        } else
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $data[$key][$name] = $index;
                    $index++;
                }
            }
        return $data;
    }
}

if (! function_exists('checkAccess')) {
    function checkAccess($menu)
    {
        if ($menu) {
            $menuRoles = auth()
                ->user()
                ->userRole
                ->role
                ->menuRole()
                ->with([
                    'menu' => function($q) use ($menu) {
                        $q->select('id', 'name')->where('name', $menu);
                    }
                ])
                ->get()
                ->toArray();

            $menuRoles = array_flatten($menuRoles);

            if (in_array($menu, $menuRoles)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}

if (! function_exists('checkGroupAccess')) {
    function checkGroupAccess(array $menus)
    {
        if ($menus) {
            $countMenu = 0;
            $menuRoles = auth()
                ->user()
                ->userRole
                ->role
                ->menuRole()
                ->with([
                    'menu' => function($q) use ($menus, &$countMenu) {
                        $data = $q->select('id', 'name')->whereIn('name', $menus);
                        $countMenu = $data->count();
                    }
                ])
                ->get()
                ->toArray();

            $menuRoles = array_flatten($menuRoles);

            $subtract = sizeof($menus) - $countMenu;

            if ($subtract != sizeof($menus)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    if (! function_exists('e')) {
        /**
         * Escape HTML special characters in a string.
         *
         * @param  \Illuminate\Contracts\Support\Htmlable|string  $value
         * @return string
         */
    function e($value)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
    }
}