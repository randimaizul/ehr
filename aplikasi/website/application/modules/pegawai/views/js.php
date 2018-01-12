<script type="text/javascript">

    function list_dokter() {
        var id_poli = document.getElementById("id_poli").value;
        $.ajax({
            url : "<?php echo base_url()?>pegawai/dokter/get_dokter_poli",
            dataType :"json",
            type : "POST",
            data : {'id_poli': id_poli},
            success : function(data){
                var row = "";
                var disabled = "";
                var keterangan = "";
                if(data.status==true){
                    if(data.obj == '0'){
                        row += '<select name="id_dokter" id="id_dokter" class="form-control" required>'
                        row += '<option value="0" disabled selected>-- Dokternya belum ada --</option> ';
                        row += "</select>"
                    } else {
                        row += '<select name="id_dokter" id="id_dokter" class="form-control" required>'
                        row += '<option value="0" disabled selected>-- Pilih dokter --</option> ';
                        $.each(data.obj, function(k, v) {
                            if(v.status == '0'){disabled = 'disabled'; keterangan = " (closed)"}
                            else {disabled = ""; keterangan = ""}
                            row += '<option '+disabled+' value="'+v.id_dokter+'">'+v.nama_dokter+' '+keterangan+'</option> ';
                            document.getElementById('id_rs_poli').value=v.id_rs_poli;
                        });
                        row += "</select>"
                    }                        
                    $("#list_dokter").html(row);
                } else {
                    alert(data.msg);                
                }
            },
            error : function(x,t,m){
              alert(x.responseText);
          }
        })
    }; 

    $('#form_search_pasien').on('submit', function (e) {
        var data = $('#form_search_pasien').serialize();
        $.ajax({
            url : "<?php echo base_url()?>pegawai/pasien/search_pasien",
            dataType :"json",
            type : "POST",
            data : data,
            success : function(data){
                var row = "";
                if(data.status==true){
                    if(data.obj == '0'){
                        row += '<div class="col-md-12">'
                        row += '<span>Tidak ditemukan!.. silahkan tambahkan data pasien <br> <a href="<?php echo base_url('pegawai/pasien/tambah_pasien')?>"><u>Klik disini</u></a></span>';
                        row += "</div>"
                    } else {
                        row += '<div class="col-md-12">'
                        row += '<div class="form-group">'
                        row += '<div class="table-responsive">'
                        row += '<table class="table">'
                        row += '<tbody>' 
                            $.each(data.obj, function(k, v) {                                                        
                            row += '<tr>'
                                row += '<td>'
                                    row += '<div class="media-body">'
                                        row += '<div class="media-heading">'
                                            row += '<span class="letter-icon-title">'+v.nama_pasien+'</span>'
                                        row += '</div>'
                                        row += '<div class="text-muted text-italic text-size-small">'+v.alamat_pasien+'</div>'
                                    row += '</div>'
                                row += '</td>'
                                var aa = v.nama_pasien;
                                row += '<td><button id="pilihPasien'+v.id_pasien+'" onClick="pilih_pasien(this);" class="label bg-primary btn_pilih_pasien" nama_pasien="'+v.nama_pasien+'" alamat_pasien="'+v.alamat_pasien+'" id_pasien="'+v.id_pasien+'" no_asuransi = "'+v.no_asuransi+'" jenis_asuransi="'+v.jenis_asuransi+'">Pilih</a></button>'
                                // row += '<td><a href="<?php //echo base_url()?>pegawai/pasien/tambah_pasien/'+v.id_pendaftaran+'" class="label bg-primary">Pilih</a></td>'
                            row += '</tr>' 
                            });                                                  
                        row += '</tbody>'
                        row += '</table>'
                        row += '</div>'
                        row += '</div>'
                        row += '</div>'
                    }                        
                    $("#hasil_search").html(row);
                } else {
                    alert(data.msg);                
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })

        document.getElementById('nama_pasien').value = "";
        return false;
    });

    function pilih_pasien(e){
        var nama = $("#"+e.id).attr('nama_pasien');
        var alamat = $("#"+e.id).attr('alamat_pasien');
        var id_pasien = $("#"+e.id).attr('id_pasien');
        var jenis_asuransi = $("#"+e.id).attr('jenis_asuransi');
        var no_asuransi = $("#"+e.id).attr('no_asuransi');
        var row = "";

        row += '<div class="media-body">'
            row += '<span class="display-inline-block text-default text-bold letter-icon-title">'+nama+'</span>'
            row += '<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Alamat : '+alamat+' <br> Asuransi : '+jenis_asuransi+' <br> No. Asuransi : '+no_asuransi+'</small></span>'
        row += '</div>'
    

        $("#hasil_search").html("");
        $("#informasi_pasien").html(row);
        document.getElementById('id_pasien').value = id_pasien;
        document.getElementById("panel_poli").style.display = "block";
    }

</script>