
var reg = /pattern/;
if (reg.test($(this).val())) {
    // perform some task
}



var matric_val = /[0-9]{2}\/[0-9]{4}/;
                        $('#matric_id').on('keyup', function () {
                            
                            var matricc = $(this);
                            var mat = matricc.val();
                            var matLabel = $('[for="matricc"]');       
                            var stength = 'Weak';
                            pclass = 'danger';
                            
                            if (matric_val.test(mat)){
                                
                                var stength = 'Correct';
                                pclass = 'success';
                            }
                                var popover = password.attr('data-content', stength).data('bs.popover');
                                popover.setContent();
                                popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);
                                                        
                            });
                            $('input[data-toggle="popover"]').popover({
                                placement: 'top',
                                trigger: 'focus'