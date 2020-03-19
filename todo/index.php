<?php
    // include 'includes/autoloader.inc.php';
    include 'classes/dbh.class.php';
    include 'classes/user.class.php';
    include 'classes/viewuser.class.php';
    include 'classes/contr.class.php';

    // function pre($var) {
	// 	echo '<pre>';
	// 		print_r($var);
	// 	echo '</pre>';
	// }

    ob_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link href="Content/style/bootstrap.css" rel="stylesheet" />
    <link href="Content/lib/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="Content/style/style.css" rel="stylesheet" />

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="main-header">
                    <h1 class="pull-left">Opgaver</h1>
                    <div class="pull-right actions">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createCategory">Opret Kategori</a>
                    </div>
                </header>
            </div>

            <div class="col-md-12">
                <div class="columns">
                    <!-- Container til alle Kategorier -->
                    <div class="columns-container">
                        
                        <!-- Section til at håndtere en enkelt kategori -->
                        <section>
                            <div class="header-column">
                                <header>
                                    <div class="category" data-time="Today">
                                        <h2 id="Idag" >Idag</h2>
                                    </div>
                                    <a class="add-inline" data-toggle="modal" data-target="#createTask">
                                            <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                </header>
                            </div>
                            <!-- items-column er til alle opgaverne for den valgte kategori. -->
                             <div class="items-column">
                                 <div class="task-container">
                                        <div class="task finished">
                                            <p class="title">Rengøre</p>
                                            <div class="icon finishTask ">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </div>
                                            <div class="icon removeTask">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-container">
                                        <div class="task">
                                            <p class="title">Rengøre</p>
                                            <div class="icon finishTask ">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </div>
                                            <div class="icon removeTask">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-container">
                                        <div class="task">
                                            <p class="title">Vaske tøj</p>
                                            <div class="icon finishTask">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </div>
                                            <div class="icon removeTask">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-container">
                                        <div class="task">
                                            <p class="title">Rengøre</p>
                                            <div class="icon finishTask">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </div>
                                            <div class="icon removeTask">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-container">
                                        <div class="task">
                                            <p class="title">Lave lektier</p>
                                            <div class="icon finishTask">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </div>
                                            <div class="icon removeTask">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>

                        <?php
                            $cateTitle = new UserView();
                            $cateTitle->showCateTitle();
                            
                        ?>
                        <!-- <section>
                        <div class="header-column">
                                <header>
                                    <div class="category" data-time="Today">
                                        <h2 id="Imorgen" >Projekter</h2>
                                    </div>
                                    <a class="add-inline" data-toggle="modal" data-target="#createTask">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                </header>
                            </div> -->
                            <!-- <div class="items-column"></div> -->
                        <!-- </section> -->
                      



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$cateSet = new UserContr();
$cateSet->querySetCateTitle();

$redirect = new User();
$redirect->redirectOnSubmit('created');
?>

    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="createCategoryForm" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Opret Kategori</h4>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="categoryName">Navn</label>
                                <input type="text" name="categoryName" id="categoryName" placeholder="Navn på kategori" class="form-control" />
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Opret Kategori</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="createTask" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="createTaskForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Opret Opgave</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="categoryId" id="categoryId"/>
                        <div class="form-group">
                            <label for="taskName">Navn</label>
                            <input type="text" name="name" id="taskName" placeholder="Navn på Opgave" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Opret Opgave</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script src="Content/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="Content/scripts/bootstrap.min.js"></script>
    <script src="Content/scripts/global.js"></script>
</body>
</html>

