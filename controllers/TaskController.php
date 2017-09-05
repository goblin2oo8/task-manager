<?php

class TaskController {

    public function actionIndex($page = 1, $sortField = 0, $sortOrganize = 1) {

        if (isset($_POST['submit'])) {
            $_SESSION['sort_field'] = intval($_POST['sortField']);
            $_SESSION['sort_organize'] = intval($_POST['sortOrganize']);
        }

        if (
                !isset($_SESSION['sort_field']) &&
                !isset($_SESSION['sort_organize'])
        ) {
            $_SESSION['sort_field'] = 0;
            $_SESSION['sort_organize'] = 1;
        }

        $taskList = Task::getTaskList($page, $_SESSION['sort_field'], $_SESSION['sort_organize']);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total, $page, Task::SHOW_DEFAULT, 'p');

        require_once(ROOT . '/views/task/index.php');
        return true;
    }

    public function actionView($id) {

        $taskItem = Task::getTaskItemById($id);

        require_once(ROOT . '/views/task/view.php');
        return true;
    }

    public function actionAdd() {

        if (isset($_POST['submit'])) {

            $errors = false;

            $name = htmlspecialchars($_POST['name']);
            $email = $_POST['email'];
            $text = htmlspecialchars($_POST['text']);
            
            if (isset($_FILES['img']['name'])) {
                $img = $_FILES['img']['name'];
            } else
                $img = '';

            if (!User::checkName($name)) {
                $errors[] = 'Field Name must be of 3 to 16 characters!';
            }

            if (!Task::checkEmail($email)) {
                $errors[] = 'Field E-mail is invalid!';
            }

            if ($text == '') {
                $errors[] = 'Field Text is blank!';
            }

            if ($img != '') {
                if (Task::checkImgType()) {
                    $img = Task::uploadImg();
                    if ($img == false) {
                        $errors[] = 'Error load image!';
                    }
                } else
                    $errors[] = 'This type of image not supported!';
            }

            if ($errors == false) {
                $result = Task::add($name, $email, $text, $img);
            }
        }

        require_once(ROOT . '/views/task/add.php');
        return true;
    }

    public function actionEdit($id) {

        User::checkAuth();

        $taskItem = Task::getTaskItemById($id);
        if (isset($_POST['submit'])) {

            $text = htmlspecialchars($_POST['text']);
            if (isset($_POST['status'])) {
                $status = intval($_POST['status']);
            }

            $result = Task::edit($id, $text, $status);
        }

        require_once(ROOT . '/views/task/edit.php');
        return true;
    }

}
