<div class="customer-admin-page scroll">
<form>
            <table>
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Filling</th>
                        <th>Shape</th>
                        <th>Message</th>
                        <th>Size</th>
                        <th>Design</th>
                        <th>Payment</th>
                        <th>Booking Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                    <tr class="active-row">
                        <td><?=$booking['booking_id']?></td>
                        <td><?=$booking['_name']?></td>
                        <td><?=$booking['email']?></td>
                        <td><?=$booking['cake_type']?></td>
                        <td><?=$booking['cake_filling']?></td>
                        <td><?=$booking['cake_shape']?></td>
                        <td><?=$booking['_message']?></td>
                        <td><?=$booking['cake_size']?></td>
                        <td><?=$booking['cake_design']?></td>
                        <td><?=$booking['payment_status']?></td>
                        <td><?=$booking['created']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
</div>