<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="#" class="nav-link">
                <span class="link-text logo-text"><?= _projectName ?></span>
                <img src="../assets/images/logo.png" class="logo-img">
                <!-- <svg
				aria-hidden="true"
				focusable="false"
				data-prefix="fad"
				data-icon="angle-double-right"
				role="img"
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 448 512"
				class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
					<g class="fa-group">
						<path
						fill="currentColor"
						d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
						class="fa-secondary"
						></path>
						<path
						fill="currentColor"
						d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
						class="fa-primary"
						></path>
					</g>
				</svg> -->
            </a>
        </li>

        <li class="nav-item">
            <a href="home.php" class="nav-link showLoading <?= ($pageName == _home) ? 'active' : '' ?>">
                <img src="../assets/images/homepage.svg" class="icon">
                <span class="link-text"><?= _home ?></span>
            </a>
        </li>

        <li class="nav-item">
            <a href="employees.php" class="nav-link showLoading <?= ($pageName == _employees) ? 'active' : '' ?>">
                <img src="../assets/images/employees.svg" class="icon">
                <span class="link-text"><?= _employees ?></span>
            </a>
        </li>

        <hr class="my-hr">
        <li class="nav-item">
            <a href="ads.php" class="nav-link showLoading <?= ($pageName == _ads) ? 'active' : '' ?>">
                <img src="../assets/images/ads.svg" class="icon">
                <span class="link-text"><?= _ads ?></span>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="reports.php" class="nav-link showLoading <?= ($pageName == _reports) ? 'active' : '' ?>">
                <img src="../assets/images/reports.svg" class="icon">
                <span class="link-text"><?= _reports ?></span>
            </a>
        </li> -->
    </ul>
</nav>