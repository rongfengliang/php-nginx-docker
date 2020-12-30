<!DOCTYPE html>
<html>
<body>

<?php
xhprof_enable();
include "app.php";
echo "<div>Hello World!</div>";

$xhprofData = xhprof_disable();

$xhprofRoot = '/usr/share/php7/xhprof/';
include_once $xhprofRoot . "/xhprof_lib/utils/xhprof_lib.php";
include_once $xhprofRoot . "/xhprof_lib/utils/xhprof_runs.php";

$xhprofRuns = new XHProfRuns_Default();
$runId = $xhprofRuns->save_run($xhprofData, "xhprof_show");
// 输出报告地址.
echo 'http://localhost:8080/xhprof.php?run=' . $runId . '&source=xhprof_show';
?>

</body>
</html>