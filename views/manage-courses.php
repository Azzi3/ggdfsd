<div class="container">
    <div class="jumbotron">

        <h1>Hantera kurser!</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
        <a class="btn btn-primary" href="<?php echo $path; ?>company-list" role="button">Visa företag</a>

    </div>
</div>

    <div class="table-responsive">

        <div class="container">
            <form class="col-md-4"> 

                <legend>Kurs</legend>
                <div class="form-group">
                    <label for="courseName">Namn:</label>
                    <input type="text" class="form-control" id="courseName">
                </div>
                <div class="form-group">
                    <label for="courseDescription">Beskrivning:</label>
                    <input type="textarea" class="form-control" id="courseDescription">
                </div>
                <div class="form-group">
                    <label for="courseStart">Start:</label>
                    <input type="date" class="form-control" id="courseStart">
                </div>
                <div class="form-group">
                    <label for="courseEnd">Slut:</label>
                    <input type="date" class="form-control" id="courseEnd">
                </div>
                
                <button type="submit" class="btn btn-default">Spara</button>
            </form>
        </div>
    </div>

</body>
</html>
