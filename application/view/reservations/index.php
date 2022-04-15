<script type="text/javascript" src="<?php echo URL; ?>js/reservations.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.js"></script>
<link rel="stylesheet" href="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.css" />

<div class="ui basic segment" style="margin: 3rem 0 0 4rem;">
	<div class="ui breadcrumb">
		<a href="<?php echo URL ?>" class="section" style="color: #0d2f77;">Home</a>
		<i class="right arrow icon divider"></i>
		<div class="active section">Reservations</div>
	</div>

	<h2 class="ui header">
            Reservations
	        <a href="<?php echo URL; ?>reservations/create" class="mini ui basic button right floated">New Reservation</a>
    </h2>

    <div class="ui grid">
	    <div class="sixteen column wide">
		    <table id="reservations-table" class="ui celled padded blue table" style="border-top: 0.2em solid #0d2f77;">
			    <thead>
			    <tr>
				    <th class="single line">#</th>
				    <th class="single line">Name</th>
				    <th>Phone</th>
				    <th class="collapsing">Adults</th>
				    <th class="collapsing">Children</th>
				    <th>Yacht</th>
				    <th class="collapsing">Time onboard</th>
				    <th>Date</th>
				    <th>Actions</th>
			    </tr></thead>
			    <tbody>
			    <?php  if(!empty($reservations)): ?>
				    <?php foreach ($reservations as $reservation): ?>
					    <tr data-reservation="<?php echo $reservation->id; ?>">
						    <td class="collapsing"><?php echo $reservation->id; ?></td>
						    <td><h4 class="single line"><?php echo $reservation->name; ?></h4></td>
						    <td class="single line"><?php echo $reservation->phone; ?></td>
						    <td class="single line"><?php echo $reservation->adults; ?></td>
						    <td class="single line"><?php echo $reservation->children; ?></td>
						    <td class="single line collapsing"><?php echo $reservation->yacht; ?></td>
						    <td class="single line"><?php echo $reservation->time_onboard; ?></td>
						    <td class="single line collapsing"><?php echo $reservation->date; ?></td>
						    <td class="collapsing">
							    <div class="mini ui negative basic button delete-reservation" data-reservation="<?php echo $reservation->id; ?>">Delete</div>
							    <a href="<?php echo URL; ?>reservations/edit/<?php echo $reservation->id; ?>" class="mini ui primary basic button">Edit</a>
						    </td>
					    </tr>
			        <?php endforeach; ?>
			    <?php else: ?>
					<tr>
						<td colspan="10">
							<div class="ui icon negative  message">
								<i class="x icon"></i>
								<div class="content">
									<div class="header">
										No reservations found.
									</div>
									<p>Apparently the database is empty, to create a new reservation click on the "New reservation" button.</p>
								</div>
							</div>
						</td>
					</tr>
			    <?php endif; ?>
			    </tbody>
		    </table>
	    </div>

    </div>
</div>

<div id="delete-reservation-modal" class="ui basic modal ">
	<div class="ui icon header">
		<i class="trash icon"></i>
		Delete Reservation
	</div>
	<div class="content" style="text-align: center;">
		<p>Are you sure you want to delete this reservation? If yes, confirm the action.</p>
	</div>
	<div class="actions">
		<div class="ui red basic cancel inverted button">
			<i class="remove icon"></i>
			No, cancel
		</div>
		<div class="ui green ok inverted button" id="delete-reservation">
			<i class="checkmark icon"></i>
			Confirm
		</div>
	</div>
</div>

<script>
	$( document ).ready(function(){
        var idReservation = $(this).attr("data-reservation");

       $(".delete-reservation").on("click", function(){
           var id = $(this).attr("data-reservation");

           $("#delete-reservation").attr("data-reservation", id);
           $('#delete-reservation-modal').modal('show');
       });
	});
</script>
