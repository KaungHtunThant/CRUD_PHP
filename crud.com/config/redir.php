<?php 
	if(isset($_POST['submit'])) {
        dbInsert();
        _goto_alt('/CRUD_PHP/crud.com/');
    }

    if(isset($_POST['delete'])) {
        dbDelete();
        _goto_alt('/CRUD_PHP/crud.com/');
    }

    if(isset($_POST['edit'])) {
        dbEdit();
        _goto_alt('/CRUD_PHP/crud.com/');
    }
?>