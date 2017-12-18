<script type="text/javascript">
    $('body').delegate("#kategori","change", function() {
      var sub = $(this).val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>logistics/product/getSubCategory',
        data: 'kat=' + sub,
        success: function(response) {
            $('#subKategori').html(response);
        }
     });
    });
</script>
<?php 
  $cancel = $this->db->query("SELECT status_order, count(id) as jml FROM customer_order WHERE status_order='cancel'")->result_array();
  $proses = $this->db->query("SELECT status_order, count(id) as jml FROM customer_order WHERE status_order='proses'")->result_array();
  $penerimaan = $this->db->query("SELECT status_order, count(id) as jml FROM customer_order WHERE status_order='penerimaan'")->result_array();
  $pengiriman = $this->db->query("SELECT status_order, count(id) as jml FROM customer_order WHERE status_order='pengiriman'")->result_array();
  $pesan = $this->db->query("SELECT status_order, count(id) as jml FROM customer_order WHERE status_order='pesan'")->result_array();
?>
<?php 
  $quotation = $this->db->query("SELECT status, count(id) as jml FROM customer_quotation WHERE status='Quotation'")->result_array();
  $po = $this->db->query("SELECT status, count(id) as jml FROM customer_quotation WHERE status='PO'")->result_array();
  $qr = $this->db->query("SELECT status, count(id) as jml FROM customer_quotation WHERE status='Quotation_Request'")->result_array();
  $cncl = $this->db->query("SELECT status, count(id) as jml FROM customer_quotation WHERE status='Cancel'")->result_array();
?>

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawPie3d);


// Chart settings    
function drawPie3d() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Total'],
        <?php foreach($quotation as $value) {echo "['"; echo $value['status']; echo "',"; echo $value['jml']; echo "],"; }?>
        <?php foreach($po as $value) {echo "['"; echo $value['status']; echo "',"; echo $value['jml']; echo "],";}?>
        <?php foreach($qr as $value) {echo "['"; echo $value['status']; echo "',"; echo $value['jml']; echo "]";}?>
    ]);

    // Options
    var options_pie_3d = {
        fontName: 'Roboto',
        is3D: true,
        height: 350,
        width: 400,
        chartArea: {
            left: 50,
            width: '95%',
            height: '95%'
        }
    };
    // Instantiate and draw our chart, passing in some options.
    var pie_3d = new google.visualization.PieChart(document.getElementById('chartQuo'));
    pie_3d.draw(data, options_pie_3d);
}
</script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawPie3d);


// Chart settings    
function drawPie3d() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Total'],
        <?php foreach($proses as $value) {echo "['"; echo $value['status_order']; echo "',"; echo $value['jml']; echo "],"; }?>
        <?php foreach($cancel as $value) {echo "['"; echo $value['status_order']; echo "',"; echo $value['jml']; echo "],";}?>
        <?php foreach($penerimaan as $value) {echo "['"; echo $value['status_order']; echo "',"; echo $value['jml']; echo "],";}?>
        <?php foreach($pengiriman as $value) {echo "['"; echo $value['status_order']; echo "',"; echo $value['jml']; echo "],";} ?>
        <?php foreach($pesan as $value) {echo "['"; echo $value['status_order']; echo "',"; echo $value['jml']; echo "]";}?>
    ]);

    // Options
    var options_pie_3d = {
        fontName: 'Roboto',
        is3D: true,
        height: 350,
        width: 400,
        chartArea: {
            left: 50,
            width: '95%',
            height: '95%'
        }
    };
    

    // Instantiate and draw our chart, passing in some options.
    var pie_3d = new google.visualization.PieChart($('#chartOrder')[0]);
    pie_3d.draw(data, options_pie_3d);
}
</script>
<!-- Chart Top 5 Brand Order -->
<?php 
$queryTopproduct = "SELECT mb.brand, count(*) as jumlah from customer_order_detail cod 
JOIN merchant_product mp ON mp.id=cod.merchant_product_detail_id
JOIN merchant_brand mb ON mb.id=mp.merchant_brand_id
group by mb.brand order by jumlah DESC LIMIT 5";
$topProduct = $this->db->query($queryTopproduct)->result_array();
// var_dump($topProduct);
// echo $topProduct[0]["brand"];
// foreach($topProduct as $value);
// print_r($value);

?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawColumn);


// Chart settings
function drawColumn() {

    // Data
    // <?php 
    // foreach($topProduct as $value);
    // print_r($value);
    // ?>

    var data3 = google.visualization.arrayToDataTable([
        ['Year', <?php echo "'"; echo $topProduct[0]['brand']; echo "'";?>, <?php echo "'"; echo $topProduct[1]['brand']; echo "'";?>,<?php echo "'"; echo $topProduct[2]['brand']; echo "'";?>,<?php echo "'"; echo $topProduct[3]['brand']; echo "'";?>,<?php echo "'"; echo $topProduct[4]['brand']; echo "'";?>],
        ['Top 5 Brand Order',  <?php echo $topProduct[0]['jumlah'];?>, <?php echo $topProduct[1]['jumlah'];?>, <?php echo $topProduct[2]['jumlah'];?>, <?php echo $topProduct[3]['jumlah'];?>, <?php echo $topProduct[4]['jumlah'];?>]
    ]);


    // Options
    var options_column = {
        fontName: 'Roboto',
        height: 400,
        width: 900,
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '100%',
            height: 350
        },
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'Sum',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var column = new google.visualization.ColumnChart($('#google-column')[0]);
    column.draw(data3, options_column);
}
</script>
<!-- Chart Top 5 Brand Quotation -->
<?php 
    $queryTopQuo = "SELECT brand, count(*) as 'jumlah' from customer_quotation_detail group by brand order by jumlah DESC LIMIT 5";
    $topQuo = $this->db->query($queryTopQuo)->result_array();
?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawColumn);


// Chart settings
function drawColumn() {

    // Data
    // <?php 
    // foreach($topProduct as $value);
    // print_r($value);
    // ?>

    var data3 = google.visualization.arrayToDataTable([
        ['Year', <?php echo "'"; echo $topQuo[0]['brand']; echo "'";?>, <?php echo "'"; echo $topQuo[1]['brand']; echo "'";?>,<?php echo "'"; echo $topQuo[2]['brand']; echo "'";?>,<?php echo "'"; echo $topQuo[3]['brand']; echo "'";?>,<?php echo "'"; echo $topQuo[4]['brand']; echo "'";?>],
        ['Top 5 Brand Quotation',  <?php echo $topQuo[0]['jumlah'];?>, <?php echo $topQuo[1]['jumlah'];?>, <?php echo $topQuo[2]['jumlah'];?>, <?php echo $topQuo[3]['jumlah'];?>, <?php echo $topQuo[4]['jumlah'];?>]
    ]);


    // Options
    var options_column = {
        fontName: 'Roboto',
        height: 400,
        width: 900,
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '100%',
            height: 350
        },
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'Sum',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var column = new google.visualization.ColumnChart($('#topQuotation')[0]);
    column.draw(data3, options_column);
}
</script>