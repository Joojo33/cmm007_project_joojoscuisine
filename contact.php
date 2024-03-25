<?php include 'header.php'; 

// At the beginning of the chef.php or in the <head> section, you can add this PHP code
if (isset($_GET['success']) && $_GET['success'] == '1') {
    echo '<script>alert("Message Sent!");</script>';
    // Clear the message to prevent it from being displayed on refresh or navigation
    unset($_GET['success']);
}

?>
<main>
    <div class="container text-center">
        <h1>About Joojo's Cuisines</h1>
    </div>
    <div class="container-sm">
        <div class="row">
            <div class="col text-center">
                <h5>Contact Info</h5>
                <br>
                <p>123 Street Name, City</p>
                <p>Email: contact@example.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="col text-bg-light">
                <form method="post" action="functions/contact_submit.php">
                    <h5 class="text-center">Let us know how we may help</h5>
                    <br>
                    <br>
                    <div class="mb-3">
                        <label for="name" class="form-label form-required">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="First Last" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label form-required">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label form-required">Message</label>
                        <textarea class="form-control" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <img src="assets/map.png" alt="map">
    </div>
</main>
<?php include 'footer.php'; ?>