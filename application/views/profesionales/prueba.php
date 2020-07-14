<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Date and Time picker in popup -->
    <div class="form-group pmd-textfield pmd-textfield-floating-label">
        <label for="regular1" class="control-label">Select Date and Time</label>
        <input type="text" data-datepicker-popup="true" data-datepicker="datepicker-popup-inline" class="form-control" data-target="#datepicker-dialog" data-toggle="modal" />
    </div>

    <!-- Dialog Simple datepicker-->
    <div tabindex="-1" class="modal fade" id="datepicker-dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Inline popup datepicker start -->
                <div id="datepicker-popup-inline"></div>
                <!-- Inline popup datepicker end -->
                <div class="modal-footer">
                    <button type="button" class="btn pmd-ripple-effect btn-light" aria-hidden="true" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn pmd-ripple-effect btn-primary">Select</button>
                </div>
            </div>
        </div>
    </div>

    <script>
	// Datepicker in popup
	$('#datepicker-popup-inline').datetimepicker({
		inline: true
	});
</script>
</body>
</html>