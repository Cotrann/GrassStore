<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menu, $parent_id = 0, $char = '')
    {

        $html = '';

        foreach ($menu as $key => $m) {
            if ($m->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>'. $m->id .'</td>
                        <td>'. $char . $m->name .'</td>
                        <td>'. ($m->active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' ).'</td>
                        <td>'. $m->updated_at .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="'.url('/admin/menu/edit/'. $m->id).'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('. $m->id .', \''.url('/admin/menu/destroy').'\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($menu[$key]);

                $html .= self::menu($menu, $m->id, $char .'--');
            }
        }

        return $html;

    }
}
