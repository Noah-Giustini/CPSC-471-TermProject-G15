<form action="bookAppointmentQuery.php" method="post">
   Date: <input type="date" name="Date" min="2020-01-01" required><br>
   Time: <input type="time" name="Time" min="06:00:00" max="18:00:00" step="1800" required><br>
   Reason: <input type="text" name="Reason" required><br>
   Doctor User ID: <input type="text" name="DoctorUserID"required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="patient-main.php">Back</a>
<br>