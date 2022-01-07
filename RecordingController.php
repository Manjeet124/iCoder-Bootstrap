<?php 

Request::method('add', function() {

load::model('admin/Course');
$course_model = new Course_model();

$Active_courses = $course_model->getActiveCourses();

$data['courses'] = $Active_courses;

$data['errors'] = [];

load::resource('admin/views/recording/add_form', $data);

});

Request::method('getInstructorByAjax', function($course_id){

startSection();

load::model('admin/Course');

$course_model = new Course_model();

$instructors = $course_model->getCourseInfoById($course_id);

$option = "<option value = ''>Select</option>";

foreach($instructors as $instructor) {

    $option .= "<option  value = '{$instructor['instructor_id']}' selected>{$instructor['instructor_name']}</option>";
    
}

echo $option;

endSection();

});