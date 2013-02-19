<?php
if (!defined('XTMCMS')) {
    die("Hacking attempt!");
}
define('BANNERS', 1);
$banners = get_vars("banners");
if (!is_array($banners)) {
    $banners = array();
    $db->query("SELECT * FROM " . PREFIX . "_banners ORDER BY id ASC");
    while ($row_b = $db->get_row()) {
        $banners[$row_b['id']] = array();
        foreach ($row_b as $key => $value) {
            $banners[$row_b['id']][$key] = $value;
        }
    }
    set_vars("banners", $banners);
    $db->free();
}
$ban = array();
if (count($banners) > 0) {
    foreach ($banners as $name => $value) {
        if ($value['approve']) {
            if ($value['category']) {
                $value['category'] = explode(',', $value['category']);
                if (!in_array($category_id, $value['category'])) $value['code'] = "";
            }
            if ($value['main']) {
                if ($_SERVER['QUERY_STRING'] != "") $value['code'] = "";
            }
            if ($value['fpage'] AND intval($_GET['cstart']) > 1) $value['code'] = "";
            if ($value['start'] AND $_TIME < $value['start']) $value['code'] = "";
            if ($value['end'] AND $_TIME > $value['end']) $value['code'] = "";
            $value['grouplevel'] = explode(',', $value['grouplevel']);
            if ($value['grouplevel'][0] != "all" and !in_array($member_id['user_group'], $value['grouplevel'])) {
                $value['code'] = "";
            }
            if ($value['code'] != "") {
                switch ($value['short_place']) {
                    case 1 :
                        $ban_short['top'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 2 :
                        $ban_short['cen'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 3 :
                        $ban_short['down'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 4 :
                        $ban_short['top'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        $ban_short['down'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 5 :
                        $ban_short['cen'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        $ban_short['down'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 6 :
                        $ban_short['cen'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        $ban_short['top'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                    case 7 :
                        $ban_short['cen'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        $ban_short['top'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        $ban_short['down'][] = array("text" => $value['code'], "zakr" => $value['bstick']);
                        break;
                }
                if (isset($value['allow_full']) and $value['allow_full']) {
                    $ban_full[] = array("text" => $value['code'], "zakr" => $value['bstick']);
                }
            }
            $ban[$value['banner_tag']][] = $value['code'];
        }
    }
}
foreach ($ban as $key => $value) {
    if (($r_key = count($value)) > 1) {
        for ($i = 0; $i < $r_key; $i++) {
            if ($ban[$key][$i] == '') unset($ban[$key][$i]);
        }
    }
    $r_key = array_rand($ban[$key]);
    $ban[$key] = $ban[$key][$r_key];
}
$banners = $ban;
$ban = array();
unset($ban);
?>