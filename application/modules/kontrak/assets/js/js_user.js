$(document).ready(function() {

	var user = $('#user').DataTable({
        ajax : url+'listener_show_all',
        processing: true,
        columns: [
        { sName: "id" },
        { sName: "display_name" },
        { sName: "username" },
        { sName: "email" },
        { sName: "role_name" },
        { sName: "last_login" },
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
       $('#form_user').trigger("reset");
       $('#modal_user .modal-title').html('Tambah Baru');
       $('#modal_user .modal-footer button').html('Tambah');
       $('#modal_user').modal('show');
    })

    //event ketika tombol edit di click
    $(document).on('click', '.edit', function() {
        var id_user = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url+'get_user',
            data: {id : id_user},
            dataType: 'json',
            success: function (dt) {
                $('#modal_user').modal('show');
                $('#modal_user .modal-title').html('Edit '+dt.user_id);

                $('#modal_user input[name="id"]').val(dt.user_id);
                $('#modal_user input[name="nama_user"]').val(dt.nama_user);
                $('#modal_user input[name="tipe_user_id"]').val(dt.tipe_user_id);
                $('#modal_user textarea[name="ket"]').val(dt.ket);
                $('#modal_user .modal-footer button').html('Perbarui');

            }
        });
    })

    //event ketika tombol hapus di click
    $(document).on('click', '.delete', function() {
        var id_user = $(this).data('id');
        $('#id_delete').val(id_user)
        $('#modal_confirm').modal('show');
    })

    //Proses simpan
    $('#form_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: url+'save',
            data: $('#form_user').serialize(),
            dataType: 'json',
            success: function (dt) {
                $("#modal_user").modal("hide");
                user.ajax.reload();
                $('#form_user').trigger("reset");

            }
        });

    });

    //Proses hapus
    $(document).on('click', '#confirm_delete', function() {
        var id_user = $('#id_delete').val();
        $.ajax({
            type: 'post',
            url: url+'delete',
            data: {id : id_user},
            dataType: 'json',
            success: function (dt) {
                user.ajax.reload();
            }
        });
    })


})