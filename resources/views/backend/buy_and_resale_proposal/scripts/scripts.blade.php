<script>
    $(document).ready(function() {
        $('#accept_proposal').on('click', function() {
            swal({
                title: 'Are you sure you want to accept this proposal?',
                showCancelButton: true,
                confirmButtonText: 'Accept',
                cancelButtonText: 'Cancel',
                type: 'info'
            }).then(result => {
                if (result.value) {
                    const form = $("form[name=accept_proposal]");

                    swal('Proposal was successfully accepted.', '', 'success');
                    form.submit();
                } 
            });
        })
            .removeAttr('href')
            .attr('style', 'cursor:pointer;')
            .attr('onclick', '$(this).find("form").submit();');

        $('select[name=delivery_status]').on('change', function () {
            swal({
                title: 'Are you sure you want to change this item\'s delivery status?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                type: 'info'
            }).then(result => {
                if (result.value) {
                    const form = $(this).closest('form');

                    swal('Delivery status was successfully changed.', '', 'success');
                    form.submit();
                } 
            });
        })
            .attr('onchange', '$(this).find("form").submit();');
    });
</script>