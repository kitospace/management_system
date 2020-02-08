<?php
require_once ("db.php");

if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 5;

$sql = "SELECT * FROM tbl_staff  WHERE 1";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);

$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM tbl_staff WHERE 1 limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>

<table class="table table-hover table-responsive">
    <tr>
        <th align="center">Name</th>
        <th align="center">Experience<br>(in years)
        </th>
        <th align="center">Subject</th>
    </tr>
    <?php foreach ($results as $data) { ?>
    <tr>
        <td align="left">
            <?php echo $data['name'] ?>
        </td>
        <td align="left">
            <?php echo $data['experience'] ?>
        </td>
        <td align="left">
            <?php echo $data['major'] ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<div style="height: 30px;"></div>
<table width="50%" align="center">
    <tr>

        <td valign="top" align="left"></td>


        <td valign="top" align="center">
            <?php
	for ($i = 1; $i <= $pagesCount; $i ++) {
    if ($i == $pageNumber) {
        ?> <a href="javascript:void(0);" class="current">
                <?php echo $i ?>
        </a> <?php
    } else {
        ?> <a href="javascript:void(0);" class="pages"
            onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');">
                <?php echo $i ?>
        </a> <?php
    } // endIf
} // endFor

?>
        </td>
        <td align="right" valign="top">Page <?php echo $pageNumber; ?>
            of <?php echo $pagesCount; ?>
        </td>
    </tr>
</table>