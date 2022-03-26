var i = 0;

$("#add").click(function(){
    ++i;
    var newFields = '<div class="form-row"><div class="col-md-5"><label>Key:</label><select name="specs['+i+'][key]" placeholder="Specification Key" class="form-control"><option selected="selected" value="">Select Type</option><option value="includes">Includes</option><option value="excludes">Excludes</option></select></div><div class="col-md-5"><label>Value:</label><textarea class="form-control" name="specs['+i+'][value]" placeholder="Exclude/Include Value"></textarea></div><div class="col-md-2"><button type="button" class="btn btn-danger remove-tr" style="margin-top: 30px;"><i class="fa fa-times"></i></button></div></div>';
    $("#dynamicSpecs").append(newFields);
});

$(document).on('click', '.remove-tr', function(){
        $(this).parents('div.form-row').remove();
});
