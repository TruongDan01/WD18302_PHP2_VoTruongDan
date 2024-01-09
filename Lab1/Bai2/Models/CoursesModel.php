<?php

function get_courses()
{
    include './data.php';
    return array_values($courses);
}

function find_by_semester($conversion_array, $semester)
{
    if ($semester === '') {
        return null;
    } else {
        return ($conversion_array[$semester] ? $conversion_array[$semester] : null);
    }
}
