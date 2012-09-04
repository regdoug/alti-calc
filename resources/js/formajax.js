$(document).ready(function() {

    $('#alticalc-form').bind('submit',function () { 
        //debug code: stop javascript execution.
        if($('input[name=type]').val()=='plain') return true;
        
        undrawCones($('#alticalc canvas.cones').get(0)); 
        $('#alticalc .entryerror').hide();    
        $('#alticalc .servererror').hide();
        $('#alticalc .formwarning').hide();
         
        //Get the data
        var d = $('input[name=distance]');
        var a1 = $('input[name=angle-one]');
        var a2 = $('input[name=angle-two]');
        var a3 = $('input[name=angle-three]');
        var g_lo = $('input[name=guess-lo]');
        var g_hi = $('input[name=guess-hi]');
        
        if(this.checkValidity && !this.checkValidity()){
            $('#alticalc .entryerror').show(100);
        }    
 
        if(!this.checkValidity){
            //Simple validation
            if (d.val()=='') {
                $('#alticalc .entryerror').show(100);
                return false;
            }
            if (a1.val()=='') {
                $('#alticalc .entryerror').show(100);
                return false;
            }
            if (a2.val()=='') {
                $('#alticalc .entryerror').show(100);
                return false;
            }
            if (a3.val()=='') {
                $('#alticalc .entryerror').show(100);
                return false;
            }
        }
        
        var data = 'distance=' + d.val() + '&angle-one=' + a1.val() + 
        '&angle-two=' + a2.val() + '&angle-three='  + a3.val() + '&type=json';
        
        if (g_lo.val()!=''){
            data += '&guess-lo='+g_lo.val();
        }
        if (g_hi.val()!=''){
            data += '&guess-hi='+g_hi.val();
        }
         
        //ajax callbacks
        var successFcn = function (jsonObj) {
                $('#alticalc .answer').html((jsonObj.z_ft > 0)?Math.round(jsonObj.z_ft):'-');
                    
                if(jsonObj.error == 0){
                    var canvas = $('#alticalc canvas.cones').get(0);
                    drawCones(canvas,jsonObj.d_ft,jsonObj.r_ft[0],jsonObj.r_ft[1],jsonObj.r_ft[2]);
                }
                $('#alticalc .results').show(100);
                //non-ideal, could use some reworking
                if(jsonObj.error == 1){
                    $('#alticalc .formwarning').html('Warning: '+jsonObj.msg).show(100);
                }
            };
        var errorFcn = function () {
                $('#alticalc .servererror').show(100);
            };
        //do the ajax
        $.ajax({
          url: 'calculate.php',
          dataType: 'json',
          data: data,
          success: successFcn,
          error: errorFcn
        });
         
        //cancel the submit button default behaviours
        return false;
    }); 
}); 
