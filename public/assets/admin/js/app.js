$(document).ready(function () {
    $('#qty').keyup(function () {
        var value = $(this).val();
        var valharga = $("#harga").val();
        var total = value * valharga;
        $("#totalharga").val(total);
        var diskon = $("#diskon").val();
        var hargadisc = total * diskon / 100;
        var hargabayar = total - hargadisc;
        $("#hargabayar").val(hargabayar);

    });

    $("#diskon").keyup(function () {
        var diskon = $(this).val();
        var totalharga = $("#totalharga").val();
        var hargadisc = totalharga * diskon / 100;
        var hargabayar = totalharga - hargadisc;
        $("#hargabayar").val(hargabayar);
    });

    $("#harga").keyup(function () {
        var harga = $(this).val();
        var qty = $("#qty").val();
        var totalharga = qty * harga;
        $("#totalharga").val(totalharga);
        var diskon = $("#diskon").val();
        var hargadisc = totalharga * diskon / 100;
        var hargabayar = totalharga - hargadisc;
        $("#hargabayar").val(hargabayar);
    });


    $('.qtyedit').keyup(function () {
        var value = $(this).val();
        var valharga = $(".hargaedit").val();
        var total = value * valharga;
        $(".totalhargaedit").val(total);
        var diskon = $(".diskonedit").val();
        var hargadisc = total * diskon / 100;
        var hargabayar = total - hargadisc;
        $(".hargabayaredit").val(hargabayar);

    });

    $(".diskonedit").keyup(function () {
        var diskon = $(this).val();
        var totalharga = $(".totalhargaedit").val();
        var hargadisc = totalharga * diskon / 100;
        var hargabayar = totalharga - hargadisc;
        $(".hargabayaredit").val(hargabayar);
    });

    $(".hargaedit").keyup(function () {
        var harga = $(this).val();
        var qty = $(".qtyedit").val();
        var totalharga = qty * harga;
        $(".totalhargaedit").val(totalharga);
        var diskon = $(".diskonedit").val();
        var hargadisc = totalharga * diskon / 100;
        var hargabayar = totalharga - hargadisc;
        $(".hargabayaredit").val(hargabayar);
    });


    $("#kodeproduk").keyup(function () {
        var kode = $(this).val();
        var kode_tran = $("#kode").val();

        var formdata = {
            'kode': kode,
            'kode_transaksi': kode_tran
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/kasir',
            type: 'POST',
            data: formdata,
            success: function (response) {
                $("#showproduk").html(response.showproduk)
                $("#pesan").html(response.pesan)
                $("#listorder").html(response.listorder)
            },
            error: function (xhr) {
                console.log('error');

            }
        })

    })


    $(document).on('click', '.hapus-list', function () {
        var id = $(this).data('id');
        let el = $(this).closest('.list-item');
        var kode_tran = $("#kode").val();
        if (confirm('Yakin ingin menghapus item ini?')) {
            $.ajax({
                url: '/hapusorder',
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // penting untuk Laravel
                    id: id,
                    kode_transaksi: kode_tran
                },
                success: function (res) {
                    if (res.status) {
                        alert(res.message);
                        el.remove(); // hapus elemen dari tampilan
                    } else {
                        alert('Gagal menghapus data');
                    }
                }
            });
        }
    });



})