<?php

namespace App\Helpers;

use Illuminate\Support\Str;

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
    public static function loadbreadcrumb($menu, $menu_id) : string
    {
        $html = '';
        foreach($menu as $key => $m) {
            if($m->id == $menu_id) {
                $html = '<a href="'.url('/danh-muc/'. $m->id .'-'. Str::slug($m->name, '-').'.html').'" class="stext-109 cl8 hov-cl1 trans-04">
                            '.$m->name.'
                            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                        </a>'.$html;
                unset($menu[$key]);

                if (self::isChild2($menu, $m->parent_id)) {
                    $html = self::loadbreadcrumb($menu, $m->parent_id).$html;
                }
            }
        }
        return $html;

    }
    public static function loadmenu($menu, $parent_id = 0) : string
    {
        $html = '';
        foreach($menu as $key => $m) {
            if ($m->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="'.url('/danh-muc/'. $m->id .'-'. Str::slug($m->name, '-').'.html').'">
                        '. $m->name .'
                        </a>';

                unset($menu[$key]);

                if (self::isChild($menu, $m->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::loadmenu($menu, $m->id);
                    $html .= '</ul>';
                }

                $html .= '</li>
                ';
            }
        }

        return $html;

    }

    public static function isChild($menu, $id) : bool
    {
        foreach($menu as $m) {
            if ($m->parent_id == $id) {
                return true;
            }
        }

        return false;
    }
    public static function isChild2($menu, $id) : bool
    {
        foreach($menu as $m) {
            if ($m->id == $id) {
                return true;
            }
        }

        return false;
    }
    public static function price($price, $price_sale)
    {
        if ($price_sale != 0) {
            return '<span style="text-decoration: line-through;">'.number_format($price).'đ'.'</span> <span style="color:red; font-weight: bold;">'.number_format($price_sale).'đ</span>';
        }
        return number_format($price).'đ';
    }

    public static function handleimage($thumb)
    {
        $array = explode("\n", $thumb);
        return $array[count($array)-1];
    }
}
