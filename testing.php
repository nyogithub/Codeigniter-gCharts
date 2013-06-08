<?php define('BASEPATH', __DIR__); include(BASEPATH . '/libraries/Gcharts.php');


    $gcharts = new Gcharts();

    try {
        $gcharts->LineChart(array('#', 'Acctual', 'Scheduled'));

        $gcharts->LineChart->title('Scheduled vs Actual Machine Time');
        $gcharts->LineChart->titlePosition('in');
        $gcharts->LineChart->curveType('function');
        $gcharts->LineChart->width(800)->height(250)->pointSize(2)->lineWidth(2);

        $chartArea = new chartArea();
        $chartArea->left(25)->top(25)->width('75%');

        $textStyle = new textStyle();
        $textStyle->color('#D2FA2B')->fontName('Impact')->fontSize(18);

        $gcharts->LineChart->addOption($chartArea)->titleTextStyle($textStyle);
    } catch(Exception $e) {
        die($e->getMessage());
    }


    for($a=1; $a<10;$a++)
    {
        $gcharts->LineChart->addData(array($a,rand(-20,20),rand(-20,20)));
    }

?>


<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <title>Codeigniter-gCharts</title>
        <?php echo Gcharts::$googleAPI; ?>
    </head>

    <body>
        <div id="chart_div">
            <?php echo $gcharts->LineChart->output('chart_div'); ?>
        </div>
        <hr />
        <?php var_dump($gcharts->LineChart); ?>
    </body>
</html>