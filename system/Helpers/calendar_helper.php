<?php

function get_dropdown_time()
{
    for ($x = 1; $x <= 23; $x++) {
        if ($x < 10) {
            echo "<option value=0" . $x . ":00:00>0" . $x . ":00 AM</option>";
        } else {
            if ($x >= 12) {
                echo "<option value=" . $x . ":00:00>" . $x . ":00 PM</option>";
            } else {
                echo "<option value=" . $x . ":00:00>" . $x . ":00 AM</option>";
            }
        }
    }
}

function get_dropdown_media_online()
{
    $db = \Config\Database::connect();

    $condition = "type_id = 1";
    $query = $db->table('meeting_sub_type')->getWhere($condition);

    foreach ($query->getResult('array') as $on) {
        echo "<option value=" . $on['id'] . ">" . $on['meeting_subtype'] . "</option>";
    }
}

function get_dropdown_media_offline()
{
    $db = \Config\Database::connect();

    $condition = "type_id = 2";
    $query = $db->table('meeting_sub_type')->getWhere($condition);

    foreach ($query->getResult('array') as $off) {
        echo "<option value=" . $off['id'] . ">" . $off['meeting_subtype'] . "</option>";
    }
}

function get_dropdown_esalon_2()
{
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM view_user_department');
    foreach ($query->getResultArray() as $d) {
        echo "<option value=" . $d['id'] . ">" . $d['department_name'] . "</option>";
    }
}
