<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
        <nav class="navbar fixed-bottom navbar-dark bg-dark footer">
            <p class="mx-auto">&copy <?php echo date('Y') ?> - <a  href="http://www.indracompany.com">indracompany.com</a></p>
        </nav>
    </div>

    <!--script src="js/vendor/modernizr-3.5.0.min.js"></script-->


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>

    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
