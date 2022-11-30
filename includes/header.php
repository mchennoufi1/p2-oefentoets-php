<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link-light" aria-current="page" href="index.php"
                   style="<?php if($page == "read"){echo "color: grey";}?>">Read</a>
                <a class="nav-link-light"  aria-current="page" href="insert.php"
                   style="<?php if($page == "insert"){echo "color: grey";}?>">Insert</a>
                <a class="nav-link-light"  aria-current="page" href="update.php"
                   style="<?php if($page == "update"){echo "color: grey";}?>">Update</a>
                <a class="nav-link-light"  aria-current="page" href="delete.php"
                   style="<?php if($page == "delete"){echo "color: grey";}?>">Delete</a>
            </div>
        </div>
    </div>
    </div>
</nav>