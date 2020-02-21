<?php
include ('config/database.php');
include ('class/date.class.php');
include ('class/data.class.php');

$mysqli = connect();
$fnc = new watchan();
$travel = $fnc->getTravel();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watchan Hospital</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree:300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit:300&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link href="dist/css/custom.css">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert -->
    <script src="plugin/sweetalert/sweetalert.min.js"></script>
    <!-- DatePicker -->
    <link rel="stylesheet" href="plugin/datepicker/jquery.datetimepicker.css">
    <script type="text/javascript" charset="utf8" src="plugin/datepicker/jquery.datetimepicker.full.js"></script>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="plugin/datatable/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="plugin/datatable/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="plugin/datatable/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="plugin/datatable/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#travel').DataTable({
            responsive: true,
            "pageLength": 20,
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, "All"]
            ],
            dom: 'Bfrtip',
            buttons: [{
                text: '<i class="fa fa-plus-circle"></i> ขออนุมัติเดินทางไปราชการ',
                className: "btn btn-dark btn-sm addItem",
            }],
        });
    });
    </script>
</head>

<body>
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-map-marked-alt"></i> ขออนุมัติเดินทางไปราชการ
                            </h5><br>
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>0 <sup style="font-size: 20px">รายการ</sup></h3>
                                            <p>ทั้งหมด</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-list"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>0 <sup style="font-size: 20px">รายการ</sup></h3>
                                            <p>ดำเนินการแล้ว</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>0 <sup style="font-size: 20px"> รายการ</sup></h3>
                                            <p>รอดำเนินการ</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-history"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="travel" class="display compact table table-bordered nowrap"
                                    style="width:100%;font-size:14px;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">เลขที่</th>
                                            <th class="text-center">วันที่</th>
                                            <th>เรื่อง</th>
                                            <th>สถานที่</th>
                                            <th class="text-center">พิมพ์แบบฟอร์ม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($travel as $tv){ ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="#"><?=$tv['travel_no'].$tv['travel_id']?></a>
                                            </td>
                                            <td class="text-center">
                                                <?=DateTimeThai($tv['travel_start'])." - ".DateTimeThai($tv['travel_end'])?>
                                            </td>
                                            <td><?=$tv['travel_title']?></td>
                                            <td><?=$tv['travel_place']?></td>
                                            <td class="text-center">
                                                <a href="form.php?id=<?=base64_encode($tv['travel_id'])?>"
                                                    target="_blank" class='badge badge-primary'><i
                                                        class='fa fa-print'></i>
                                                    พิมพ์เอกสาร
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i>
                        แบบฟอร์มขออนุมัติเดินทางไปราชการ
                    </h5>
                </div>
                <form id="addNew">
                    <div class="modal-body">
                        <div class="form-group">
                            <span style="font-size:14px;">ผู้ทำรายการ</span>
                            <input type="text" name="create_name" class="form-control" placeholder="ชื่อ-สกุล" required>
                        </div>
                        <div class="form-group">
                            <span style="font-size:14px;">ระบุสถานที่</span>
                            <input type="text" name="place" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <span style="font-size:14px;">ระบุชื่อเรื่อง</span>
                            <input type="text" name="title" id="" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <span style="font-size:14px;" class="col-md-12 control-label">วันที่/เวลา</span>
                            <div class="col-md-6">
                                <input id="dateStr" name="dstart" type="text" class="form-control input-md"
                                    placeholder="วันที่ไป" readonly required>
                            </div>
                            <div class="col-md-6">
                                <input id="dateEnd" name="dend" type="text" class="form-control input-md"
                                    placeholder="วันที่กลับ" readonly required>
                            </div>
                        </div>
                        <div class="form-group" style="font-size:14px;">
                            <span>ผู้เข้าร่วม</span>
                            <input type="text" name="ename" class="form-control" placeholder="ชื่อ-สกุล">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btnSave" class="btn btn-success"><i class="fa fa-save"></i>
                                บันทึกรายการ
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script>
$(document).ready(function() {
    $(".addItem").click(function() {
        $("#addItemModal").modal();
    });
});

$(function() {
    $.datetimepicker.setLocale('th');
    var dt = new Date();
    dt.setDate(dt.getDate());
    $("#dateStr").datetimepicker({
        lang: 'th',
        minDate: dt,
        onShow: function(ct) {
            this.setOptions({
                maxDate: jQuery('#dateEnd').val() ? jQuery('#dateEnd').val() : false
            })
        },
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [day == 1 || day == 2 || day == 3 || day == 4 || day == 5, ""];
        }
    });
    $("#dateEnd").datetimepicker({
        lang: 'th',
        minDate: dt,
        onShow: function(ct) {
            this.setOptions({
                minDate: jQuery('#dateStr').val() ? jQuery('#dateStr').val() : false
            })
        },
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [day == 1 || day == 2 || day == 3 || day == 4 || day == 5, ""];
        }
    });
});

$('#addNew').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "ยืนยันการขออนุมัติเดินทางไปราชการ ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                document.getElementById("btnSave").disabled = true;
                $.ajax({
                    url: "query.php?op=add",
                    method: "POST",
                    data: $('#addNew').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'บันทึกรายการขออนุมัติเดินทางไปราชการสำเร็จ',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('index.php')
                        }, 1500);
                    }
                });
            }
        });
});
</script>