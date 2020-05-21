<?PHP
$authChk = true;
require('app-lib.php');
isset($_POST['a'])? $action = $_POST['a'] : $action = "";
if(!$action) {
    isset($_REQUEST['a'])? $action = $_REQUEST['a'] : $action = "";
}
isset($_POST['txtSearch'])? $txtSearch = $_POST['txtSearch'] : $txtSearch = "";
if(!$txtSearch) {
    isset($_REQUEST['txtSearch'])? $txtSearch = $_REQUEST['txtSearch'] : $txtSearch = "";
}
build_header($displayName);
?>
<?PHP build_navBlock(); ?>
    <div id="content">
        <div class="PageTitle">INVOICES</div>

        <!-- Search Section Start -->
        <form name="frmSearchStock" method="post"
              id="frmSearchStock"
              action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
            <div class="displayPane">
                <div class="displayPaneCaption">Search:</div>
                <div>
                    <input name="txtSearch" id="txtSearch" placeholder="Search Sales"
                           style="width: calc(100% - 115px)" value="<?PHP echo $txtSearch; ?>">
                    <button type="button" id="btnSearch">Search</button>

                </div>
            </div>
            <input type="hidden" name="a" value="listStock">
        </form>
        <!-- Search Section End -->
        <!-- Search Section List Start -->
        <?PHP
        if($action == "listStock") {
            ?>
            <div>
                <table style="width: calc(100% - 15px);border: #cccccc solid 1px">
                    <tr style="background: #eeeeee">
                    <td style="border-left: #cccccc solid 1px"><b>Invoice Number</b></td>
                        <td style="border-left: #cccccc solid 1px"><b>Date</b></td>                        
                        <td style="border-left: #cccccc solid 1px"><b>Customer Name</b></td>
                        <td style="border-left: #cccccc solid 1px"><b>Customer Address</b></td>
                        <td style="width: 80px;text-align: right"><b>Amount</b></td>
                    </tr>
                    <?PHP
                    openDB();
                    $query =
                        "SELECT
            *
         FROM
            lpa_invoices
         WHERE
            lpa_inv_client_ID LIKE '%$txtSearch%' AND lpa_inv_status <> 'U' 
         OR
            lpa_inv_client_name LIKE '%$txtSearch%' AND lpa_inv_status <> 'U'
         OR
            lpa_inv_no LIKE '%$txtSearch%' AND lpa_inv_status <> 'U'
         OR
            lpa_inv_date LIKE '%$txtSearch%' AND lpa_inv_status <> 'U'

         ";
                    $result = $db->query($query);
                    $row_cnt = $result->num_rows;
                    if($row_cnt >= 1) {
                        $total=0;
                        while ($row = $result->fetch_assoc()) {
                            $sid = $row['lpa_inv_date'];
                            $total = $total+$row['lpa_inv_amount'];

                            
                            ?>
                            <tr class="hl">
                            <td style="border-left: #cccccc solid 1px">
                                    <?PHP echo $row['lpa_inv_no']; ?>
                                </td>
                               <td style="border-left: #cccccc solid 1px">
                                    <?PHP echo $sid; ?>
                                </td>
                                    <td style="border-left: #cccccc solid 1px">
                                    <?PHP echo $row['lpa_inv_client_name']; ?>
                                </td>
                                <td style="border-left: #cccccc solid 1px">
                                    <?PHP echo $row['lpa_inv_client_address']; ?>
                                </td>
                                <td style="text-align: right">
                                    <?PHP echo $row['lpa_inv_amount']; ?>
                                </td>
                            </tr>
                        <?PHP }
                    } else { ?>
                        <tr>
                            <td colspan="3" style="text-align: center">
                                No Records Found for: <b><?PHP echo $txtSearch; ?></b>

                            </td>
                        </tr>
                    <?PHP } ?>
                     <?PHP if($row_cnt>=1){ ?>
                        <tfoot style="background: #eeeeee;width: 80px;text-align: left">
                        <td><b>TOTAL</b></td>
                        <td></td><td></td><td></td>
                        <td style="width: 80px;text-align: right"><?PHP echo $total;?></td>
                        </tfoot>
                        <?PHP } ?>

                </table>
            </div>
        <?PHP }  ?>
        <!-- Search Section List End -->
    </div>
    <script>
        var action = "<?PHP echo $action; ?>";
        var search = "<?PHP echo $txtSearch; ?>";

        $("#btnSearch").click(function() {
            $("#frmSearchStock").submit();
        });

        setTimeout(function(){
            $("#txtSearch").select().focus();
        },1);
    </script>
<?PHP
build_footer();
?>