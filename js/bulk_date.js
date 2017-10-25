jQuery(document).ready(function($){
    $('.inline-edit-col-right .inline-edit-col')
        .append(
            '<label style="margin-top: 3em;"><span class="title">Date</span>'
            + '<div class="timestamp-wrap"><select name="mm">'
            + '<option value="00">Month</option>'
            + '<option value="01">01-January</option>'
            + '<option value="02">02-February</option>'
            + '<option value="03">03-March</option>'
            + '<option value="04">04-April</option>'
            + '<option value="05">05-May</option>'
            + '<option value="06">06-June</option>'
            + '<option value="07">07-July</option>'
            + '<option value="08">08-August</option>'
            + '<option value="09">09-September</option>'
            + '<option value="10">10-October</option>'
            + '<option value="11">11-November</option>'
            + '<option value="12">12-December</option>'
            + '</select>'
            + '<input type="text" autocomplete="off" name="jj" maxlength="2" size="2" value="d" placeholder="d">'
            + ', <input type="text" autocomplete="off" name="aa" maxlength="4" size="4" value="Y" placeholder="Y">'
            + '@ <input type="text" autocomplete="off" name="hh" maxlength="2" size="2" value="H" placeholder="H">'
            + ' : <input type="text" autocomplete="off" name="mn" maxlength="2" size="2" value="i" placeholder="i"></div></label>'
    );
});
