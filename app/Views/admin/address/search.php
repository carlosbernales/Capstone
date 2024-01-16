<form>
    <div>
        <label for="city">City:</label>
        <select name="city" id="city">
            <option value="">Select City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city->id ?>"><?= $city->city_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label for="barangay">Barangay:</label>
        <select name="barangay" id="barangay" disabled>
            <option value="">Select Barangay</option>
        </select>
    </div>
    
    <div>
        <label for="shipping_fee">Shipping Fee:</label>
        <input type="text" name="shipping_fee" id="shipping_fee" readonly>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#city').change(function() {
            var cityId = $(this).val();
            var url = "<?= route_to('get.barangays') ?>";
            
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    city_id: cityId
                },
                success: function(response) {
                    $('#barangay').empty().prop('disabled', false);
                    $.each(response, function(key, value) {
                        $('#barangay').append('<option value="' + value.id + '">' + value.brgy_name + '</option>');
                    });
                    
                    // Fetch shipping fee for the first barangay
                    var firstBarangayId = response[0].id;
                    fetchShippingFee(firstBarangayId);
                }
            });
        });
        
        $('#barangay').change(function() {
            var barangayId = $(this).val();
            fetchShippingFee(barangayId);
        });
        
        function fetchShippingFee(barangayId) {
            var url = "<?= route_to('get.shipping_fee') ?>";
            
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    barangay_id: barangayId
                },
                success: function(response) {
                    $('#shipping_fee').val(response.shipping_fee);
                }
            });
        }
    });

</script>
