<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Notenerfassung</title>

    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div class="container">
<h1 class="mt-5 mb-3">Notenerfassung</h1>


    <?php

        require "lib/func.php";

        $name = "";
        $email = "";
        $examDate = "";
        $grade = "";
        $subject = "";



    if(isset($_POST['submit'])){

            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $examDate = isset($_POST['examDate']) ? $_POST['examDate'] : '';
            $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
            $subject = isset($_POST['subject']) ? $_POST['subject'] : '';

            if(validate($name, $email, $examDate, $grade, $subject)) {
                echo "<p class ='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
            }else{
                echo "<div class ='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";
            }

            foreach($errors as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul></div>";
        }

    ?>

    <form id="form_grade" action="index.php" method="post">

        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="name">Name*</label>
                <input type="text"
                       name="name"
                       class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($name) ?>"
                       maxlength="20"
                       required


                />
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">E-Mail</label>
                <input type="email"
                       name="email"
                       class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($email) ?>"

                />
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4 form-group">
                <label for="subject">Fach*</label>
                <select name="subject"
                        class="custom-select <?= isset($errors['subject']) ? 'is-invalid' : '' ?>"
                    required>
                    <option value="" hidden>- Fach auswählen -</option>
                    <option value="m" <?php if ($subject == 'm') echo "selected='selected'"?>>Mathematik</option>
                    <option value="d" <?php if ($subject == 'd') echo "selected='selected'"?>>Deutsch</option>
                    <option value="e" <?php if ($subject == 'e') echo "selected='selected'"?>>Englisch</option>

                </select>
            </div>


            <div class="col-sm-4 form-group">
                <label for="grade">Note*</label>
                <input type="number"
                       name="grade"
                       class="form-control <?= isset($errors['grade']) ? 'is-invalid' : '' ?>"
                       min="1"
                       max="5"
                       required
                       value="<?= htmlspecialchars($grade) ?>"

                />
            </div>


            <div class="col-sm-4 form-group">
                <label for="examDate">Prüfungsdatum*</label>
                <input type="date"
                       name="examDate"
                       class="form-control <?= isset($errors['examDate']) ? 'is-invalid' : '' ?>"
                       onchange="validateExamDate(this)"
                       required
                       value="<?= htmlspecialchars($examDate) ?>"

                />
            </div>
        </div>

                <div class="row mt-3">

                    <div class="col-sm-3 mb-3">
                        <input type="submit"
                                name="submit"
                                class="btn btn-primary btn-block"
                                value="Validieren"/>
                    </div>


                    <div class="col-sm-3">
                        <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>
                    </div>

                </div>




        </div>

    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>