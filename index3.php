<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h1 style="padding-top: 5rem;">Database</h1></center>
        <button type="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-success btn-md float-right"><i class="fas fa-plus mr-1"></i>เพิ่มข้อมูล</button>
        <table class="table table-hover">
            <thead class="black white-text">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Comment</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $query_show = mysqli_query($conn, 'SELECT * FROM guestbook');
            while($result = mysqli_fetch_array($query_show)) {
            ?>
              <tr>
                <td><?=$result["ID"]?></td>
                <td><?=$result["Name"]?></td>
                <td><?=$result["Comment"]?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn"><i class="fas fa-edit mr-1"></i>แก้ไข</button>
                    <a onclick="deletex(<?=$result['ID']?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i>ลบ</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
        <!--- [start] Modal สำหรับเพิ่มข้อมูล -->
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
            <form action="insert.php" method="POST">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">เพิ่มข้อมูล</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <input type="text" id="add_name" name="name" class="form-control">
                            <label data-error="wrong" data-success="right" for="add_name">ชื่อ</label>
                        </div>
                        <div class="md-form mb-5">
                            <input type="text" id="add_link" name="link" class="form-control">
                            <label data-error="wrong" data-success="right" for="add_link">ลิงค์</label>
                        </div>
                        <div class="md-form mb-5">
                            <textarea id="add_comment" name="comment" class="md-textarea form-control" rows="2"></textarea>
                            <label data-error="wrong" data-success="right" for="add_comment">คอมเม้น</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success btn-block">ยืนยัน</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        <!--- [end] Modal สำหรับเพิ่มข้อมูล-->
        <!--- [start] Modal สำหรับแก้ไขข้อมูล User -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
            <form action="update.php" method="POST">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">แก้ไขข้อมูล</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="md-form mb-5">
                            <input type="text" id="edit_name" name="name" class="form-control" value="name">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">ชื่อ</label>
                        </div>
                        <div class="md-form mb-5">
                            <textarea id="edit_comment" name="comment" class="md-textarea form-control" rows="2">comment</textarea>
                            <label data-error="wrong" data-success="right" for="orangeForm-email">คอมเม้น</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success btn-block">ยืนยัน</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        <!--- [end] Modal สำหรับแก้ไขข้อมูล User-->
    </div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function deletex(id) {
                swal({
                    title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success:function(){
                                swal("ลบข้อมูลเสร็จสิ้น!", {
                                    icon: "success",
                                }).then(result => {location.reload()});
                            }
                        });
                    }
                });
            }
        $(document).ready(function() {
            
            $('.edit-btn').on('click', function() {
                $('#modalEdit').modal('show');

                //ดึงข้อมูลจาก td
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                //กำหนดข้อมูลลง modal
                $('#edit_id').val(data[0]);
                $('#edit_name').val(data[1]);
                $('#edit_comment').val(data[2]);
            });
        });
    </script>
</body>
</html>
