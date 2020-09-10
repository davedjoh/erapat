<?php

namespace App\Controllers;

class Calendar extends BaseController
{
    public function index()
    {
        echo 'Calendar';
    }

    public function calendar_api()
    {
        try {
            $db = \Config\Database::connect();
            $result = $db->query('SELECT * FROM view_user_meeting')->getResultArray();

            for ($row = 0; $row < count($result); $row++) {
                if ($result[$row]['meeting_type'] == 'Online') {
                    $color = '#28a745';
                }
                if ($result[$row]['meeting_type'] == 'Offline') {
                    $color = '#dc3545';
                }
                if ($result[$row]['request_status'] == '1') {
                    $color = '#000000';
                }
                $values[] = array(
                    '_id' => $result[$row]['sub_department_id'],
                    'title' => $result[$row]['sub_department_name'],
                    'bagid' => $result[$row]['department_id'],
                    'media' => $result[$row]['meeting_type'],
                    'submedia' => $result[$row]['meeting_subtype'],
                    'submediaid' => $result[$row]['sub_type_id'],
                    'otherid' => $result[$row]['other_online_id'],
                    'calendar' => $result[$row]['meeting_type'],
                    'zoomid' => $result[$row]['zoomid'],
                    'speakers_name' => $result[$row]['speakers_name'],
                    'members_name' => $result[$row]['members_name'],
                    'agenda' => $result[$row]['agenda'],
                    'start' => implode("T", array($result[$row]['start_date'], $result[$row]['start_time'])),
                    'end' => implode("T", array($result[$row]['end_date'], $result[$row]['end_time'])),
                    'type' => $result[$row]['sub_type_id'],
                    'statuses' => $result[$row]['request_status'],
                    'className' => 'colorAppointment',
                    'username' => $result[$row]['name'],
                    'location' => $result[$row]['meeting_subtype'],
                    'backgroundColor' => $color,
                    'textColor' => '#ffffff',
                    'allDay' => false
                );
            }

            $to_encode = array(
                array(
                    'key' => 'data',
                    'value' => $values,
                )
            );
            echo json_encode($to_encode, true);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
