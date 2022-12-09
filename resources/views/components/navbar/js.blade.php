<script>
	const openMenu = () => {
		$("#sidebar").css('visibility', 'visible')
		$("#sidebar").css('opacity', 1)
		$("#sidebar .content").css('right', '0px')
	}

	const closeMenu = () => {
		$("#sidebar").css('visibility', 'hidden')
		$("#sidebar").css('opacity', 0)
		$("#sidebar .content").css('right', '-400px')
	}
	
	$("#open-menu").click(openMenu)
	$("#close-menu").click(closeMenu)

</script>