<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
            <?php
            // The name of each column
            $element_text = ['Published Posts', 'Comments', 'Users', 'Categories'];
            // The values of each column from the admin widgets
            $element_count = [$post_count, $comment_count, $user_count, $category_count];

            // Use a loop to go through all the $element_text and $element_count while there is less than 4 $element_text
            for($i =0;$i < 4; $i++) {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            ?>
        ]);

        var options = {
            chart: {
                title: '',
                subtitle: '',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<div id="columnchart_material" style="width: auto; height: 500px;"></div>
