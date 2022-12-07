<style>
	#logo-navbar {
		width: 100px;
	}

	.navbar-link a:hover, .navbar-link a {
		text-decoration: none;
		color: black;
	}

	.navbar-link li {
		margin-left: 20px;
	}

	#mobile-menu {
		right: 0px;
		top: 0;
	}

	.overlay {
		background: #000000;
		opacity: 0.4;
	}

	#sidebar .content {
		width: 400px;
		height: 100vh;
		z-index: 10;
		position: absolute;
		right: -400px;
		transition: 0.5s ease-in-out;
	}

	#close-sidebar {
		font-size: 20px;
	}

	#sidebar {
		visibility: hidden;
		opacity: 0;
		transition: 0.5s ease-in-out;
		overflow-x: hidden;
		position: fixed;
		z-index: 9;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
	}

	@media (max-width: 992px) {
		#sidebar .content {
			width:  100%;
			right: -100%;
		}
	}

</style>