$(document).ready(function() {

	var perusahaan = $('#perusahaan').DataTable({
        ajax : url+'listener_show_all',
        processing: true,
        columns: [
        { sName: "perusahaan_id" },
        { sName: "nama_perusahaan" },
        { sName: "tipe_perusahaan_id" },
        { sName: "alamat" },
        { sName: "aksi" }
         ],
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columnDefs: [
        { targets: [0], visible: false},
        ]
    });

    //event ketika tombol tambah baru di click
    $(document).on('click', '.new', function() {
       $('#form_perusahaan').trigger("reset");
       $('#modal_perusahaan .modal-title').html('Tambah Baru');
       $('#modal_perusahaan .modal-footer button').html('Tambah');
       $('#modal_perusahaan').modal('show');
    })

    //event ketika memillih kecamatan

    $('#selectSubDistrict').change(function(){
    var value = $(this).val();
    if (value>0){
        $.ajax({
            type:"POST",
            data:{id:value},
            url: url+'get_kelurahan',
            success: function(res) {
                $("#SelectSubSubDistrict").html(res);
            }
        });
    }
});

    //event ketika tombol edit di click
    $(document).on('click', '.edit', function() {
        var id_perusahaan = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url+'get_perusahaan',
            data: {id : id_perusahaan},
            dataType: 'json',
            success: function (dt) {
                $('#modal_perusahaan').modal('show');
                $('#modal_perusahaan .modal-title').html('Edit '+dt.perusahaan_id);

                $('#modal_perusahaan input[name="id"]').val(dt.perusahaan_id);
                $('#modal_perusahaan input[name="nama_perusahaan"]').val(dt.nama_perusahaan);
                $('#modal_perusahaan select[name="tipe_perusahaan_id"]').val(dt.tipe_perusahaan_id);
                $('#modal_perusahaan textarea[name="alamat"]').val(dt.alamat);
                $('#modal_perusahaan .modal-footer button').html('Perbarui');

            }
        });
    })

    //event ketika tombol hapus di click
    $(document).on('click', '.delete', function() {
        var id_perusahaan = $(this).data('id');
        $('#id_delete').val(id_perusahaan)
        $('#modal_confirm').modal('show');
    })

    //Proses simpan
    $('#form_perusahaan').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: url+'save',
            data: $('#form_perusahaan').serialize(),
            dataType: 'json',
            success: function (dt) {
                $.toast({heading: dt.heading,text: dt.msg,position: 'top-right',loaderBg:'#ff6849',icon: dt.status,hideAfter: 3500, stack: 6
              });
                $("#modal_perusahaan").modal("hide");
                perusahaan.ajax.reload();
                $('#form_perusahaan').trigger("reset");

            }
        });

    });

    //Proses hapus
    $(document).on('click', '#confirm_delete', function() {
        var id_perusahaan = $('#id_delete').val();
        $.ajax({
            type: 'post',
            url: url+'delete',
            data: {id : id_perusahaan},
            dataType: 'json',
            success: function (dt) {
                $.toast({heading: dt.heading,text: dt.msg,position: 'top-right',loaderBg:'#ff6849',icon: dt.status,hideAfter: 3500, stack: 6
              });
                perusahaan.ajax.reload();
            }
        });
    })

})
