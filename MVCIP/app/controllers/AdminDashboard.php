<?php 

/**
 * home class
 */
class AdminDashboard {
	use Controller;

	public function index()
	{
        // Check if user is logged in
        if (!isset($_SESSION['admin'])) {
            // If not logged in as admin, redirect to login page
            redirect('login');
        }

        // Check if the logged-in user has the role of 'admin'
        if ($_SESSION['admin']->Role !== 'admin' && $_SESSION['admin']->Role !== 'Admin') {
            // If role is not 'admin', redirect to unauthorized page or handle as needed
            redirect('unauthorized');
        }
		
		$reservation = new AdminReservation;
		$reservations = $reservation->findAll();
		$this->view('admin-dashboard', ['Reservations' => $reservations]);
	}

}
