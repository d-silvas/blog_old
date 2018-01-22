<!-- FOOTER -->
<footer class="footer">
  <p class="float-right"><a href="#">Back to top</a></p>
  <p>&copy; 2017 David Silva &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>

</div><!-- /.container -->

<script src="<?= base_url("assets/js/libraries/jquery-3.2.1.min.js") ?>"></script>
<script src="<?= base_url("assets/js/libraries/popper.js") ?>"></script>
<script src="<?= base_url("assets/js/libraries/bootstrap.min.js") ?>"></script>
<?php
if (isset($js)) {
  foreach ($js as $js_file) {
    echo "<script src='".$js_file."'></script>";
  }
}
?>
</body>
</html>
