$(document).ready(function(){
    choice = $('select.choicetype_groupephar');
    if(choice.length > 0){
        btnUpdate = $("button[name='btn_update_and_edit']");
        if(btnUpdate.length > 0){/* edit form */
            setChangeEvent();
            if($('select.choice-pharmacie').val() && $('select.choice-pharmacie').val() !== ''){
                $('select.choicetype_groupephar')[0].options[1].selected = true
                $('.choice-pharmacie').closest('div.form-group').show();
                $('select.choicetype_groupephar').change()
            }
            if($('select.choice-groupe').val() && $('select.choice-groupe').val() !== ''){
                $('select.choicetype_groupephar')[0].options[2].selected = true
                $('select.choicetype_groupephar').change()
                $('.choice-groupe').closest('div.form-group').show();
            }

        }
        else{/* add new */
            /* hidding elements */
            setChangeEvent()
        }
    }

});
function setChangeEvent(){
    $('.choice-pharmacie').closest('div.form-group').hide();
    $('.choice-groupe').closest('div.form-group').hide();
    choice.on('change',function(e){
        val = e.currentTarget.selectedOptions[0].value;
        switch (val){
            case '0':{ /* pharmacie */
                $('.choice-pharmacie').closest('div.form-group').show();
                $('.choice-groupe').closest('div.form-group').hide();
                break;
            }
            case '1':{
                $('.choice-pharmacie').closest('div.form-group').hide();
                $('.choice-groupe').closest('div.form-group').show();
                break;
            }
            case '':{
                $('.choice-pharmacie').closest('div.form-group').hide();
                $('.choice-groupe').closest('div.form-group').hide();
                break;
            }

        }
    })
}