<?php
function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
        case 'pages':
            require_once("model/messages_model.php");
            require_once("model/members_model.php");
            $controller = new PagesController();
            break;
        case 'instructors':
            require_once("model/instructors_model.php");
            $controller = new InstructorsController();
            break;

        case 'members':
            require_once("functions.php");
            require_once("model/members_model.php");
            require_once("model/courses_model.php");
            require_once("model/instructors_model.php");
            require_once("model/applications_model.php");
            require_once("model/settings_model.php");
            $controller = new MembersController();
            break;

        case 'courses':
            require_once("functions.php");
            require_once("model/courses_model.php");
            require_once("model/instructors_model.php");
            require_once("model/members_model.php");
            require_once("model/settings_model.php");
            require_once("model/applications_model.php");
            require_once("model/payments_model.php");
            $controller = new CoursesController();
            break;
    }

    // call the action
    $controller->{ $action }();
}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array('pages' => ['home', 'error','show'],
                     'members' => ['show','showManageMember','manageMember','updateMember','showInscriptions','showMessages','addMember'],
                     'courses' => ['show','manageLesson','deleteCourse','deleteMemberFromApplication','showManageLesson','addCourse','showAddCourse','addMemberToLesson','updateLesson'],
                    'instructors' => ['logout','show','changePass']);

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>