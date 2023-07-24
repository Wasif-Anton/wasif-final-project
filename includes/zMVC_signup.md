The flow of the application follows this pattern: 
When a user submits the signup form (signup.inc.php), the controller (signup_controller.inc.php) receives the form data and interacts with the model (signup_model.inc.php) to validate and store the data. 
If there are errors, the controller updates the view (signup_view.inc.php) with error messages. 
If the signup is successful, the controller redirects the user to the login page with a success message.
