            <div class="collapse fixed-bottom z-3" id="footerCollapse">
                <div class="bg-dark p-4 text-center text-white">
                    <h5>SwiftCode</h5>
                    <div class="container-sm">
                        <p>Sed nec vulputate leo. Proin et tincidunt arcu, viverra auctor lectus. Aliquam dictum est et ante convallis venenatis. Nulla et dolor ligula. Praesent commodo blandit eros, quis lacinia erat tempor et. Maecenas lacinia tristique ipsum nec tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, orci quis iaculis sagittis, lacus felis accumsan lectus, non varius nisi mi condimentum libero. Vivamus non augue quis orci fermentum volutpat. Phasellus finibus nisi nec massa feugiat commodo id nec nulla.</p>
                    </div>
                </div>
            </div>
            <div class="fixed-bottom bg-light border-top z-2">
                <div class="d-flex justify-content-center align-items-center p-2" id="footerToggle" style="cursor: pointer;">
                    <span class="text-decoration-underline">SwiftCode</span>
                </div>
            </div>
        </div>
    </div> <!-- Cierre correspondiente al encabezado_html -->
    <script src="<?php echo JS . '/index.js' ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('click', function(event) {
            const footer = document.getElementById('footerCollapse');
            const toggle = document.getElementById('footerToggle');
            if (!footer.contains(event.target) && !toggle.contains(event.target)) {
                if (footer.classList.contains('show')) {
                    footer.classList.remove('show');
                }
            }
        });
        
        document.getElementById('footerToggle').addEventListener('click', function() {
            const footer = document.getElementById('footerCollapse');
            footer.classList.toggle('show');
        });
    </script>
</body>
</html>