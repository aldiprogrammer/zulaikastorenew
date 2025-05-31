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
                $("#totalharga").html('hello')
                $("#formtotal").val(response.formtotal);
                $("#formtotal2").val(response.formtotal);


            },
            error: function (xhr) {
                console.log('error');

            }
        })

    });

    $(".tambah-pesanan").click(function () {
        var kode = $(this).data('kode');
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
                $("#totalharga").html(response.totalharga)
                $("#formtotal").val(response.formtotal);
                $("#formtotal2").val(response.formtotal);
            },

            error: function (err) {
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
                        $("#totalharga").html(res.total)
                        $("#formtotal").val(res.formtotal);
                        $("#formtotal2").val(res.formtotal);
                        if (res.total == '<h5>Total : 0</h5>') {
                            $("#listorder").html
                                (' <center><h5 class="text-danger fw-bol">Oops!</h5></centere><h6 class="text-center text-primary fw-bold mt-2">List order belum tersedia</h6>');
                        }

                        el.remove(); // hapus elemen dari tampilan
                    } else {
                        alert('Gagal menghapus data');
                    }
                }
            });
        }
    });


    $("#diskon").keyup(function () {

        var totalharga = $("#formtotal2").val();
        var diskon = $(this).val();

        var potong = totalharga * diskon / 100;
        var harga = totalharga - potong;
        $("#formtotal").val(harga);
    })

    $("#uang").keyup(function () {
        var totalharga = $("#formtotal").val();
        var uang = $(this).val();
        if (Number(uang) < Number(totalharga)) {
            $("#kembalian").val(0);
        } else {
            var km = uang - totalharga;
            $("#kembalian").val(km);
        }

    })


})