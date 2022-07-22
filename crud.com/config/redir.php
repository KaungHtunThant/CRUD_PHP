<?php 
	if(isset($_POST['submit'])) {
        dbInsert();
        _goto_alt('https://formic-try.000webhostapp.com/');
    }

    if(isset($_POST['delete'])) {
        dbDelete();
        _goto_alt('https://formic-try.000webhostapp.com/');
    }

    if(isset($_POST['edit'])) {
        dbEdit();
        _goto_alt('https://formic-try.000webhostapp.com/');
    }
?>