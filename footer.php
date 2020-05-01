</div>
<footer class="w3-container w3-padding w3-center w3-opacity w3-white w3-xlarge">
<p class="w3-medium">Groene Regentes © 2020 | created by <a href="https://www.imtal.nl" target="_blank" rel="noopener">imtal</a></p>
</footer>
<script>
function nav_open() {
	console.log("open");
    document.getElementById('nav').style.display = 'block';
    document.getElementById('nav-open').style.display = 'none';
    document.getElementById('nav-close').style.display = 'block';
}
function nav_close() {
	console.log("close");
    document.getElementById('nav').style.display = 'none';
    document.getElementById('nav-open').style.display = 'block';
    document.getElementById('nav-close').style.display = 'none';
}
function nav_search() {
	var q = document.getElementById('q'),
		f = document.getElementById('nav-search-form');
	if (f.style.display == 'none') {
		f.style.display = 'block';
		q.focus();
	} else {
		if (q.value) {
			document.getElementById('nav-search-form').submit();
		} else {
			f.style.display = 'none';
		}
	}
}
var m=document.getElementById('modal');
window.onclick = function (event) {
    if(event.target==m) {
        m.style.display='none';
    }
}
</script>
<?php wp_footer(); ?>
</body>
</html>
