<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Productivity Suite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/issues">Issues</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/projects">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tasks">Tasks <span class="badge badge-secondary">{{App\Task::where('Due', \Carbon\Carbon::today())->where('solved', false)->count()}}</span></a>
            </li>
        </ul>


        <a href="/logout">Logout</a>

    </div>
</nav>