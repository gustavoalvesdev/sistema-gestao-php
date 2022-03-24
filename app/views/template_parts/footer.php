    </div>
    <!-- container -->
    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/jquery.mask.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/scripts.js"></script>
    <?php if (@$_GET['url'] === 'produto/add'): ?>

        <script>

            let category = $('#category').val();

            

            $('#category').change(function() {
                category = $('#category').val();
                alert(category);
            });

            

        </script>

    <?php endif; ?>
</body>
</html>