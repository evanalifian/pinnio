<script src="public/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/app.js"></script>
<?php if (isset($data["script"])): ?>
  <script src="/public/js/<?= $data["script"] ?>"></script>
<?php endif ?>
</body>

</html>