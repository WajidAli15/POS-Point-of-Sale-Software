<?php
include('header.php');
?>
<!-- Main Content -->
<style>
    /* -- quantity box -- */
    .quantity {
        display: inline-block;
    }

    .quantity .input-text.qty {
        width: 51px;
        height: 51px;
        padding: 0 5px;
        text-align: center;
        background-color: transparent;
        font-size: 25px;
        color: red;
        font-weight: bold;
        border: 1px solid #efefef;
    }

    .quantity.buttons_added {
        text-align: left;
        position: relative;
        white-space: nowrap;
        vertical-align: top;
    }

    .quantity.buttons_added input {
        display: inline-block;
        margin: 0;
        vertical-align: top;
        box-shadow: none;
    }

    .quantity.buttons_added .minus,
    .quantity.buttons_added .plus {
        padding: 7px 10px 8px;
        height: 51px;
        width: 51px;
        font-size: 25px;
        color: skyblue;
        font-weight: bold;
        background-color: #ffff;
        border: 1px solid #efefef;
        cursor: pointer;
    }

    .quantity.buttons_added .minus {
        border-right: 0;
    }

    .quantity.buttons_added .plus {
        border-left: 0;
    }

    .quantity.buttons_added .minus:hover,
    .quantity.buttons_added .plus:hover {
        background: #eeeeee;
    }

    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        margin: 0;
    }

    .quantity.buttons_added .minus:focus,
    .quantity.buttons_added .plus:focus {
        outline: none;
    }
</style>


<div class="main-content">
    <section class="section">
        <div class="row">
            <!-- Add to Cart----->
            <?php
            foreach ($table_data as $value) {
                echo '                    
		        <div class="col-lg-3 col-md-2 col-sm-3">
					<div class="card">
						<center>
						    <img src="' . base_url() . 'assets/product/' . $value->img . '"style="width:20%;height:80px">
							<h6>' . $value->product . '</h6>
							<p class="price">' . $value->price . '</p>
                            <center>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus" id="btn-minus" data-id="'.$value->id.'" style="">
                                    <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text qtyitem" size="4" pattern="" inputmode="" id="qtyitem">
                                    <input type="button" value="+" class="plus" id="btn-plus" data-id="'.$value->id.'">
                                </div>
                            </center>
					    </center>
					</div>
				</div>';
            }
            ?>
            <!-- Add to Cart----->
        </div>
</div>
</div>

<!-- Add carts Footer -->
<footer class=" font-small blue fixed-bottom">
    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark" id="ordertable">

    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-1 bg-dark text-light">© 2021 Copyright & all rights reserved Nenosofts.pk
    </div>
    <!-- Copyright -->
</footer>
<!-- Add carts Footer -->
<?php
include('footer.php');
?>

<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
<script>
    //--- add to cart funtion with ajax -----//
    // on click function
    $(document).on('click', '#btn-plus', function() {
        var id = $(this).data("id");
        //alert(id);
        $.ajax({
            type: 'post',
            url: '<?= base_url() ?>Sell_dashboard/addtocart',
            data: {
                id: id
            },
            success: function(data) {
                // get data from output controller (this id for cart footer)
                $('#ordertable').html(data);

            }
        })
    })
    //--- add to cart funtion with ajax -----//

    //////////LESS PRODUCT INTO CART FUNCTION //////////////
$(document).on('click', '#btn-minus', function(){
      var id= $(this).data("id");    
      var qty=$(".qtyitem").val();
      event.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?= base_url();?>Sell_dashboard/lesstocart',
            data: {id:id,qty:qty},
			beforeSend: function() {
				
			},						
			success: function(data)
            {
                $('#ordertable').html(data);
            }
    });
  });
/////////////////END/////////////////////////


    //----- Carts data insert Function -----//
    $(document).on('click', '#btnsave', function() {
        //alert("ok");
        $.ajax({
            type: 'post',
            url: ('<?= base_url() ?>Sell_dashboard/insert'),
            data: {},
            success: function(data) {
                alert('ok');
                location.reload();
            }
        })
    })
    //----- Carts insert Function -----//

    var perfEntries = performance.getEntriesByType("navigation");

    if (perfEntries[0].type === "back_forward") {
        location.reload(true);
    }

    function wcqib_refresh_quantity_increments() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }
    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });

    // Btn Expense add Function //
    $("#btn_add_expense").click(function() {
        $("#expensemodal").modal("show");
    });
    // Btn Expense add Function //

</script>